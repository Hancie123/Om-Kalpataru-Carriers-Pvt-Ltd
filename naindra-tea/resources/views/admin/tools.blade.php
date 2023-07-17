<!doctype html>
<html lang="en">
@include('layouts/admin_header')
@push('title')
<title>Naindra Tea Farm | Tea Bills</title>
@livewireStyles
</head>

<body>

    @if(session('success'))
    @php
    $success = Session::get('success');
    $fail = Session::get('fail');
    @endphp
    <script>
    Swal.fire({
        title: '{{ $success }}',
        width: 600,
        padding: '3em',
        backdrop: 'rgba(0, 0, 123, 0.4) left top no-repeat',
    });
    </script>
    @endif

    @if(session('fail'))
    @php
    $success = Session::get('success');
    $fail = Session::get('fail');
    @endphp
    <script>
    Swal.fire({
        title: '{{ $fail }}',
        width: 600,
        padding: '3em',
        backdrop: 'rgba(0, 0, 123, 0.4) left top no-repeat'
    });
    </script>
    @endif


    <!-- Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        @include('layouts/admin_sidebar')
        <!--  Main wrapper -->
        <div class="body-wrapper">
            @include('layouts/admin_nav')
            <div class="container-fluid">


                <!-- The Side Image Image Chnage Modal -->
                <div class="modal" id="myModal">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title text-center">Change application logo</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                Modal body..
                            </div>



                        </div>
                    </div>
                </div>
                <!-- The Side Image Image Chnage Modal -->



                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#home">Horoscope</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#menu1">Calendar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#menu2">Exchange Rate</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane container active" id="home"><br>
                        <iframe src="https://www.ashesh.com.np/rashifal/widget.php?header_title=Nepali
                         Rashifal (Naindra Tea Farm)&header_color=3cd699&api=731270n320" frameborder="0"
                            scrolling="yes" marginwidth="0" marginheight="0"
                            style="border:none; overflow:hidden; width:100%; height:665px; border-radius:5px;"
                            allowtransparency="true">
                        </iframe><br>
                    </div>



                    <div class="tab-pane container fade" id="menu1"><br>
                        <!-- Start of nepali calendar widget -->
                        <script type="text/javascript">
                        <!--
                        var nc_width = 'responsive';
                        var nc_height = 700;
                        var nc_api_id = "731276n310"; //
                        -->
                        </script>
                        <script type="text/javascript" src="https://www.ashesh.com.np/nepali-calendar/js/ncf.js?v=5">
                        </script>

                        <!-- End of nepali calendar widget -->

                    </div>
                    <div class="tab-pane container fade" id="menu2"><br>
                        <iframe
                            src="https://www.ashesh.com.np/forex/widget2.php?api=731279n322&header_color=38b45e&background_color=faf8ee&header_title=Nepal%20Exchange%20Rates"
                            frameborder="0" scrolling="no" marginwidth="0" marginheight="0"
                            style="border:none; overflow:hidden; width:100%; height:383px; border-radius:5px;"
                            allowtransparency="true">
                        </iframe>
                    </div>
                </div>





                @include('layouts/admin_footer')


            </div>
        </div>
    </div>
    @livewireScripts
</body>

</html>