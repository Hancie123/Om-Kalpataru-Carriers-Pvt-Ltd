<!doctype html>
<html lang="en">
@include('layouts/admin_header')
@push('title')
<title>Naindra Tea Farm | Tea Bill Report</title>
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
                    <a href="{{url('/admin/tea-reports/tea-bill')}}" class="w3-bar-item w3-button w3-green">Tea
                        Bills</a>
                    <a href="{{url('/admin/tea-reports/employees')}}" class="w3-bar-item w3-button">Employees</a>
                    <a href="{{url('/admin/tea-reports/tea-records')}}" class="w3-bar-item w3-button">Tea Records</a>
                    <a href="#" class="w3-bar-item w3-button">Chemical</a>
                    <a href="#" class="w3-bar-item w3-button">Fertilizer</a>
                    <a href="#" class="w3-bar-item w3-button">Suppliers</a>

                </div>


                <div class="container rounded-container bg-light mt-4">
                    <h2 class=" text-center">Tea Bill Analytics and Reports</h2>
                    <p class="text-center mb-3 text-dark h5">Naindra Tea Farm</p><br>
                    <form action="{{url('/admin/tea-reports/tea-bill')}}" method="get">
                        <div class="row">
                            <div class="col-md-2">
                                <label class="h5 mt-2 p-0 m-0">Search By Round:</label>
                            </div>
                            <div class="col-md-10">
                                <div class="input-group mb-3">
                                    <select class="select2 form-control" name="remarks" id="remarks">
                                        @foreach($teabills as $data)
                                        <option value="{{$data['remarks']}}">{{$data['remarks']}}</option>
                                        @endforeach()
                                    </select>

                                    <button class="btn btn-primary" type="submit">Search</button>
                                    @error('remarks')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                        </div><br>

                    </form>
                </div>

                <br>




                @if(isset($teabillreport))
                <div class="container rounded-container bg-light">
                    <h5>Showing Record(s) of 
                        @if(!empty($remarks))
                        {{$remarks}}
                        @else
                        All Time
                        @endif

                    </h5>
                    <div class="row">
                        <div class="col-md-4">
                            <div style="background-image: linear-gradient(green, yellow);" id="card" class="card">
                                <div class="card-body w3-border-red w3-leftbar rounded">
                                    <h4 class="card-title text-light"><i class='bx bx-leaf'></i> Total Tea Kg</h4>
                                    <h4 class="text-light">{{ $teabillreport->total_tea_kg }} Kg</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div style="background-image: linear-gradient(green, yellow);" id="card" class="card">
                                <div class="card-body w3-border-red w3-leftbar rounded">
                                    <h4 class="card-title text-light"><i class='bx bx-leaf'></i> Total Wage Kg</h4>
                                    <h4 class="text-light">{{ $teabillreport->total_wage_kg }} Kg</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div style="background-image: linear-gradient(green, yellow);" id="card" class="card">
                                <div class="card-body w3-border-red w3-leftbar rounded">
                                    <h4 class="card-title text-light"><i class='bx bx-leaf'></i> Total Wage Amount</h4>
                                    <h4 class="text-light">Rs. {{ $teabillreport->total_wage_amount}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-4">
                            <div style="background-image: linear-gradient(green, yellow);" id="card" class="card">
                                <div class="card-body w3-border-red w3-leftbar rounded">
                                    <h4 class="card-title text-light"><i class='bx bx-leaf'></i> Total OT Amount</h4>
                                    <h4 class="text-light">Rs. {{ $teabillreport->total_ot_amount }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div style="background-image: linear-gradient(green, yellow);" id="card" class="card">
                                <div class="card-body w3-border-red w3-leftbar rounded">
                                    <h4 class="card-title text-light"><i class='bx bx-leaf'></i> Total Amount</h4>
                                    <h4 class="text-light">Rs. {{ $teabillreport->total_amount2}}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">

                        </div>
                    </div>


                </div>
                @else
                <div class="container rounded-container bg-light">
                    <h5 class="text-center">Please select round and no of days to show record</h5>
                </div>
                @endif





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