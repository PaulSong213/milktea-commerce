<?php
// Include your database connection code here
require_once('../php/connect.php');


// Fetch data from the notification_tb table
$query = "SELECT * FROM notification_tb";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notification Table</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>


<body class="bg-dark ">
    <div class="fuid bg-white p-5 rounded mt-5">
        <h3>Notification Table</h3>
        <table class="table table-striped text">
            <thead>
                <tr>
                    <th>N_ID</th>
                    <th>Notification Name</th>
                    <th>Message</th>
                    <th>Department</th>
                    <th>Active</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    echo '<td>' . $row['n_id'] . '</td>';
                    echo '<td>' . $row['notifications_name'] . '</td>';
                    echo '<td>' . $row['message'] . '</td>';
                    echo '<td>' . $row['department'] . '</td>';
                    echo '<td>' . $row['active'] . '</td>';
                    echo '<td><button class="btn btn-success mark-as-done" data-id="' . $row['n_id'] . '">Mark as Done</button></td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            // JavaScript code for handling the "Mark as Done" button click event
            $('.mark-as-done').click(function() {
                var notificationId = $(this).data('id');
                // You can add AJAX code here to perform the "Mark as Done" action
                // For example, send an AJAX request to update the status in your database
                // and then reload the page or update the table accordingly.
                // Example AJAX code:
                /*
                $.ajax({
                    url: 'mark_as_done.php', // Replace with the actual URL to your PHP script
                    method: 'POST',
                    data: { id: notificationId },
                    success: function (response) {
                        // Handle the success response here
                        console.log('Notification marked as done');
                    },
                    error: function (error) {
                        // Handle any errors here
                        console.error('Error marking notification as done');
                    }
                });
                */
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>