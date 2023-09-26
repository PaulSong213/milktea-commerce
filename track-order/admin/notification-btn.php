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
            transform: translateY(-4px);
        }

        #notification-btn-container {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
            background-color: rgba(255, 255, 255, 0.5);
            border-radius: 10px;
            padding: 1rem;
        }
    </style>
</head>

<body>
    <!-- Floating Order Notification Bar -->
    <div class="shadow-lg" id="notification-btn-container">
        <!-- <div id="order-notification-btn" class="floating-notification-bar bg-primary py-2 rounded d-flex">
            <div class="d-flex px-3 h-full border-end border-white">
                <img class="d-block my-auto" style="width: 1rem;" src="/milktea-commerce/img/icons/notifications.svg" alt="Notification">
            </div>
            <div class="d-flex">
                <div class="my-auto px-2  d-flex">
                    <p class="my-auto" style="height: max-content;"><strong>Orders in Progress:</strong> <span>PREPARING</span></p>
                </div>
            </div>
        </div> -->
    </div>
</body>
<script type="module">
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
    const TO_SKIP_STATUS = ["delivered", "pending-payment", "waiting-for-feedback"];

    trackAllOrder();
    // track order from firebase realtime database
    function trackAllOrder() {
        const orderRef = ref(db, `/orders/`);
        onValue(orderRef, (snapshot) => {
            $("#notification-btn-container").html("");
            snapshot.forEach((childSnapshot) => {
                const orderData = childSnapshot.val();
                console.log(orderData);
                for (const orderNo in orderData) {
                    const orderStatus = orderData[orderNo].status;
                    if (TO_SKIP_STATUS.includes(orderStatus)) continue;
                    // add notification btn
                    addNotificationBtn(orderNo, orderStatus);
                }
            });

            // show notification modal if there is an opened order
            if (window.OPENED_ORDER_NO) {
                $("#notificationModal").modal("show");
                $(`#order-card-${window.OPENED_ORDER_NO}`).show();
            }
        });
    };
</script>
<script>
    // structure of order status object
    const ORDER_STATUS = {
        "pending-payment": "pending-payment",
        "on-queue": "on-queue",
        "preparing-food": "preparing-food",
        "on-delivery-rider": "on-delivery-rider",
        "waiting-for-feedback": "waiting-for-feedback",
        "delivered": "delivered",
    };
    window.ORDER_STATUS = ORDER_STATUS;

    const STATUS_COLOR = {
        [ORDER_STATUS["on-queue"]]: "#b51f3e",
        [ORDER_STATUS["preparing-food"]]: "#814240",
        [ORDER_STATUS["on-delivery-rider"]]: "#3f482d"
    };
    window.STATUS_COLOR = STATUS_COLOR;

    function removeNotificationBtn(orderNo) {
        $("#track-order").find(`#notif-btn-${orderNo}`).hide(1000);
    }

    function addNotificationBtn(orderNo, orderStatus) {
        if (orderStatus === "delivered") return removeNotificationBtn(orderNo);
        const newNotificationBtn = $(`
            <div id="#notif-btn-${orderNo}" class="floating-notification-bar py-2 rounded d-flex" style="background-color: ${STATUS_COLOR[orderStatus] || '#1b2433'}">
                <div class="d-flex px-3 h-full border-end border-white">
                    <img class="d-block my-auto" style="width: 1rem;" src="/milktea-commerce/img/icons/notifications.svg" alt="Notification">
                </div>
                <div class="d-flex">
                    <div class="my-auto px-2  d-flex">
                        <p class="my-auto" style="height: max-content;"><strong>Online Orders in Progress:</strong> <span>
                        ${orderStatus}
                        </span></p>
                    </div>
                </div>
            </div>
        `);
        newNotificationBtn.click(function() {
            $("#notificationModal").modal("show");
            $(`#order-card-${orderNo}`).show();
            window.OPENED_ORDER_NO = orderNo;
        });
        $("#notification-btn-container")
            .append(newNotificationBtn);
    }
</script>

</html>