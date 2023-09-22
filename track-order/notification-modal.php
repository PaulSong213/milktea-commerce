<html>

<head>
    <style>
        .card {
            margin: auto;
            width: 600px;
            max-width: 90%;
            border-radius: 20px
        }

        @media(max-width:767px) {
            .card {
                width: 80%
            }
        }

        @media(height:1366px) {
            .card {
                width: 75%
            }
        }

        #orderno {
            padding: 1vh 2vh 0;
            font-size: smaller
        }

        .gap .col-2 {
            background-color: #402d26;
            width: 1.2rem;
            padding: 1.2rem;
            margin-top: -2.5rem;
            border-radius: 1.2rem
        }

        .title {
            display: flex;
            text-align: center;
            font-size: 2rem;
            font-weight: bold;
            padding: 12%
        }

        .main {
            padding: 0 2rem
        }

        .main img {
            border-radius: 7px
        }

        .main p {
            margin-bottom: 0;
        }

        #sub-title p {
            margin: 1vh 0 2vh 0;
        }

        .row-main {
            padding: 1.5vh 0;
            align-items: center
        }

        hr {
            margin: 1rem -1vh;
            border-top: 1px solid rgb(214, 214, 214)
        }
    </style>
</head>
<main>
    <!-- Modal -->
    <div class="modal fade" id="notificationModal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="notificationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-1" id="notificationModalLabel">Track Your Order</h1>
                    <button type="button" class="btn btn-close text-dark d-flex align-items-center justify-content-center" data-bs-dismiss="modal" aria-label="Close">
                        <span>X</span>
                    </button>
                </div>
                <div class="modal-body" id="order-modal-container">
                    <!-- <div class="card mt-50 mb-50">
                        <div class="col d-flex"><span class="text-muted" id="orderno">order #546924</span></div>
                        <div class="gap">
                            <div class="col-2 d-flex mx-auto"> </div>
                        </div>
                        <h2 class="mx-auto my-3 mx-3"> Preparing your Order </h2>
                        <div class="w-100 d-flex justify-content-center">
                            <img class="w-75 mx-auto" src="/milktea-commerce/img/cooking.png">
                        </div>
                        <div class="main"> <span id="sub-title">
                                <p><b>Payment Summary</b></p>
                            </span>
                            <div class="row row-main">
                                <div class="col-3"> <img class="img-fluid" src="https://i.imgur.com/qSnCFIS.png"> </div>
                                <div class="col-6">
                                    <div class="row d-flex">
                                        <p class="fs-5 fw-bold">MILKTEA</p>
                                    </div>
                                    <div class="row d-flex">
                                        <p class="fs-6 fw-bold">12 ONZ</p>
                                    </div>
                                </div>
                                <div class="col-3 d-flex justify-content-end">
                                    <p class="fs-6 fw-bold">12 ONZ</p>
                                </div>
                            </div>
                            <hr>
                            <div class="total pb-3">
                                <div class="row">
                                    <div class="col">
                                        <p class="fs-4 fw-bold">TOTAL:</p>
                                    </div>
                                    <div class="col d-flex justify-content-end">
                                        <p class="fs-4 fw-bold">9999</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    const STATUS_IMG = {
        "pending-payment": "#991b1b",
        "preparing-food": "#1b4009",
        "on-delivery-rider": "#c9820d",
        "waiting-for-feedback": "#075985",
    };

    // TODO: add firebase event listner to track order
    function addNotificationModal(orderNo, orderData) {
        const orderStatusTitle = orderData.status.split("-").map((word) => word[0].toUpperCase() + word.slice(1)).join(" ");

        const actions = generateActionElement(orderNo, orderData);

        const orderModal = $(`
        <div class="card mt-50 mb-50 order-card" id="order-card-${orderNo}">
            <div class="col d-flex ps-3 pt-2"><span class="text-muted" >order #${orderNo}</span></div>
                <div class="gap">
                    <div class="col-2 d-flex mx-auto" style="background-color:${window.STATUS_COLOR[orderData.status]}"> </div>
                </div>
                <h2 class="mx-auto my-3 mx-3"> ${orderStatusTitle} </h2>
                <div class="w-100 d-flex justify-content-center">
                    <img class="w-75 my-3 mx-auto" src="/milktea-commerce/img/order-status-banner/${orderData.status}.svg">
                </div>
                ${actions}
                <div class="main"> <span id="sub-title">
                        <p><b>Payment Summary</b></p>
                    </span>
                    <div class="row row-main">
                        <div class="col-3"> <img class="img-fluid" src="https://i.imgur.com/qSnCFIS.png"> </div>
                        <div class="col-6">
                            <div class="row d-flex">
                                <p class="fs-5 fw-bold">MILKTEA</p>
                            </div>
                            <div class="row d-flex">
                                <p class="fs-6 fw-bold">12 ONZ</p>
                            </div>
                        </div>
                        <div class="col-3 d-flex justify-content-end">
                            <p class="fs-6 fw-bold">12 ONZ</p>
                        </div>
                    </div>
                    <hr>
                    <div class="total pb-3">
                        <div class="row">
                            <div class="col">
                                <p class="fs-4 fw-bold">TOTAL:</p>
                            </div>
                            <div class="col d-flex justify-content-end">
                                <p class="fs-4 fw-bold">9999</p>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        `);
        orderModal.hide();
        $("#track-order").find("#order-modal-container").append(orderModal);
    }

    function generateActionElement(orderNo, orderData) {
        switch (orderData.status) {
            case window.ORDER_STATUS["pending-payment"]:
                return `
                    <div class="my-3 ">
                        <a href="/milktea-commerce/checkout/payment.php?paymentID=${orderData.paymentID}" class="bg-primary text-white rounded text-center py-3 px-5 fs-5 btn-primary mx-auto d-block text-uppercase fw-bold btn" style="width: max-content">Pay Now</a>
                    </div>
                `;
                break;
            case window.ORDER_STATUS["on-delivery-rider"]:
                return `
                    <div class="my-3 d-flex flex-column">
                        <a href="/milktea-commerce/checkout/payment.php?orderNo=${orderNo}" class="bg-primary rounded d-block btn-secondary">Order Recieved</a>
                    </div>
                `;
                break;
            case window.ORDER_STATUS["waiting-for-feedback"]:
                return `
                    <div class="my-3 d-flex flex-column">
                        <a href="/milktea-commerce/checkout/payment.php?orderNo=${orderNo}" class="bg-primary rounded d-block btn-primary">Leave Feedbacl</a>
                    </div>
                `;
                break;

        }
        return "";
    }

    $(document).ready(function() {
        // add event listener to on modal close
        $("#notificationModal").on("hidden.bs.modal", function() {
            $("#track-order").find(".order-card").hide();
        });
    });
</script>

</html>