<!DOCTYPE html>
<html lang="en">

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
    });
</script>

</html>