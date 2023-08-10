<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>crud dashboard</title>
    <!----css3---->
    <style>
        body,
        html {
            line-height: 1.8;
            font-family: 'Poppins', sans-serif;
            color: #555e58;
            text-transform: capitalize;
            font-weight: 400;
            margin: 0px;
            padding: 0px;
        }

        @font-face {
            font-family: 'Material Icons';
            font-style: normal;
            font-weight: 400;
            src: url(https://example.com/MaterialIcons-Regular.eot);
            /* For IE6-8 */
            src: local('Material Icons'),
                local('MaterialIcons-Regular'),
                url(https://example.com/MaterialIcons-Regular.woff2) format('woff2'),
                url(https://example.com/MaterialIcons-Regular.woff) format('woff'),
                url(https://example.com/MaterialIcons-Regular.ttf) format('truetype');
        }

        #sidebar {
            margin-right: 20px;
            height: 100vh;
            z-index: 11;
            width: 260px;
            overflow: auto;
            transition: all 0.3s;
            background-color: #fff;
            box-shadow: 0 0 30px 0 rgba(200 200 200 / 20%);
        }


        @media only screen and (min-width:992px) {
            #sidebar.active {
                left: -260px;
                height: 100% !important;
                position: absolute !important;
                overflow: visible !important;
                top: 0;
                z-index: 666;
                float: left !important;
                bottom: 0 !important;
            }

            #content {
                width: calc(100% - 260px);
                position: relative;
                float: right;
                transition: all 0.3s;
            }

            #content.active {
                width: 100%;
            }

        }


        #sidebar::-webkit-scrollbar {
            width: 5px;
            border-radius: 10px;
            background-color: #eee;
            display: none;
        }

        #sidebar::-webkit-scrollbar-thumbs {
            width: 5px;
            border-radius: 10px;
            background-color: #333;
            display: none;
        }

        #sidebar:hover::-webkit-scrollbar-thumbs {
            display: block;
        }

        #sidebar:hover::-webkit-scrollbar {
            display: block;
        }

        #sidebar .sidebar-header {
            padding: 20px;
            background-color: #fff;
            border-bottom: 1px solid #eee;
        }

        .sidebar-header h3 {
            color: #333;
            font-size: 17px;
            margin: 0px;
            text-transform: uppercase;
            transition: all 0.5s ease;
            font-weight: 600;
        }

        .sidebar-header h3 img {
            width: 45px;
            margin-right: 10px;
        }

        #sidebar ul li {
            padding: 2px 0px;
        }

        #sidebar ul li.active>a {
            color: #4c7cf3;
            background-color: #DBE5FD;
        }


        #sidebar ul li.active>a i {
            color: #4c7cf3;
        }



        #sidebar ul li a:hover {
            color: #4c7cf3;
            background-color: #DBE5FD;
        }


        .dropdown-toggle::after {
            position: absolute;
            right: 22px;
            top: 18px;
            color: #777777;
        }

        #sidebar ul li.dropdown {
            position: sticky;
        }


        #sidebar ul.component {
            padding: 20px 0px;
        }

        #sidebar ul li a {
            padding: 5px 10px 5px 20px;
            line-height: 30px;
            font-size: 15px;
            position: relative;
            font-weight: 400;
            display: block;
            color: #777777;
            text-transform: capitalize;
        }

        #sidebar ul li a i {
            position: relative;
            margin-right: 10px;
            top: 6px;
        }
    </style>


    <!--google fonts -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">


    <!--google material icon-->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">

</head>

<body>

<div class="xp-menubar w-max btn-primary rounded-circle position-absolute p-3 btn bottom-0 m-4 "  >
            <span class="material-icons text-white">table_rows
            </span>
        </div>
    <!-- Sidebar  -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3><img src="/zarate/img/logo.png" class="img-fluid" /><span class="fw-bold">E.Zarate Hospital</span></h3>
        </div>
        <ul class="list-unstyled components">
            <li class="active">
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


</body>

</html>