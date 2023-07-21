<!--  Header Start -->
<header class="app-header shadow">
    <nav class="navbar navbar-expand-lg navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
                <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                    <i class="bx bx-menu bx-sm"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                    <i class='bx bx-bell bx-sm'></i>
                    <div class="notification bg-primary rounded-circle"></div>
                </a>
            </li>
        </ul>
        <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                <li class="nav-item dropdown">
                    <iframe class="mt-2" scrolling="no" border="0" frameborder="0" marginwidth="0" marginheight="0"
                        allowtransparency="true"
                        src="https://www.ashesh.com.np/linknepali-time.php?dwn=only&font_color=333333&font_size=14&bikram_sambat=0&api=731273n184"
                        width="120" height="23"></iframe>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#calendermodal"><span><i
                                class="bi bi-calendar3 bx-sm"></i></span></a>
                </li>

                <li class="nav-item dropdown">

                    <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img src="{{asset('assets/Images/2.png')}}" alt="" width="35" height="35"
                            class=" border rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                        <div class="message-body">
                            <a href="{{url('/admin/profile')}}" class="d-flex align-items-center gap-2 dropdown-item">
                                <i class="ti ti-user fs-6"></i>
                                <p class="mb-0 fs-3">My Profile</p>
                            </a>
                            <a href="{{url('/admin/tools')}}" class="d-flex align-items-center gap-2 dropdown-item">
                                <i class="bi bi-tools"></i>
                                <p class="mb-0 fs-3">Tools</p>
                            </a>
                            <a href="{{url('/admin/acivity-logs')}}" class="d-flex align-items-center gap-2 dropdown-item">
                            <i class='bx bx-time-five bx-sm'></i>
                                <p class="mb-0 fs-3">Activity Logs</p>
                            </a>
                            <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                                <i class="ti ti-mail fs-6"></i>
                                <p class="mb-0 fs-3">Settings</p>
                            </a>
                            <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                                <i class="ti ti-list-check fs-6"></i>
                                <p class="mb-0 fs-3">Logout</p>
                            </a>
                            <a href="./authentication-login.html"
                                class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
<style>
body {

    background: #F5F7FF;
}
</style>

<!------------ The Nepali Calender Modal ---------------->
<div class="modal" id="calendermodal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">My Calender</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Start of nepali calendar widget -->
            <script type="text/javascript">
            <!--
            var nc_width = 'responsive';
            var nc_height = 300;
            var nc_api_id = 22120230717687; //
            -->
            </script>
            <script type="text/javascript" src="https://www.ashesh.com.np/calendarlink/nc.js"></script>
            <!-- End of nepali calendar widget -->
            <br>
        </div>
    </div>
</div>

<!--  Header End -->