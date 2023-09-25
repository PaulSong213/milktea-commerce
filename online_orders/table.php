<?php require_once '../php/connect.php'; ?>
<!DOCTYPE html>

<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <style>
        .dt-button-collection,
        .dt-button-background {
            position: absolute;
        }

        .button-page-length.dt-button-active {
            background-color: #b6e8f3;
        }

        .dt-button {
            border-radius: 5px;
            border: 1px solid #d1d1d1;
        }

        .buttons-columnVisibility {
            opacity: 0.5;
        }

        .dt-button-active {
            opacity: 1;
        }

        .action-btn {
            font-size: 10px;
            margin-bottom: 5px;
        }
    </style>
</head>

<body>
    <div class="table w-100 p-4">
        <h2 class="mt-4 mb-5">Room</h2>
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Order #</th>
                    <th>Status</th>
                    <th>Orders</th>
                    <th>Buyer Name</th>
                    <th>Total Price</th>
                    <th class="action-column">Actions</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables-buttons/2.2.0/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="module">
        import {
            searchColumn,
            handleArchiveClick,
        } from "../costum-js/datatables.js";
        import {
            STATUS_COLOR
        } from "/milktea-commerce/track-order/order-config.js";
        import {
            app
        } from "/milktea-commerce/costum-js/firebase.js";
        // insert test data to firebase realtime database
        import {
            getDatabase,
            ref,
            set,
            onValue
        } from "https://www.gstatic.com/firebasejs/10.4.0/firebase-database.js";
        const db = getDatabase();

        const STATUS_SEQUENCE = [
            "on-queue",
            "preparing-food",
            "on-delivery-rider",
            "delivered"
        ];

        $(document).ready(function() {
            const table = $('#example').DataTable({
                orderCellsTop: true,
                fixedHeader: true,
                responsive: true,
                autoFill: true,
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'excelHtml5',
                        className: 'btn border border-info',
                        exportOptions: {
                            columns: ':not(.action-column)'
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        className: 'btn border border-info',
                        exportOptions: {
                            columns: ':not(.action-column)'
                        }
                    },
                    {
                        extend: 'print',
                        className: 'btn border border-info',
                        exportOptions: {
                            columns: ':not(.action-column)'
                        }
                    },
                    {
                        extend: 'colvis',
                        className: 'btn border border-info'
                    },
                    {
                        extend: 'pageLength',
                        className: 'btn border border-info'
                    }
                ],
                initComplete: () => {
                    const orderRef = ref(db, `/orders/`);
                    onValue(orderRef, (snapshot) => {
                        $('#example').DataTable().clear().draw();
                        snapshot.forEach((childSnapshot) => {
                            const costumerID = childSnapshot.key;
                            const orderData = childSnapshot.val();
                            for (const orderNo in orderData) {
                                const currentOrder = orderData[orderNo];
                                // add data to 
                                currentOrder.costumerID = costumerID;
                                if (STATUS_SEQUENCE.indexOf(currentOrder.status) === -1) continue;
                                const currentOrderStr = JSON.stringify(currentOrder);
                                table.row.add([
                                    orderNo,
                                    currentOrder.status,
                                    orderNo,
                                    costumerID,
                                    orderNo,
                                    currentOrderStr,
                                ]).draw(false);
                            }
                        });
                    });
                },
                columnDefs: [{
                    targets: -1,
                    render: (d) => {
                        const data = JSON.parse(d);
                        const orderNo = data.sqlKey;
                        const nextStatus = STATUS_SEQUENCE[STATUS_SEQUENCE.indexOf(data.status) + 1];
                        const nextColor = STATUS_COLOR[nextStatus];
                        if (!nextStatus) return '<small>No Action Required</small';
                        return `
                            <button order-data='${JSON.stringify(data)}' class="btn action-btn text-white next-step-btn" style="background-color: ${nextColor}" >
                                Mark as  ${nextStatus.replace(/-/g, " ").toUpperCase()}
                            </button>
                        `
                    },
                    "searchable": false
                }],
                order: [
                    [1, 'asc']
                ]
            });


            // add click listener to mark to next step button
            table.on('click', '.next-step-btn', function(e) {
                const orderData = JSON.parse($(this).attr('order-data'));
                const nextStatus = STATUS_SEQUENCE[STATUS_SEQUENCE.indexOf(orderData.status) + 1];
                markToNextStep(orderData, `${nextStatus}`, e.target);
            });

            async function markToNextStep(orderData, nextStatus, button) {
                // disable the button
                button.disabled = true;
                // save old button content
                const oldButtonContent = button.innerHTML;
                // add loading screen to button
                button.innerHTML = `
                    <div class="spinner-border spinner-border-sm" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                `;

                // show confirmation message
                const confirmation = await Swal.fire({
                    title: 'Confirmation',
                    text: `Are you sure you want to mark order #${orderData.sqlKey} as ${nextStatus.replace(/-/g, " ").toUpperCase()}?`,
                    showCancelButton: true,
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'No',
                });

                // if user click yes
                if (!confirmation.isConfirmed) {
                    // enable the button
                    button.disabled = false;
                    // restore old button content
                    button.innerHTML = oldButtonContent;
                    return;
                }

                // update status to firebase
                const orderRef = ref(db, `/orders/${orderData.costumerID}/${orderData.sqlKey}/status`);

                // if next status is delivered mark it as waiting-for-feedback
                if (nextStatus === 'delivered') nextStatus = 'waiting-for-feedback';

                set(orderRef, nextStatus).then(() => {
                    // show success message
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: `Order #${orderData.sqlKey} is now ${nextStatus.replace(/-/g, " ").toUpperCase()}`,
                    });
                }).catch((error) => {
                    // show error message
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: `Something went wrong. Please try again later.`,
                    });
                    // enable the button
                    button.disabled = false;
                    // restore old button content
                    button.innerHTML = oldButtonContent;
                });
            }

        });
    </script>
</body>

</html>