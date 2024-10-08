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
        <?php
        // validate if user is logged in
        if (!isset($_SESSION["costumer"])) {
            echo "return null;";
        } else {
            $costumer = json_decode($_SESSION["costumer"], true);
            $costumerID = $costumer["costumerID"];
        }
        ?>
        const COSTUMER_ID = '<?= $costumerID ?? "" ?>';
        const orderRef = ref(db, `/orders/${COSTUMER_ID}/`);
        onValue(orderRef, (snapshot) => {
            $("#track-order").find("#notification-btn-container").html("<span id='no-notif' class='w-100 d-block mx-auto fs-3 text-center'>No Notification</span>");
            $("#track-order").find("#order-modal-container").html("");
            snapshot.forEach((childSnapshot) => {
                const orderNo = childSnapshot.key;
                const orderData = childSnapshot.val();
                //if (orderData.status !== "delivered" || orderData.status !== "waiting-for-feedback") {
                // show to the user that their order is being prepared immediately
                // console.log(orderNo, orderData);
                addNotificationModal(orderNo, orderData);
                addNotificationBtn(orderNo, orderData.status);
                //}
            });

            // show notification modal if there is an opened order
            if (window.OPENED_ORDER_NO) {
                $("#notificationModal").modal("show");
                $(`#order-card-${window.OPENED_ORDER_NO}`).show();
                fetchOrderDetails(window.OPENED_ORDER_NO);
            }
        });
    };

    $(document).ready(function() {
        trackOrder();
    });
</script>

</html>