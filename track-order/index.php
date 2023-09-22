<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        a {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <main id="track-order">
        <?php include(__DIR__ . '/notification-modal.php') ?>
        <?php include(__DIR__ . '/notification-btn.php') ?>
    </main>
</body>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script>
    $(document).ready(function() {
        $("#track-order").find('#order-notification-btn').click(function() {
            $("#track-order").find('#notificationModal').modal('show');
        });
        $("#track-order").find('#notificationModal').modal('show');
    });
</script>
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
            const data = snapshot.val();
            console.log(data);
        });
    };

    $(document).ready(function() {
        trackOrder();
    });
</script>

</html>