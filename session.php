 <?php
    // Start or resume the session

    // Check if the user is logged in
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        echo "$username";
    } else {
        echo "You are not logged in.";
    }
    ?>