 <!-- Sidebar Start -->
 <aside class="left-sidebar">
     <!-- Sidebar scroll-->
     <div>
         <div class="brand-logo d-flex align-items-center justify-content-between">
             <a href="{{url('admin/dashboard')}}" class="text-nowrap logo-img mx-auto d-block mt-2" id="logoLink">
                 <img src="{{asset('assets/Images/2.png')}}" width="80" alt="" />
             </a>


             <!-- Custom context menu -->
             <div id="customMenu" class="custom-menu rounded">
                 <ul>
                     <li><a href="#" data-bs-toggle="modal" data-bs-target="#myModal"><span><i
                                     class='bx bx-image-alt mx-1'></i></span>Change Image</a></li>

                 </ul>
             </div>



             <script>
             // Get the logo link element
             var logoLink = document.getElementById('logoLink');

             // Get the custom menu element
             var customMenu = document.getElementById('customMenu');

             // Show the custom menu on right-click
             logoLink.addEventListener('contextmenu', function(event) {
                 event.preventDefault();
                 customMenu.style.display = 'block';
                 customMenu.style.left = event.pageX + 'px';
                 customMenu.style.top = event.pageY + 'px';
             });

             // Hide the custom menu on right-click release or click outside
             document.addEventListener('click', function(event) {
                 customMenu.style.display = 'none';
             });
             </script>


             <style>
             .custom-menu {
                 display: none;
                 position: absolute;
                 background-color: #f9f9f9;
                 border: 1px solid #ccc;
                 padding: 8px;
                 z-index: 1000;
             }


             .custom-menu ul {
                 list-style-type: none;
                 margin: 0;
                 padding: 0;
             }

             .custom-menu ul li a {
                 color: #333;
                 text-decoration: none;
                 display: block;
                 padding: 5px;
             }

             .custom-menu ul li a:hover {
                 background-color: #ccc;
             }

             .left-sidebar {
                 height: 100vh;
                 /* Set a fixed height, e.g., 100% of the viewport height */
                 overflow-y: hidden;
                 /* Hide the vertical scrollbar */
             }

             /* Hide the scroll on the sidebar navigation items */
             .left-sidebar nav.sidebar-nav {
                 overflow-y: hidden;
             }

             /* Set the maximum height for the sidebar content to accommodate the available space */
             .left-sidebar .scroll-sidebar {
                 max-height: calc(100vh - 100px);
                 /* Adjust the height as needed */
                 /* Subtract any extra height (e.g., header height) from the total viewport height */
                 /* In this example, I assumed the header height to be 100px, adjust this value as per your design */
                 overflow-y: auto;
                 /* Add a vertical scroll if needed when content exceeds the available space */
             }
             </style>


             <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                 <i class='bx bx-x bx-sm'></i>
             </div>
         </div>
         <!-- Sidebar navigation-->
         <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
             <ul id="sidebarnav">
                 <li class="nav-small-cap text-center">

                     <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                     <span class="hide-menu">Menus</span>
                 </li>
                 <li class="sidebar-item">
                     <a class="sidebar-link" href="{{url('admin/dashboard')}}" aria-expanded="false">
                         <span>
                             <i class='bx bxs-dashboard bx-sm'></i>
                         </span>
                         <span class="hide-menu">Dashboard</span>
                     </a>
                 </li>

                 <li class="sidebar-item">
                     <a class="sidebar-link" href="{{url('admin/employees')}}" aria-expanded="false">
                         <span>
                             <i class='bx bx-user bx-sm'></i>
                         </span>
                         <span class="hide-menu">Employees</span>
                     </a>
                 </li>

                 <li class="sidebar-item">
                     <a class="sidebar-link" href="{{url('admin/tea-records')}}" aria-expanded="false">
                         <span>
                             <i class="bi bi-cup-hot bx-sm"></i>
                         </span>
                         <span class="hide-menu">Tea Records</span>
                     </a>
                 </li>

                 <li class="sidebar-item">
                     <a class="sidebar-link" href="{{url('/admin/tea-suppliers')}}" aria-expanded="false">
                         <span>
                             <i class='bx bxs-truck bx-sm'></i>
                         </span>
                         <span class="hide-menu">Tea Suppliers</span>
                     </a>
                 </li>

                 <li class="sidebar-item">
                     <a class="sidebar-link" href="{{url('/admin/tea-bills')}}" aria-expanded="false">
                         <span>
                             <i class='bx bx-receipt bx-sm'></i>
                         </span>
                         <span class="hide-menu">Tea Bills</span>
                     </a>
                 </li>

                 <li class="sidebar-item">
                     <a class="sidebar-link" href="{{url('/admin/emp-bill')}}" aria-expanded="false">
                         <span>
                             <i class="bi bi-receipt bx-sm"></i>
                         </span>
                         <span class="hide-menu">Generate Emp Bill</span>
                     </a>
                 </li>

                 <li class="sidebar-item">
                     <a class="sidebar-link" href="{{url('/admin/chemical-expenses')}}" aria-expanded="false">
                         <span>
                             <i class="bi bi-wallet2 bx-sm"></i>
                         </span>
                         <span class="hide-menu">Chemical Expenses</span>
                     </a>
                 </li>

                 <li class="sidebar-item">
                     <a class="sidebar-link" href="{{url('/admin/fertilizer-expenses')}}" aria-expanded="false">
                         <span>
                             <i class="bi bi-wallet2 bx-sm"></i>
                         </span>
                         <span class="hide-menu">Fertilizer Expenses</span>
                     </a>
                 </li>

                 <li class="sidebar-item">
                     <a class="sidebar-link" href="{{url('/admin/tea-reports/tea-bill')}}" aria-expanded="false">
                         <span>
                             <i class="bi bi-graph-down bx-sm"></i>
                         </span>
                         <span class="hide-menu">Reports</span>
                     </a>
                 </li>


                 <li class="sidebar-item">
                     <a class="sidebar-link" href="{{url('/admin/settings')}}" aria-expanded="false">
                         <span>
                             <i class='bx bx-cog bx-sm'></i>
                         </span>
                         <span class="hide-menu">Settings</span>
                     </a>
                 </li>


                 <li class="sidebar-item">
                     <a class="sidebar-link" href="{{url('/logout')}}" aria-expanded="false">
                         <span>
                             <i class='bx bx-log-out bx-sm'></i>
                         </span>
                         <span class="hide-menu">Logout</span>
                     </a>
                 </li>



             </ul>

         </nav>
         <!-- End Sidebar navigation -->
     </div>
     <!-- End Sidebar scroll-->
 </aside>
 <!--  Sidebar End -->