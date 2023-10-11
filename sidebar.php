<?php
require_once __DIR__ . '/php/connect.php';
$conn = connect();

if (isset($_SESSION['user'])) {
    $userData = json_decode($_SESSION['user'], true);
    $userName = $userData['userName'];
    $userDepartment = $userData['departmentName'];
    $userLevel = $userData['AccessLevel'];

    $userFullName = $userData['lname'] . ', ' . $userData['fname'] .  ' ' . $userData['mname'];
} else {
    // Redirect back to the login page or handle the user not being logged in
    header("Location: /milktea-commerce/index.php");
    exit();
}
if (isset($_GET['logout'])) {
    session_destroy();

    // Redirect to the login page or any other desired page after logout
    header("Location: ./index.php"); // Change 'login.php' to the appropriate URL
    exit;
}
// Rest of your code...

// get icons here -> https://mui.com/material-ui/material-icons/

require_once(__DIR__ . "/accessLevels.php");


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        a {
            text-decoration: none;
            /* Remove underline from links */
        }

        #sidebar {
            position: fixed;
            width: 200px;
            height: 100vh;
            transition: ease-in 0.1s;
            background-color: #010409;
            box-shadow: 0 0 30px rgba(200, 200, 200, 0.2);
            z-index: 1000;
        }

        #sidebar.active {
            width: 70px;
        }

        .session {
            display: flex;
            align-items: center;
            margin-top: 100px;
            bottom: 10%;
            /* Align items vertically */
        }

        #content {
            width: calc(100% - 200px);
            margin-left: 200px;
            transition: all 0.3s;
        }

        #content.active {
            margin-left: 40px;
        }

        .sidebar-header {
            padding: 20px;
            background-color: #000000;
            border-bottom: 1px solid #eee;
        }

        .icon {
            margin-left: 20px;
            margin-top: 3px;

            /* Add some space between icon and text */
        }

        .sidebar-header h3 {
            color: #333;
            font-size: 17px;
            margin: 0;
            text-transform: uppercase;
            font-weight: 600;
            display: flex;
            align-items: center;
        }

        .sidebar-header img {
            width: 60px;
            margin-right: 10px;
            border-radius: 50%;
        }

        .list-unstyled.components {
            padding: 20px 0;
        }

        .list-unstyled.components li a {
            padding: 10px 20px;
            color: #fff;
            display: block;
            transition: background-color 0.3s, color 0.3s;
            border-radius: 7px;
        }

        .list-unstyled.components li.active a {
            background-color: #804428;
            color: #fff;
        }

        .list-unstyled.components li a:hover {
            background-color: #804428;
            color: #fff;
        }

        .dropdown-toggle::after {
            content: "\f105";
            font-family: "Material Icons";
            transform: translateY(-50%);
            color: #777;
            transition: all 0.3s;
            margin-left: 10px;
            margin-top: 5px;
        }

        .dropdown:has(ul.show) .dropdown-toggle::after {
            transform: translateY(-50%) rotate(180deg);
        }

        #toggleSidebar {
            width: 3rem;
            height: 3rem;
        }

        .transform-scale-small {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .btn-primary {
            background-color: #ffffff;
            color: #000000;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #cccccc;
        }

        @media (max-width: 600px) {
            .session {
                flex-direction: column;
                /* Stack items vertically */
                align-items: flex-start;
                /* Align items to the left */
                text-align: center;
                /* Center text */
            }

            .icon {
                margin-right: 0;
                /* Reset margin for icon */
                margin-bottom: 5px;
                /* Add spacing below icon */
            }

            span {
                font-size: 14px;
                /* Adjust font size for smaller screens */
            }
        }

        .btn-coffee {
            border-color: #804428 !important;
        }

        .btn-coffee:hover {
            border-color: #804428 !important;
            background-color: #804428 !important;
            color: #fff !important;
        }

        .btn-coffee-active {
            border-color: #804428 !important;
            background-color: #804428 !important;
            color: #fff !important;
        }
    </style>
</head>

<body style="height: 100%; overflow-y: auto;">
    <?php
    // check if the page is at /milktea-commerce/online_orders/index.php
    if (!(strpos($_SERVER["REQUEST_URI"], "/milktea-commerce/online_orders/index.php") === 0)) {
        require_once __DIR__ . '/track-order/admin/notification-btn.php';
    }
    ?>
    <div style="height: 100%; overflow-y: auto;">
        <nav class="rounded" id="sidebar" style="height: 100%; overflow-y: auto;">
            <a class="text-decoration-none" href="../account/index.php">
                <div class="sidebar-header">
                    <h3>
                        <img src="/milktea-commerce/img/logo1.png" class="img-fluid" alt="Logo" />
                        <span class="fw-bold company-title text-decoration-none text-white fs-6">ROMEO'S CAFE</span>
                    </h3>
                </div>
            </a>
            <ul class="list-unstyled components">
                <?php
                $root = "/milktea-commerce";
                for ($i = 0; $i < sizeof($LevelNav); $i++) {
                    $content = $LevelNav[$i];
                    $isDropdown = isset($content["navigations"]) && sizeof($content["navigations"]) > 0;
                    $link = $root . $content["link"];
                    $navClass = $link == $_SERVER['REQUEST_URI'] && !$isDropdown ? "active " : "";
                    if (sizeof($content["navigations"]) > 0) $navClass = $navClass . "dropdown";
                    $dropdownClass = $isDropdown ? "dropdown-toggle" : "";
                    $hasActiveSublink = false;
                    $navigationList = '<ul class="collapse list-unstyled menu" id="' .  $content["link"] . '">';
                    for ($j = 0; $j < sizeof($content['navigations']); $j++) {
                        $navigation = $content['navigations'][$j];
                        $subNavLink = $root . $navigation['link'];
                        $isActive = $subNavLink == $_SERVER['REQUEST_URI'];
                        if ($isActive) $hasActiveSublink = true;
                        $activeClass = $isActive ? "active" : "";
                        $navigationList = $navigationList . '<li class="' . $activeClass . '"><a class="nav-link sub-nav-link mx-2" href="' . $subNavLink . '">' . $navigation['name'] . '</a></li>';
                    }
                    $navigationList = $navigationList . '</ul>';
                    if ($hasActiveSublink) $navigationList = str_replace("collapse", "collapse show", $navigationList);
                    echo '
                <li class="' . $navClass . '">
                    <a id="' . $link . '" href="' . $link . '" class="dashboard d-flex align-items-center nav-link ' . $dropdownClass . '">
                        <i class="material-icons">' . $content["icon"] . '</i>
                        <span class="mx-1 link-name">' . $content["name"] . '</span>
                    </a>
                    ' . $navigationList . '
                </li>
                ';
                }
                ?>

            </ul>
            <div>
                <button class="btn-primary rounded-circle position-fixed p-3 bottom-0 start-0 m-4 d-flex justify-content-center align-items-center" id="toggleSidebar">
                    <span class="material-icons" id="sidebar-icon">table_rows</span>
                </button>
            </div>

        </nav>

    </div>
    <div class="container-fluid" id="content">

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#toggleSidebar").on("click", function() {
                toggleSidebar();
            });
            $(".nav-link").on("click", function() {
                toggleSidebar();
            });

        });
        // Initialize sidebar state on page load
        checkSideBarState();

        window.addEventListener('resize', () => {
            checkSideBarState();
        }, true);

        function toggleSidebar() {
            $("#sidebar").toggleClass("active");
            $("#content").toggleClass("active");
            $(".link-name").toggleClass("d-none");
            $(".sessionlabel").toggleClass("d-none");
            $(".company-title").toggleClass("d-none");
            $(".sub-nav-link").toggleClass("transform-scale-small");

            // Added animation for smooth sidebar toggle
            $("#sidebar, #content").addClass("transition");
        }

        function checkSideBarState() {
            var isSideBarOpened = $("#sidebar").hasClass("active");
            if (screen.width <= 768 && !isSideBarOpened) toggleSidebar();
            if (screen.width > 768 && isSideBarOpened) toggleSidebar();
        }


        // Close sidebar when clicking outside of it
        $(document).on("click", function(event) {
            if (!$(event.target).closest('#sidebar').length &&
                !$(event.target).is('#toggleSidebar')) {
                if ($("#sidebar").hasClass("active")) {
                    toggleSidebar();
                }
            }
        });

        // Added event listener for window resize to check sidebar state
        $(window).resize(function() {
            checkSideBarState();
        });
    </script>

</body>

</html>