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
            color: #fff;
        }

        #notification-btn-container {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
            background-color: rgba(255, 255, 255, 0.5);
            border-radius: 10px;
            padding: 1rem;
            height: max-content;

        }
    </style>
</head>

<body>
    <!-- Floating Order Notification Bar -->
    <div class="shadow-lg invisible" id="notification-btn-container">
        <div class="d-flex justify-content-between align-items-center">
            <h6 class="d-block my-auto pe-2" id="count-float-notif-container
            ">Pending Online Order: <span id="count-float-notif">0</span></h6>
            <button id="minimize-float-notif" class="badge bg-secondary">Minimize</button>
        </div>
        <div class="my-4" id="float-notification-list">
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

    $(document).ready(function() {
        trackAllOrder();
    });

    // track order from firebase realtime database
    function trackAllOrder() {

        const orderRef = ref(db, `/orders/`);

        // by default float notification is hidden
        $("#notification-btn-container")
            .removeClass("invisible")
            .hide();

        onValue(orderRef, (snapshot) => {
            $("#float-notification-list").html("");
            $("#count-float-notif").text(0);
            $("#notification-btn-container")
                .show(300);
            let totalPendingOrder = 0;
            snapshot.forEach((childSnapshot) => {
                const orderData = childSnapshot.val();
                console.log(orderData);
                for (const orderNo in orderData) {

                    const orderStatus = orderData[orderNo].status;
                    if (TO_SKIP_STATUS.includes(orderStatus)) continue;
                    // add notification btn
                    addNotificationBtn(orderNo, orderStatus);
                    totalPendingOrder++;
                }
            });
            console.log(totalPendingOrder);
            $("#count-float-notif").text(totalPendingOrder);
            if (totalPendingOrder <= 0) {
                $("#notification-btn-container")
                    .hide(500);
            }
        });

        // Check if the notification should be initially minimized based on localStorage
        var isMinimized = localStorage.getItem("notif-float-minimized") === "true";

        if (isMinimized) {
            // If minimized, set the initial state
            $("#float-notification-list").hide();
            $("#minimize-float-notif").text("Maximize");
            $("#notification-btn-container").css("transform", "scale(0.7)");
            $("#notification-btn-container").css("top", "10px");
            $("#notification-btn-container").css("right", "10px");
        }

        var animationInProgress = false;
        $("#minimize-float-notif").click(function() {
            if (animationInProgress) {
                // Animation is already in progress, do nothing.
                return;
            }
            animationInProgress = true;
            setTimeout(() => {
                animationInProgress = false;
            }, 300);

            $("#float-notification-list").toggle(300, () => {
                if ($("#float-notification-list").is(":visible")) {
                    $("#minimize-float-notif").text("Minimize");
                    $("#notification-btn-container").css("transform", "scale(1)");
                    $("#notification-btn-container").css("top", "20px");
                    $("#notification-btn-container").css("right", "20px");
                    localStorage.setItem("notif-float-minimized", "false");
                } else {
                    $("#minimize-float-notif").text("Maximize");
                    $("#notification-btn-container").css("transform", "scale(0.7)");
                    $("#notification-btn-container").css("top", "10px");
                    $("#notification-btn-container").css("right", "-10px");
                    localStorage.setItem("notif-float-minimized", "true");
                }
            });
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
            <a href="/milktea-commerce/online_orders/index.php" id="#notif-btn-${orderNo}" class="floating-notification-bar my-2 py-2 rounded d-flex text-decoration-none" style="background-color: ${STATUS_COLOR[orderStatus] || '#1b2433'}">
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
            </a>
        `);
        $("#float-notification-list")
            .append(newNotificationBtn);
    }
</script>

</html>