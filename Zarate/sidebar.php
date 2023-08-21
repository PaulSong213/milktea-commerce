<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="sidebar.js"></script>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Crud Dashboard</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
       
<style>
    /* Sidebar Styles */
#sidebar {
    position: fixed;
    width: 250px;
    height: 100vh;
    transition: all 0.3s;
    background-color: #293241;
    color: #e0fbfc;
    box-shadow: 0 0 30px rgba(0, 0, 0, 0.2);
    overflow-y: auto; /* Add scrollbar for vertical overflow */
}

#sidebar.active {
    width: 0;
}

    /* Reset and General Styles */
    body {
        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f5f5f5;
    }

    /* Sidebar Styles */
    #sidebar {
        position: fixed;
        width: 250px;
        height: 100vh;
        transition: all 0.3s;
        background-color: #293241;
        color: #e0fbfc;
        box-shadow: 0 0 30px rgba(0, 0, 0, 0.2);
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
        padding: 12px;
        text-align: left;
    }

    .sidebar-header h3 {
        font-size: 18px;
        margin: 0;
        color: #e0fbfc;
    }
    
    .sidebar-header img {
            width: 50px;
            margin-right: 10px;
        }

    .list-unstyled.components {
        padding: 5px;
    }

    .list-unstyled.components li a {
        padding: 10px 20px;
        color: #e0fbfc;
        display: block;
        transition: background-color 0.3s, color 0.3s;
    }

    .list-unstyled.components li.active a {
        background-color: #4f758b;
    }

    .list-unstyled.components li a:hover {
        background-color: #4f758b;
    }
    .dropdown-toggle::after {
            content: "\f105";
            font-family: "Material Icons";
            position: absolute;
            right: 30px;
            top: 50%;
            transform: translateY(-50%);
            color: #777;
            transition: transform 0.3s;
        }

    .dropdown.show .dropdown-toggle::after {
            transform: translateY(-50%) rotate(180deg);
        }

    /* Icons */
    .material-icons {
        font-size: 18px;
        vertical-align: middle;
        margin-right: 10px;
    }
    
</style>

</head>

<body>
    <nav id="sidebar">
        
        <div class="sidebar-header">
            <h3><img src="\zarate\Zarate\img\logo.png" class="img-fluid" alt="Logo" /><span class="fw-bold">E.Zarate
                    Hospital</span></h3>
        </div>
        <ul class="list-unstyled components">
            <li class="">
                <a href="#" class="dashboard"><i class="material-icons">dashboard</i>
                    <span>Dashboard</span></a>
            </li>


            <li class="dropdown">
                <a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="material-icons">aspect_ratio</i>Layouts</a>
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

            <li class="dropdown">
                <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="material-icons">apps</i><span>widgets</span></a>
                <ul class="collapse list-unstyled menu" id="pageSubmenu2">
                    <li>
                        <a href="#">Page 1</a>
                    </li>
                    <li>
                        <a href="#">Page 2</a>
                    </li>
                    <li>
                        <a href="#">Page 3</a>
                    </li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#pageSubmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="material-icons">equalizer</i>


                    <span>chart</span></a>
                <ul class="collapse list-unstyled menu" id="pageSubmenu3">
                    <li>
                        <a href="#">Page 1</a>
                    </li>
                    <li>
                        <a href="#">Page 2</a>
                    </li>
                    <li>
                        <a href="#">Page 3</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#pageSubmenu4" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="material-icons">extension</i><span>ui element</span></a>
                <ul class="collapse list-unstyled menu" id="pageSubmenu4">
                    <li>
                        <a href="#">Page 1</a>
                    </li>
                    <li>
                        <a href="#">Page 2</a>
                    </li>
                    <li>
                        <a href="#">Page 3</a>
                    </li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#pageSubmenu5" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="material-icons">border_color</i><span>forms</span></a>
                <ul class="collapse list-unstyled menu" id="pageSubmenu5">
                    <li>
                        <a href="#">Page 1</a>
                    </li>
                    <li>
                        <a href="#">Page 2</a>
                    </li>
                    <li>
                        <a href="#">Page 3</a>
                    </li>
                </ul>
            </li>



            <li class="dropdown">
                <a href="#pageSubmenu6" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="material-icons">grid_on</i><span>tables</span></a>
                <ul class="collapse list-unstyled menu" id="pageSubmenu6">
                    <li>
                        <a href="#">Page 1</a>
                    </li>
                    <li>
                        <a href="#">Page 2</a>
                    </li>
                    <li>
                        <a href="#">Page 3</a>
                    </li>
                </ul>
            </li>


            <li class="dropdown">
                <a href="#pageSubmenu7" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="material-icons">content_copy</i><span>Pages</span></a>
                <ul class="collapse list-unstyled menu" id="pageSubmenu7">
                    <li>
                        <a href="#">Page 1</a>
                    </li>
                    <li>
                        <a href="#">Page 2</a>
                    </li>
                    <li>
                        <a href="#">Page 3</a>
                    </li>
                </ul>
            </li>

            <li class="">
                <a href="#"><i class="material-icons">date_range</i><span>copy</span></a>
            </li>

            <li class="">
                <a href="#"><i class="material-icons">library_books</i><span>Calender
                    </span></a>
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
        $(document).ready(function () {
            $("#toggleSidebar").on("click", function () {
                $("#sidebar").toggleClass("active");
                $("#content").toggleClass("active");
            });
        });
    </script>
</body>

</html>