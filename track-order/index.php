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
            snapshot.forEach((childSnapshot) => {
                const orderNo = childSnapshot.key;
                const orderData = childSnapshot.val();
                // console.log(orderNo, orderData);
                addNotificationModal(orderNo, orderData);
                addNotificationBtn(orderNo, orderData.status);
            });

            // add event listener to notification button
            // $("#track-order").find(".notif-btn").click(function() {
            //     $("#notificationModal").modal("show");
            // });
        });
    };

    $(document).ready(function() {
        trackOrder();
    });
</script>

</html>