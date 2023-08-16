<?php

$sidebarContent = [
    [
        "name" => "Dashboard", //name of the link
        "icon" => "dashboard", //material icon name
        "link" => "/inventory/inventorydashboard.php", //link of the page
        "navigations" => [] //list of links on dropdown
    ],
    [
        "name" => "Inventory System", //name of the link
        "icon" => "dashboard", //material icon name
        "link" => "/inventory/index.php", //link of the page
        "navigations" => [] //list of links on dropdown
    ],
    [
        "name" => "Sample Dropdown", //name of the link
        "icon" => "dashboard", //material icon name
        "link" => "#sample", //link of the page
        "navigations" => [
            [
                "name" => "Dashboard", //name of the link
                "link" => "/inventory/inventorydashboard", //link of the page
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
        #sidebar {
            position: fixed;
            width: 260px;
            height: 100vh;
            transition: all 0.3s;
            background-color: #fff;
            box-shadow: 0 0 30px rgba(200, 200, 200, 0.2);
        }

        #sidebar.active {
            width: 0;
        }

        #content {
            width: calc(100% - 260px);
            margin-left: 260px;
            transition: all 0.3s;
        }

        #content.active {
            margin-left: 0;
            width: 100%;
        }

        .sidebar-header {
            padding: 20px;
            background-color: #fff;
            border-bottom: 1px solid #eee;
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
    </style>
</head>

<body>
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3><img src="/zarate/img/logo.png" class="img-fluid" alt="Logo" /><span class="fw-bold">E.Zarate
                    Hospital</span></h3>
        </div>
        <ul class="list-unstyled components">

            <?php
            $root = "/zarate";
            for ($i = 0; $i < sizeof($sidebarContent); $i++) {
                $content = $sidebarContent[$i];
                $isDropdown = sizeof($content["navigations"]) > 0;
                $link = $isDropdown ? $content["link"] : $root . $content["link"]; //if link starts with #, it is a dropdowns
                $navClass = $link == $_SERVER['REQUEST_URI'] ? "active" : "";
                if (sizeof($content["navigations"]) > 0) $navClass = $navClass . " dropdown";
                $dropdownProperties = $isDropdown ? 'data-toggle="collapse" aria-expanded="false"' : "";

                // $navigationList = '<ul class="collapse list-unstyled menu" id="' . $content['name'] . '">';
                // for ($i = 0; $i < sizeof($content['navigations']); $i++) {
                //     $navigation = $content['navigations'][$i];
                //     $navigationList = $navigationList . '<li><a href="' . $navigation['link'] . '">' . $navigation['name'] . '</a></li>';
                // }
                // $navigationList = $navigationList . '</ul>';

                echo '
                <li class="' . $navClass . '">
                    <a href="' . $link . '" class="dashboard d-flex align-items-center nav-link dropdown-toggle" ' . $dropdownProperties . '>
                        <i class="material-icons">' . $content["icon"] . '</i>
                        <span class="mx-1">' . $content["name"] . '</span>
                    </a>

                </li>
                ';
            }
            ?>
            <li class="dropdown">
                <a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link my-auto d-flex align-items-center">
                    <i class="material-icons ">aspect_ratio</i>
                    <span class="mx-1">Layouts</span>
                </a>
                <ul class="collapse list-unstyled menu" id="homeSubmenu1">
                    <li>
                        <a href="#">Home 1</a>
                    </li>
                    <li>
                        <a href="#">Home 2</a>
                    </li>
                    <li>
                        <a href="#">Home 3</a>
                    </li>
                </ul>
            </li>

        </ul>
    </nav>

    <div class="container-fluid" id="content">

        <!-- <button class="btn btn-primary rounded-circle position-fixed p-3 bottom-0 end-0 m-4" id="toggleSidebar">
            <span class="material-icons">tablerows</span>
        </button> -->

        <!-- Your content here -->
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#toggleSidebar").on("click", function() {
                $("#sidebar").toggleClass("active");
                $("#content").toggleClass("active");
            });
        });
    </script>
</body>

</html>