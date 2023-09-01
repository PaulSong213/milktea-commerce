<?php
// if (!isset($_SESSION['username'])) {
//     header("Location:/Zarate/index.php");
// }
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION);
    header("Location:/Zarate/index.php");
}
// get icons here -> https://mui.com/material-ui/material-icons/
$sidebarContent = [
    [
        "name" => "Dashboard", //name of the link
        "icon" => "dashboard", //material icon name
        "link" => "/dashboard/index.php", //link of the page
        "navigations" => [] //list of links on dropdown
    ],
    [
        "name" => "Charge Slip", //name of the link
        "icon" => "point_of_sale", //material icon name
        "link" => "/billing_slip/index.php", //link of the page
        "navigations" => [
            [
                "name" => "ChargeBilling/IPD/OPD", //name of the link
                "link" => "/billing_slip/index.php", //link of the page
            ],
            [
                "name" => "Billing List", //name of the link
                "link" => "/billingtable/index.php", //link of the page
            ],
            [
                "name" => "Closing Report", // include returns the included content
                "link" => "/closingReport/index.php",
                "id" => "openModalButton",
            ],


        ]
    ],
    [
        "name" => "Employee", //name of the link
        "icon" => "badge", //material icon name
        "link" => "/Employee/index.php", //link of the page
        "navigations" => [
            [
                "name" => "Employee", //name of the link
                "link" => "/Employee/index.php", //link of the page
            ],
            [
                "name" => "Department", //name of the link
                "link" => "/departmentTable/index.php", //link of the page
            ],
            [
                "name" => "Room", //name of the link
                "link" => "/Room/index.php", //link of the page
            ],

        ] //list of links on dropdown
    ],


    [
        "name" => "Patient", //name of the link
        "icon" => "hotel", //material icon name
        "link" => "/Patient/index.php", //link of the page
        "navigations" => [
            [
                "name" => "Enter new Patient Record", //name of the link
                "link" => "/Patient/index.php", //link of the page
            ],
            [
                "name" => "Enter Billing (New Admission)", //name of the link
                "link" => "/billing-new-admission/index.php", //link of the page
            ],
        ] //list of links on dropdown
    ],

    [
        "name" => "Inventory", //name of the link
        "icon" => "vaccines", //material icon name
        "link" => "/inventory/index.php", //link of the page
        "navigations" => [
            [
                "name" => "Inventory Items", //name of the link
                "link" => "/inventory/index.php", //link of the page
            ],
            [
                "name" => "Item Types", //name of the link
                "link" => "/itemType/index.php", //link of the page
            ],
            [
                "name" => "Supplier", //name of the link
                "icon" => "local_shipping", //material icon name
                "link" => "/SupplierTable/index.php", //link of the page
                "navigations" => [] //list of links on dropdown
            ],
            [
                "name" => "Expenses", //name of the link
                "link" => "/Expenses/index.php", //link of the page
                "navigations" => [] //list of links on dropdown
            ],
        ] //list of links on dropdown
    ],

    [
        "name" => "Account Settings", //name of the link
        "icon" => "account_circle", //material icon name
        "link" => "/dashboard/index.php", //link of the page
        "navigations" => [
            [
                "name" => isset($_SESSION['user']) ? json_decode($_SESSION['user'], true)['userName'] : 'You are Logout',
                "icon" => "account_circle", //material icon name
                "link" => "/dashboard/index.php", //link of the pages
            ],
            [
                "name" => "Log Out", //name of the link
                "link" => "/sidebar.php?logout=true", //link of the page
            ],

        ] //list of links on dropdown
    ],



]
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
            width: 260px;
            height: 100vh;
            transition: ease-in 0.1s;
            background-color: #fff;
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
            width: calc(100% - 260px);
            margin-left: 260px;
            transition: all 0.3s;
        }



        #content.active {
            margin-left: 40px;
        }

        .sidebar-header {
            padding: 20px;
            background-color: #fff;
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
            width: 45px;
            margin-right: 10px;
        }

        .list-unstyled.components {
            padding: 20px 0;
        }

        .list-unstyled.components li a {
            padding: 10px 20px;
            color: #777;
            display: block;
            transition: background-color 0.3s, color 0.3s;
        }

        .list-unstyled.components li.active a {
            background-color: #dbe5fd;
            color: #4c7cf3;
        }

        .list-unstyled.components li a:hover {
            background-color: #dbe5fd;
            color: #4c7cf3;
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
    </style>
</head>

<body>
    <nav id="sidebar">
        <a href="../dashboard/index.php">
            <div class="sidebar-header">
                <h3><img src="/Zarate/img/logo.png" class="img-fluid" alt="Logo" /><span class="fw-bold company-title">E.Zarate Hospital</span></h3>
            </div>
        </a>
        <ul class="list-unstyled components">

            <?php
            $root = "/Zarate";
            for ($i = 0; $i < sizeof($sidebarContent); $i++) {
                $content = $sidebarContent[$i];
                $isDropdown = sizeof($content["navigations"]) > 0;
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
            <button class="btn btn-primary rounded-circle position-fixed p-3 bottom-0 start-0 m-4 d-flex justify-content-center align-items-center" id="toggleSidebar">
                <span class="material-icons" id="sidebar-icon">table_rows</span>
            </button>
        </div>

    </nav>

    <div class="container-fluid bg-danger" id="content">

        <!-- Your content here -->
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
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