<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <main>
        <?php include './notification-btn.php'; ?>
        <?php include './notification-modal.php'; ?>
    </main>
</body>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script>
    $(document).ready(function() {
        $('#order-notification-btn').click(function() {
            $('#notificationModal').modal('show');
        });
    });
</script>

</html>