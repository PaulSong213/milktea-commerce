<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        a {
            text-decoration: none;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
</head>

<body>
    <main id="track-order">
        <?php include(__DIR__ . '/notification-btn.php') ?>
        <?php include(__DIR__ . '/notification-modal.php') ?>
    </main>
</body>

<script type="module">
    <?php
    if (isset($_SESSION["OPENED_ORDER_NO"])) {
        $OPENED_ORDER_NO = $_SESSION["OPENED_ORDER_NO"];
        echo "window.OPENED_ORDER_NO = $OPENED_ORDER_NO;";
        unset($_SESSION["OPENED_ORDER_NO"]);
    }
    ?>

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

    // track order from firebase realtime database
    function trackOrder() {
        const COSTUMER_ID = 1; // TODO: get costumer id from session
        const orderRef = ref(db, `/orders/${COSTUMER_ID}/`);
        onValue(orderRef, (snapshot) => {
            $("#track-order").find("#notification-btn-container").html("");
            $("#track-order").find("#order-modal-container").html("");
            snapshot.forEach((childSnapshot) => {
                const orderNo = childSnapshot.key;
                const orderData = childSnapshot.val();
                // show to the user that their order is being prepared immediately
                if (orderData.status === "on-queue") orderData.status = "preparing-food";
                // console.log(orderNo, orderData);
                addNotificationModal(orderNo, orderData);
                addNotificationBtn(orderNo, orderData.status);
            });

            // show notification modal if there is an opened order
            if (window.OPENED_ORDER_NO) {
                $("#notificationModal").modal("show");
                $(`#order-card-${window.OPENED_ORDER_NO}`).show();
            }
        });
    };

    $(document).ready(function() {
        trackOrder();
    });
</script>

</html>