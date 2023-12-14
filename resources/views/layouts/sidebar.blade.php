<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Reset some default styles */
        body, h1, h2, h3, p, ul {
            margin: 0;
            padding: 0;
        }

        /* Adjustments for a sidebar that occupies the left side */
        #sidebar {
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0; /* Occupy the entire height of the screen */
            z-index: 1000;
            width: 250px; /* Adjust as needed */
            background-color: #001f3f; /* Dark blue background */
            color: #fff; /* White text */
            overflow-y: auto; /* Enable vertical scrolling if content exceeds the height */
            transition: width 0.3s; /* Smooth transition for width changes */
        }

        /* Style for the logo image */
        .logo {
            width: 80%; /* Adjust as needed */
            height: auto;
            border-radius: 50%;
            cursor: pointer;
            margin: 10px auto;
            display: block;
        }

        /* Add space between the icons and text */
        .list-unstyled.components a i {
            margin-right: 10px;
            font-size: 1.2rem; /* Adjust the font size for icons */
        }

        /* Style for the list items */
        .list-unstyled.components li {
            padding: 10px;
            transition: background-color 0.3s, box-shadow 0.3s;
            list-style: none; /* Remove the default list item styles */
        }

        .list-unstyled.components li:hover {
            background-color: #003366; /* Darker background on hover */
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1); /* Subtle box shadow on hover */
        }

        .list-unstyled.components a {
            text-decoration: none; /* Remove underline from links */
            color: #ffc107; /* Gold color for labels */
            font-size: 1.2rem; /* Adjust the font size for labels */
            display: flex;
            align-items: center;
        }

        /* Add styles for the minimized state */
        #sidebar.minimized {
            width: 50px; /* Adjust as needed */
        }

        #sidebar.minimized .logo {
            width: 100%; /* Adjust as needed */
            text-align: center;
        }

        #sidebar.minimized .list-unstyled.components {
            padding: 10px;
        }

        #sidebar.minimized .list-unstyled.components li {
            padding: 5px;
            text-align: center; /* Center align text */
        }

        #sidebar.minimized .list-unstyled.components a span {
            display: none; /* Hide the text in the minimized state */
        }

        #sidebar.minimized .list-unstyled.components a i {
            margin-right: 5px;
            font-size: 1.5rem; /* Increase the font size for icons when minimized */
            margin-bottom: 5px; /* Add bottom padding to icons in minimized state */
        }

        /* Content adjustment for smaller screens */
        #content {
            margin-left: 250px; /* Adjust as needed */
            transition: margin-left 0.3s; /* Smooth transition for margin-left changes */
        }

        /* Responsive design for smaller screens */
        @media (max-width: 768px) {
            body {
                margin-left: 0;
            }

            #sidebar {
                width: 0;
                display: none;
            }

            #content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body class="sidebar-minimized">

    <nav id="sidebar">
         <div class="sidebar-header">
        <!-- Use the logo as a dropdown toggle -->
        <div class="dropdown">
            <img src="images\psq_logo.jpg" alt="" class="img-fluid logo dropdown-toggle" id="logoDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            @auth
                <div style="color: #ffc107; text-align: center; margin-top:20px;margin-bottom:50px;">
                    {{ Auth::user()->email }}
                </div>
            @endauth
        </div>
    </div>

        <ul class="list-unstyled components">
            <li class="active">
                <a href="#" class="item-dashboard">
                    <i class="fa-solid fa-house"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li>
                <a href="#" class="item-analytics">
                    <i class="fas fa-chart-line"></i>
                    <span>Analytics</span>
                </a>
            </li>


            <li>
                <a href="#" class="item-membership">
                    <i class="fas fa-cogs"></i>
                    <span>Membership</span>
                </a>
            </li>

            <li>
                <a href="#" class="item-profile">
                    <i class="fas fa-user"></i>
                    <span>Profile</span>
                </a>
            </li>

            <li>
                <a href="#" class="item-logout">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </nav>

    

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function () {
            $('[data-toggle="sidebar"]').click(function () {
                $('#sidebar').toggleClass('minimized');
                $('#content').toggleClass('minimized-content');
            });
        });
    </script>

</body>
</html>
