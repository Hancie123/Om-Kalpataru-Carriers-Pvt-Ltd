<!doctype html>
<html lang="en">
@include('layouts/admin_header')
@push('title')
<title>Naindra Tea Farm | Chemical Expenses</title>
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




                <div class="container rounded-container bg-light">
                    <h2 class=" text-center">Chemical Expenses Management System</h2>
                    <p class="text-center mb-3 text-dark h5">Naindra Tea Farm</p><br>
                    <form action="{{url('/admin/chemical-expenses/insert')}}" method="post">
                        @csrf
                        <input type="hidden" name="date" value="<?php echo date("Y-m-d");?>" class="form-control"
                            readonly>
                        <div class="container">




                            <div class="row">
                                <div class="col-sm-4 column mb-3">
                                    <label class="form-label">Date</label>
                                    <input type="text" id="nepali-datepicker" class="form-control"
                                        placeholder="Enter date" name="nep_date">
                                    @error('nep_date')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-4 column mb-3">
                                    <label class="form-label">Product Name</label>
                                    <input type="text" class="form-control" id="product_name"
                                        placeholder="Enter Product Name" name="product_name">
                                    @error('product_name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-4 column mb-3">

                                    <label class="form-label">Rate</label>
                                    <input type="text" class="form-control" id="rate" placeholder="Enter Rate"
                                        name="rate">
                                    @error('rate')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror

                                </div>
                            </div>


                            <div class="row">
                                <div class="col-sm-4 column mb-3">
                                    <label class="form-label">Quantity</label>
                                    <input type="text" class="form-control" id="quantity" placeholder="Enter Quantity"
                                        name="quantity">
                                    @error('quantity')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-4 column mb-3">
                                    <label class="form-label">Total Amount</label>
                                    <input type="text" class="form-control" id="total_amount"
                                        placeholder="Total Total Amount" name="total_amount">
                                    @error('total_amount')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-4 column mb-3">
                                    <label class="form-label">Remarks</label>
                                    <select class="select2 form-select" name="remarks">
                                        <option>Select an option</option>
                                        <option value="First Round <?php echo date('Y')?>">First Round
                                            <?php echo date('Y')?></option>
                                        <option value="Second Round <?php echo date('Y')?>">Second Round
                                            <?php echo date('Y')?></option>
                                        <option value="Third Round <?php echo date('Y')?>">Third Round
                                            <?php echo date('Y')?></option>
                                        <option value="Fourth Round <?php echo date('Y')?>">Fourth Round
                                            <?php echo date('Y')?></option>
                                        <option value="Fifth Round <?php echo date('Y')?>">Fifth Round
                                            <?php echo date('Y')?></option>
                                        <option value="Sixth Round <?php echo date('Y')?>">Sixth Round
                                            <?php echo date('Y')?></option>
                                        <option value="Seventh Round <?php echo date('Y')?>">Seventh Round
                                            <?php echo date('Y')?></option>
                                        <option value="Eight Round <?php echo date('Y')?>">Eighth Round
                                            <?php echo date('Y')?></option>
                                        <option value="Ninth Round <?php echo date('Y')?>">Ninth Round
                                            <?php echo date('Y')?></option>

                                    </select>
                                    @error('remarks')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>


                        </div>


                        <button class="btn btn-primary" type="submit">Save Record</button>
                        <button class="btn btn-primary" type="reset">Reset</button>
                        <a class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#calculatormodel">Calculator</a>





                    </form>
                </div>


                <script>
                $(document).ready(function() {
                    // Get value on keyup and select change events
                    $("#rate, #quantity").on('keyup change', function() {
                        var total = 0;
                        var x = Number($("#rate").val());
                        var y = Number($("#quantity").val());

                        var totalamount = x * y;
                        $('#total_amount').val(totalamount);

                    });
                });
                </script>


                <div class="container responsive-table mt-3">
                    <table class="table" id="myTable">
                        <thead class="p-0 text-light" id="table-heading">
                            <tr>
                                <th>ID</th>
                                <th>Date</th>
                                <th>Product Name</th>
                                <th>Rate</th>
                                <th>Quantity</th>
                                <th>Total Amount</th>
                                <th>Remarks</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-dark">
                            @foreach($chemical as $data)
                            <tr>
                                <td>{{$data['chemicalexpenses_id']}}</td>
                                <td>{{$data['nep_date']}}</td>
                                <td>{{$data['product_name']}}</td>
                                <td>{{$data['rate']}}</td>
                                <td>{{$data['quantity']}}</td>
                                <td>{{$data['total_amount']}}</td>
                                <td>{{$data['remarks']}}</td>
                               

                                <td>
                                    @if ($data->updated_at)
                                    {{ $data->updated_at->diffForHumans() }}
                                    @else
                                    N/A
                                    @endif
                                </td>
                                <td>

                                    <div class="btn-group">

                                        <a href="{{url('/admin/chemical-expenses/delete/')}}/{{$data->chemicalexpenses_id}}"
                                            class="btn btn-primary bg-danger"><i class="bi bi-x-circle"></i></a>

                                    </div>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>








                <!-- Bootstrap Edit Modal -->
                <div class="modal fade" id="editModal" role="dialog" aria-labelledby="editModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header text-center ">
                                <h4 class="modal-title text-center">Update Tea Record</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <form action="{{url('/admin/tea-records/update')}}" method="post">
                                @csrf
                                <input type="hidden" id="tea_id" name="tea_id" />
                                <input type="hidden" name="date2" value="<?php echo date("Y-m-d");?>"
                                    class="form-control" readonly>
                                <div class="container">




                                    <div class="row">
                                        <div class="col-sm-4 column mb-3">
                                            <label class="form-label">Date</label>
                                            <input type="text" id="nepali-datepicker2" class="form-control"
                                                placeholder="Enter date" name="nep_date2" readonly>
                                            @error('nep_date2')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-4 column mb-3">
                                            <label class="form-label">Tea KG</label>
                                            <input type="text" class="form-control" id="tea_kg2"
                                                placeholder="Enter Tea Kg" name="tea_kg2">
                                            @error('tea_kg2')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-4 column mb-3">

                                            <label class="form-label">Tea Rate</label>
                                            <input type="text" class="form-control" id="tea_rate2"
                                                placeholder="Enter tea rate" name="tea_rate2">
                                            @error('tea_rate2')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror

                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-sm-4 column mb-3">
                                            <label class="form-label">Water Percent</label>
                                            <select class="form-select" id="water_percent2" name="water_percent2">
                                                <option>Select an option</option>
                                                <option value="0">0 Percent</option>
                                                <option value="1">1 Percent</option>
                                                <option value="2">2 Percent</option>
                                                <option value="3">3 Percent</option>
                                                <option value="4">4 Percent</option>
                                                <option value="5">5 Percent</option>
                                                <option value="6">6 Percent</option>
                                                <option value="7">7 Percent</option>
                                                <option value="8">8 Percent</option>
                                                <option value="9">9 Percent</option>
                                                <option value="10">10 Percent</option>
                                                <option value="11">11 Percent</option>
                                                <option value="12">12 Percent</option>
                                                <option value="13">13 Percent</option>
                                                <option value="14">14 Percent</option>
                                                <option value="15">15 Percent</option>

                                            </select>
                                            @error('water_percent2')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-4 column mb-3">
                                            <label class="form-label">Water Deducted Percent Kg</label>
                                            <input type="text" class="form-control" id="water_kg2"
                                                placeholder="Total Water KG" name="water_kg2" readonly>
                                            @error('water_kg2')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-4 column mb-3">
                                            <label class="form-label">Total Tea KG</label>
                                            <input type="text" class="form-control" id="total_kg2"
                                                placeholder="Total Tea" name="total_tea_kg2" readonly>
                                            @error('total_tea_kg2')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="row">
                                        <div class="col-sm-4 column mb-3">
                                            <label class="form-label">Total Amount</label>
                                            <input type="text" class="form-control" id="total_amount2"
                                                placeholder="Total Amount" id="total_amount2" name="total_amount2"
                                                readonly>
                                            @error('total_amount2')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-4 column mb-3">
                                            <label class="form-label">Plucked time</label>
                                            <select class="form-select" id="plucked_time2" name="plucked_time2">
                                                <option>Select an option</option>
                                                <option value="Morning">Morning</option>
                                                <option value="Afternoon">Afternoon</option>
                                                <option value="Whole Day">Whole Day</option>

                                            </select>
                                            @error('plucked_time2')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-4 column mb-3">
                                            <label class="form-label">Remarks</label>
                                            <select class="form-select" id="remarks2" name="remarks2">

                                                <option value="First Round <?php echo date('Y')?>">First Round
                                                    <?php echo date('Y')?></option>
                                                <option value="Second Round <?php echo date('Y')?>">Second Round
                                                    <?php echo date('Y')?>
                                                </option>
                                                <option value="Third Round <?php echo date('Y')?>">Third Round
                                                    <?php echo date('Y')?></option>
                                                <option value="Fourth Round <?php echo date('Y')?>">Fourth Round
                                                    <?php echo date('Y')?>
                                                </option>
                                                <option value="Fifth Round <?php echo date('Y')?>">Fifth Round
                                                    <?php echo date('Y')?></option>
                                                <option value="Sixth Round <?php echo date('Y')?>">Sixth Round
                                                    <?php echo date('Y')?></option>
                                                <option value="Seventh Round <?php echo date('Y')?>">Seventh Round
                                                    <?php echo date('Y')?>
                                                </option>
                                                <option value="Eight Round <?php echo date('Y')?>">Eighth Round
                                                    <?php echo date('Y')?></option>
                                                <option value="Ninth Round <?php echo date('Y')?>">Ninth Round
                                                    <?php echo date('Y')?></option>

                                            </select>
                                            @error('remarks2')
                                            <span class=" text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>


                                <button class="btn btn-primary m-3 mb-5" type="submit">Save Record</button>






                            </form>

                        </div>
                    </div>
                </div>
















                <!-- Bootstrap View Tea Records Modal -->
                <div class="modal fade" id="viewrecordmodal" role="dialog" aria-labelledby="editModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header text-center">
                                <h4 class="modal-title text-center">
                                    <label id="tea_id3" class="text-center"></label>
                                </h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <input type="hidden" id="tea_id" name="tea_id" />
                            <input type="hidden" name="date2" value="<?php echo date("Y-m-d");?>" class="form-control"
                                readonly>
                            <div class="container">

                                <div class="row">
                                    <div class="col-sm-4 column mb-3">
                                        <label class="form-label">Date: </label><br>
                                        <label class="form-label" id="nepali-datepicker3"></label>

                                    </div>
                                    <div class="col-sm-4 column mb-3">
                                        <label class="form-label">Tea KG:</label><br>
                                        <label class="form-label" id="tea_kg3"></label>

                                    </div>
                                    <div class="col-sm-4 column mb-3">

                                        <label class="form-label">Tea Rate:</label><br>
                                        <label class="form-label" id="tea_rate3"></label>

                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-sm-4 column mb-3">
                                        <label class="form-label">Water Percent:</label><br>
                                        <label class="form-label" id="water_percent3"></label>

                                    </div>
                                    <div class="col-sm-4 column mb-3">
                                        <label class="form-label">Water Deducted Percent KG:</label><br>
                                        <label class="form-label" id="water_kg3"></label>

                                    </div>
                                    <div class="col-sm-4 column mb-3">
                                        <label class="form-label">Total Tea KG:</label><br>
                                        <label class="form-label" id="total_kg3"></label>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 column mb-3">
                                        <label class="form-label">Total Amount:</label><br>
                                        <label class="form-label" id="total_amount3"></label>

                                    </div>
                                    <div class="col-sm-4 column mb-3">
                                        <label class="form-label">Plucked Time:</label><br>
                                        <label class="form-label" id="plucked_time3"></label>

                                    </div>
                                    <div class="col-sm-4 column mb-3">
                                        <label class="form-label">Remarks:</label><br>
                                        <label class="form-label" id="remarks3"></label>

                                    </div>
                                </div>

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

                #table-heading {
                    background: #3F3E91;


                }
                </style>

                <script>
                $(document).ready(function() {
                    $('#myTable').DataTable({
                        dom: 'lBfrtip',
                        buttons: [
                            'copyHtml5',
                            'excelHtml5',
                            'csvHtml5',
                            'pdfHtml5',
                            'print'
                        ],
                        order: [
                            [0, 'desc']
                        ],
                        pageLength: 20,
                        lengthMenu: [
                            [20, 50, 100, -1],
                            [20, 50, 100, 'All']
                        ],
                        pagingType: 'full_numbers',
                        lengthChange: true
                    });
                });
                </script>

                <script>
                function editTearecords(id) {
                    $.get('/admin/tea-records/edit/' + id, function(data) {
                        $('#editModal').modal('show');
                        console.log(data.tea_id);
                        $("#tea_id").val(data.tea_id);
                        $("#nepali-datepicker2").val(data.nep_date);
                        $("#tea_kg2").val(data.tea_kg);
                        $("#tea_rate2").val(data.tea_rate); // Corrected ID here
                        $("#water_percent2").val(data.water_percent);
                        $("#water_kg2").val(data.water_kg);
                        $("#total_kg2").val(data.total_tea_kg);
                        $("#total_amount2").val(data.total_amount);
                        $("#plucked_time2").val(data.plucked_time);
                        $("#remarks2").val(data.remarks);


                    });
                }
                </script>


                <script>
                function viewTearecords(id) {
                    $.get('/admin/tea-records/edit/' + id, function(data) {
                        $('#viewrecordmodal').modal('show');
                        console.log(data.tea_id);
                        $("#tea_id3").text("Showing the Record of Tea ID " + data.tea_id + ".");
                        $("#nepali-datepicker3").text(data.nep_date);
                        $("#tea_kg3").text(data.tea_kg + " Kg");
                        $("#tea_rate3").text("Rs. " + data.tea_rate); // Corrected ID here
                        $("#water_percent3").text(data.water_percent + "%");
                        $("#water_kg3").text(data.water_kg + " Kg");
                        $("#total_kg3").text(data.total_tea_kg + " Kg");
                        $("#total_amount3").text("Rs. " +
                            data.total_amount);
                        $("#plucked_time3").text(data.plucked_time);
                        $("#remarks3").text(data.remarks);


                    });
                }
                </script>


                <script type="text/javascript">
                var elm = document.getElementById("nepali-datepicker");

                /* Initialize Datepicker with options */
                elm.nepaliDatePicker({
                    language: "english"
                });
                </script>






                <script>
                $(document).ready(function() {
                    // Get value on keyup and select change events
                    $("#tea_kg2, #tea_rate2, #water_percent2").on('keyup change', function() {
                        var total = 0;
                        var x = Number($("#tea_kg2").val());
                        var y = Number($("#tea_rate2").val());
                        var z = Number($("#water_percent2").val());

                        var waterpercent = x / 100 * z;
                        var netkg = x - waterpercent;
                        var totalamount = netkg * y;
                        $('#water_kg2').val(waterpercent);
                        $('#total_kg2').val(netkg);
                        $('#total_amount2').val(totalamount);
                    });
                });
                </script>



                <style>
                .dataTables_wrapper .dataTables_paginate .paginate_button {
                    color: #ffffff !important;
                    /* Set the desired text color */
                }

                /* Change the background color of the table header */
                #table_data thead {
                    background-color: rgb(63, 62, 145);
                    color: #fff;
                }

                /* Change the font size and weight of the table header */
                #table_data th {
                    font-size: 16px;
                    font-weight: bold;
                }

                /* Change the background color and font size of the table rows */
                #table_data tbody tr {
                    background-color: #f8f9fa;
                    font-size: 14px;
                }

                /* Add hover effect to the table rows */
                #table_data tbody tr:hover {
                    background-color: #e2e6ea;
                }

                .dataTables_wrapper .dataTables_filter input {
                    font-size: 14px;
                    padding: 6px;
                    width: 300px;
                    border-radius: 5px;
                }

                .dataTables_wrapper .dataTables_filter label {
                    font-size: 14px;
                    font-weight: bold;
                }

                /* Change the background color of the DataTable buttons */
                .dataTables_wrapper .dt-buttons button {
                    background-color: #3f3e91;
                    color: white;
                }

                /* Change the background color of the DataTable buttons on hover */
                .dataTables_wrapper .dt-buttons button:hover {
                    background-color: #3e8e41;
                    color: white;
                }

                .dataTables_wrapper .dataTables_paginate .paginate_button {
                    color: white;
                    background-color: #3f3e91;
                    border-color: #007bff;
                }

                .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
                    color: #fff;
                    background-color: #3e8e41;
                    border-color: #0056b3;
                }

                .dataTables_wrapper .dataTables_paginate .paginate_button.current {
                    color: white;
                    background-color: #3f3e91;
                    border-color: #0056b3;
                }
                </style>


                <!---------------------- The Calculator Modal ----------------------->
                <div class="modal" id="calculatormodel">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">My Calculator</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <div class="calculator">
                                <input type="text" name="screen" id="screen">
                                <table class="caltable">
                                    <tr>
                                        <td><button class="calbtn">(</button></td>
                                        <td><button class="calbtn">)</button></td>
                                        <td><button class="calbtn">C</button></td>
                                        <td><button class="calbtn">%</button></td>
                                    </tr>
                                    <tr>
                                        <td><button class="calbtn">7</button></td>
                                        <td><button class="calbtn">8</button></td>
                                        <td><button class="calbtn">9</button></td>
                                        <td><button class="calbtn">X</button></td>
                                    </tr>
                                    <tr>
                                        <td><button class="calbtn">4</button></td>
                                        <td><button class="calbtn">5</button></td>
                                        <td><button class="calbtn">6</button></td>
                                        <td><button class="calbtn">-</button></td>
                                    </tr>
                                    <tr>
                                        <td><button class="calbtn">1</button></td>
                                        <td><button class="calbtn">2</button></td>
                                        <td><button class="calbtn">3</button></td>
                                        <td><button class="calbtn">+</button></td>
                                    </tr>
                                    <tr>
                                        <td><button class="calbtn">0</button></td>
                                        <td><button class="calbtn">.</button></td>
                                        <td><button class="calbtn">/</button></td>
                                        <td><button class="calbtn">=</button></td>
                                    </tr>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>

                <style>
                .caltable {
                    margin: auto;
                }

                #screen {
                    border-radius: 21px;
                    border: 5px solid #244624;
                    font-size: 34px;
                    height: 65px;
                    width: 280px;
                }

                .calbtn {
                    border-radius: 10px;
                    font-size: 30px;
                    background: #978fa0;
                    width: 50px;
                    height: 50px;
                    margin: 6px;
                }

                .calculator {
                    background-color: #00C9A7;
                    padding: 6px;
                    display: inline-block;

                }

                .select2-container .select2-selection--single {
                    height: calc(2.25rem + 2px) !important;

                }
                </style>

                <script>
                let screen = document.getElementById('screen');
                buttons = document.querySelectorAll('button');
                let screenValue = '';
                for (item of buttons) {
                    item.addEventListener('click', (e) => {
                        buttonText = e.target.innerText;
                        console.log('Button text is ', buttonText);
                        if (buttonText == 'X') {
                            buttonText = '*';
                            screenValue += buttonText;
                            screen.value = screenValue;
                        } else if (buttonText == 'C') {
                            screenValue = "";
                            screen.value = screenValue;
                        } else if (buttonText == '=') {
                            screen.value = eval(screenValue);
                        } else {
                            screenValue += buttonText;
                            screen.value = screenValue;
                        }

                    })
                }
                </script>


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