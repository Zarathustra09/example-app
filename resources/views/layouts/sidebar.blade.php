

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
                <a href="{{ route('index')}}" class="item-dashboard">
                    <i class="fa-solid fa-house"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="#" class="item-roles">
                    <i class="fas fa-user-pen"></i>
                    <span>Roles</span>
                </a>
            </li>
            <li>
                <a href="#" class="item-membership">
                    <i class="fas fa-cogs"></i>
                    <span>Membership</span>
                </a>
            </li>

            <li>
                <a href="#" class="item-analytics">
                    <i class="fas fa-chart-line"></i>
                    <span>Analytics</span>
                </a>
            </li>

            <li>
                <a href="{{ route('profile.show')}}" class="item-profile">
                    <i class="fas fa-user"></i>
                    <span>Profile</span>
                </a>
            </li>

            <li>
                <a href="{{ route('logout') }}" class="item-logout" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                           
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </nav>

    


    <script>
        $(document).ready(function () {
            $('[data-toggle="sidebar"]').click(function () {
                $('#sidebar').toggleClass('minimized');
                $('#content').toggleClass('minimized-content');
            });
        });
    </script>
