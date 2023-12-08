<!-- resources/views/layouts/sidebar.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
        #sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #111;
            padding-top: 20px;
            transition: all 0.3s;
        }

        #sidebar.active {
            width: 80px;
        }

        #sidebar a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 18px;
            color: #818181;
            display: block;
            transition: padding 0.3s;
        }

        #sidebar.active a {
            padding: 8px;
        }

        .sidebar-header {
            padding: 16px;
            text-align: center;
        }

        #content {
            margin-left: 250px;
            padding: 16px;
            transition: margin-left 0.3s;
        }

        #content.active {
            margin-left: 80px;
        }

        #sidebar.active a {
            padding: 8px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .item-label {
            display: inline;
        }

        .item-icon {
            display: none;
        }

        .logo {
        width: 150px; /* Adjust the width as needed */
        height: 150px; /* Adjust the height as needed */
        border-radius: 50%; /* Make the logo image circular */
        overflow: hidden; /* Ensure the circular shape */
    }
     

        @media (max-width: 768px) {
            #sidebar {
                width: 0;
            }

            #content {
                margin-left: 0;
            }

            .item-dashboard, .item-analytics, .item-users, .item-membership, .item-profile, .item-logout {
                display: none;
            }
            #sidebar.active {
                width: 250px;
            }

            #content.active {
                margin-left: 250px;
            }

            .item-label {
                display: none;
            }

            .item-icon {
                display: inline;
            }
        }
    </style>
</head>
<body>
  
    <nav id="sidebar">
        <div class="sidebar-header">
            <!-- Use the logo as a dropdown toggle -->
            <div class="dropdown">
                <img src="images\psq_logo.jpg" alt="" class="img-fluid logo dropdown-toggle" id="logoDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="dropdown-menu" aria-labelledby="logoDropdown">
                    <a class="dropdown-item" href="#">Option 1</a>
                    <a class="dropdown-item" href="#">Option 2</a>
                    <a class="dropdown-item" href="#">Option 3</a>
                </div>
            </div>
        </div>

        <ul class="list-unstyled components">
            <li class="active">
                <a href="#" class="item-dashboard">
                    <i class="fa-solid fa-house"></i>
                    Dashboard
                </a>
            </li>

            <li>
                <a href="#" class="item-analytics">
                    <i class="fas fa-chart-line"></i>
                    Analytics
                </a>
            </li>

            <li>
                <a href="#" class="item-users">
                    <i class="fas fa-users"></i>
                    Users
                </a>
            </li>

            <li>
                <a href="#" class="item-membership">
                    <i class="fas fa-cogs"></i>
                    Membership 
                </a>
            </li>

            <li>
                <a href="#" class="item-profile">
                    <i class="fas fa-user"></i>
                    Profile
                </a>
            </li>

            <li>
                <a href="#" class="item-logout">
                    <i class="fas fa-sign-out-alt"></i>
                    Logout
                </a>
            </li>
        </ul>
        
    </nav>

 <!-- Add this updated script section at the end of your HTML body -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function () {
        // Initial setup for smaller screens
        if (window.innerWidth <= 768) {
            $('#sidebar').removeClass('active');
            $('#content').removeClass('active');
            $('.item-dashboard, .item-analytics, .item-users, .item-membership, .item-profile, .item-logout').hide();
            $('.logout-icon').show(); // Show the logout icon
        }

        // Logo dropdown toggle
        $('#logoDropdown').on('click', function () {
            if (window.innerWidth <= 768) {
                // For smaller screens, toggle sidebar and show items
                $('#sidebar').toggleClass('active');
                $('#content').toggleClass('active');
                $('.item-dashboard, .item-analytics, .item-users, .item-membership, .item-profile, .item-logout').toggle();
                $('.logout-icon').toggle();
            } else {
                // For larger screens, toggle labels and icons separately
                $('.item-label, .item-icon').toggle();
                $('#sidebar').toggleClass('active');
                $('#content').toggleClass('active');
                $('.logout-icon').toggle();
            }
        });

        // Sub-items toggle
        $('#sidebar .item-analytics a').on('click', function (e) {
            if (window.innerWidth <= 768) {
                e.preventDefault();
                $('#analyticsSubItems').collapse('toggle');
            }
        });

        $('#sidebar .item-users a').on('click', function (e) {
            if (window.innerWidth <= 768) {
                e.preventDefault();
                $('#usersSubItems').collapse('toggle');
            }
        });

        $('#sidebar .item-membership a').on('click', function (e) {
            if (window.innerWidth <= 768) {
                e.preventDefault();
                $('#membershipSubItems').collapse('toggle');
            }
        });

        $('#sidebarCollapse').on('click', function () {
            // Toggle sidebar without hiding items
            $('#sidebar').toggleClass('active');
            $('#content').toggleClass('active');
            if (window.innerWidth > 768) {
                // For larger screens, toggle labels, icons, and logout icon separately
                $('.item-label, .item-icon, .logout-icon').toggle();
            } else {
                // For smaller screens, toggle items and logout icon
                $('.item-dashboard, .item-analytics, .item-users, .item-membership, .item-profile, .item-logout, .logout-icon').toggle();
            }
        });

        // Adjust visibility on window resize
        $(window).on('resize', function () {
            if (window.innerWidth > 768) {
                // If the sidebar is expanded on larger screens, hide items and logout icon
                $('.item-dashboard, .item-analytics, .item-users, .item-membership, .item-profile, .item-logout, .logout-icon').addClass('hidden');
            } else if (!$('#sidebar').hasClass('active')) {
                // If the sidebar is minimized on smaller screens, show items and logout icon
                $('.item-dashboard, .item-analytics, .item-users, .item-membership, .item-profile, .item-logout, .logout-icon').toggle();
            }
        });
    });
</script> 


</body>
</html>
