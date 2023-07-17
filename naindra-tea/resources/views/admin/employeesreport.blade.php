<!doctype html>
<html lang="en">
@include('layouts/admin_header')
@push('title')
<title>Naindra Tea Farm | Employees Report</title>
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


                <div id="w3-bar" class="w3-bar">
                    <a href="{{url('/admin/tea-reports/tea-bill')}}" class="w3-bar-item w3-button">Tea
                        Bills</a>
                    <a href="{{url('/admin/tea-reports/employees')}}"
                        class="w3-bar-item w3-button w3-green">Employees</a>
                    <a href="#" class="w3-bar-item w3-button">Chemical</a>
                    <a href="#" class="w3-bar-item w3-button">Fertilizer</a>
                    <a href="#" class="w3-bar-item w3-button">Suppliers</a>

                </div>

                <div class="container rounded-container bg-light mt-4">
                    <div class="row">
                        <div class="col-md-11 text-center">
                            <h2>Employees Collected Tea Analytics</h2>
                            <p class="mb-3 text-dark h5">Naindra Tea Farm</p>
                        </div>
                        <div class="col-md-1 text-right">
                            <button class="btn btn-primary" onclick="printTable()">Print</button>
                        </div>
                    </div>


                    <br>
                    <div id="print-table">
                        <div class="row">

                            @foreach($employees as $data)
                            <div class="col-md-3">
                                <div style="background-image: linear-gradient(green, yellow);" id="card" class="card">
                                    <div class="card-body w3-border-red w3-leftbar rounded">
                                        <h4 class="text-light">{{ $data->Name }}</h4>
                                        <h4 class="text-light">{{ $data->total_kg }} Kg</h4>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>



            <script>
            function printTable() {
                var printContents = document.getElementById("print-table").innerHTML;
                var originalContents = document.body.innerHTML;
                document.body.innerHTML = printContents;
                window.print();
                document.body.innerHTML = originalContents;
            }
            </script>








            @include('layouts/admin_footer')

            <style>
            .rounded-container {
                border: 1px solid #ccc;
                border-radius: 10px;
                padding: 20px;
            }

            #table-heading {
                background: #3F3E91;


            }

            #w3-bar {
                background-color: rgb(63, 62, 145);
                color: #fff;
                font-size: 16px;
                font-family: Verdana, sans-serif;

            }

            .select2-container .select2-selection--single {
                height: calc(2.25rem + 2px) !important;

            }
            </style>











            <script>
            $(document).ready(function() {
                $('.select2').select2({
                    placeholder: 'Select an option'
                });
            });
            </script>




        </div>
    </div>
    </div>

    @livewireScripts
</body>

</html>