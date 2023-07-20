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
                    <a href="{{url('/admin/tea-reports/tea-records')}}" class="w3-bar-item w3-button">Tea Records</a>
                    <a href="#" class="w3-bar-item w3-button">Chemical</a>
                    <a href="#" class="w3-bar-item w3-button">Fertilizer</a>
                    <a href="#" class="w3-bar-item w3-button">Suppliers</a>

                </div>

                <div class="container rounded-container bg-light mt-4">
                    <div class="row">
                        <div class="col-md-10 text-center">
                            <h2>Employees Collected Tea Analytics</h2>
                            <p class="mb-3 text-dark h5">Naindra Tea Farm</p>
                        </div>
                        <div class="col-md-2 text-right">
                            <button class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#employeesdata">Employees Tea Data</button>
                        </div>
                    </div>


                    <br>


                </div>




                <!-- The Modal -->
                <div class="modal" id="employeesdata">
                    <div class="modal-dialog modal-xl modal-dialog-scrollable">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                            <h4>Employees All Time Collected Tea Data</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                
                                <h5 class="text-dark mb-3">Showing {{$count}} Employees Data...</h5>
                                <div id="print-table">
                                    <div class="row">

                                        @foreach($employees as $data)
                                        <div class="col-md-3">
                                            <div class="card shadow">
                                                <div class="card-body">
                                                    <h4 class="card-title m-0">{{ $data->Name }}</h4>
                                                    <p class="text-success m-0">Total Tea: {{ $data->total_kg }} Kg</p>
                                                    <p class="text-danger">Total Amount: Rs. {{ $data->total }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            </div>

                        </div>
                    </div>
                </div>


                





                @include('layouts/admin_footer')

                <style>
                .rounded-container {
                    border: 1px solid #ccc;
                    border-radius: 10px;
                    padding: 20px;
                }

                .card{
                    border: 1px solid #ccc;
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