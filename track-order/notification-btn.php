<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Custom CSS for the floating notification bar */
        .floating-notification-bar {
            color: #fff;
            z-index: 1000;
            cursor: pointer;
            transition: transform 0.3s ease-in-out;
        }

        .floating-notification-bar:hover {
            transform: translateY(-10px);
        }

        #notification-btn-container {
            right: 10vw;
            z-index: 1000;
            position: fixed;
            max-width: 100vw;
            width: 400px;
            top: 100px;
        }
    </style>
</head>

<body>
    <!-- Floating Order Notification Bar -->
    <div class="bg-white rounded shadow p-3 d-none" id="notification-btn-container">
        <!-- <div id="order-notification-btn" class="floating-notification-bar bg-primary rounded m-4 d-flex">
            <div class="d-flex px-3 h-full" style="background-color: rgba(255,255,255,0.1); ">
                <img class="d-block my-auto" style="width: 2rem;" src="/milktea-commerce/img/icons/notifications.svg" alt="Notification">
            </div>
            <div class="d-flex">
                <div class="my-auto p-3">
                    <p class="mt-2" style="height: max-content;"><strong>Orders in Progress:</strong> <span>PREPARING</span></p>
                </div>
            </div>
        </div> -->

    </div>

</body>
<script type="module">
    // structure of order status object
    import {
        ORDER_STATUS,
        STATUS_COLOR
    } from "/milktea-commerce/track-order/order-config.js";
    window.ORDER_STATUS = ORDER_STATUS;
    window.STATUS_COLOR = STATUS_COLOR;
</script>
<script>
    function removeNotificationBtn(orderNo) {
        $("#track-order").find(`#notif-btn-${orderNo}`).hide(1000);
    }

    function addNotificationBtn(orderNo, orderStatus) {
        //if (orderStatus === "delivered") return removeNotificationBtn(orderNo);

        let btnType = "order-ongoing-btn";
        if (orderStatus === "delivered" || orderStatus === "waiting-for-feedback") btnType = "order-history-btn";
        $("#track-order").find("#notification-btn-container").find("#no-notif").remove();
        const newNotificationBtn = $(`
            <div id="#notif-btn-${orderNo}" class="floating-notification-bar d-flex rounded m-4 notif-btn ${btnType}" style="background-color: ${STATUS_COLOR[orderStatus] || '#1b2433'}">
                <div class="d-flex px-4 h-full" style="background-color: rgba(255,255,255,0.1); ">
                    <img class="d-block my-auto" style="width: 2rem;" src="/milktea-commerce/img/icons/notifications.svg" alt="Notification">
                </div>
                <div class="d-flex">
                    <div class="my-auto p-3">
                        <p class="mt-3 fs-5" style="height: max-content;">Order Notification: <span class="fw-bold">
                        ${orderStatus.toUpperCase()}
                        </span></p>
                    </div>
                </div>
            </div> 
        `);
        newNotificationBtn.click(function() {
            $("#notificationModal").modal("show");
            $(`#order-card-${orderNo}`).show();
            window.OPENED_ORDER_NO = orderNo;
            fetchOrderDetails(orderNo);
        });
        $("#track-order").find("#notification-btn-container")
            .append(newNotificationBtn);
    }
</script>

</html>