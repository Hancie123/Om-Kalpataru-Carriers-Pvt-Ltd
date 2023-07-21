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






                <div class="container rounded-container bg-light">
                    <h2 class=" text-center">Tea Bill Management System</h2>
                    <p class="text-center mb-3 text-dark h5">Naindra Tea Farm</p><br>
                    <form action="{{url('/admin/tea-bills/insert')}}" method="post">
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
                                    <label class="form-label">Employee Name</label>
                                    <div class="input-group">
                                        <select class="select2 form-select" name="employee_name">
                                            <option>Select an option</option>
                                            @foreach($employee as $data)
                                            <option value="{{ $data->Employees_ID }}">{{ $data->Name }}</option>
                                            @endforeach
                                        </select>
                                        <a class="btn btn-success" data-bs-toggle="modal"
                                            data-bs-target="#employeesmodal"><i class='bx bxs-book-add'></i></a>
                                    </div>

                                    @error('employee_name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-4 column mb-3">

                                    <label class="form-label">Basic Wage Amount</label>

                                    @if($countwage>=1)
                                    @foreach($wage as $data)
                                    <div class="input-group mb-3">
                                        <input type="hidden" class="form-control" placeholder="Basic KG"
                                            value="{{$data['wage_kg']}}" id="wage_kg" name="wage_kg" readonly>
                                        <input type="text" class="form-control" name="wage_amount" id="wage_amount"
                                            placeholder="Basic Wage" value="{{$data['wage_amount']}}" readonly>
                                        <a class="btn btn-success" data-bs-toggle="modal"
                                            data-bs-target="#editwagemodal"><i class="bi bi-pencil-square"></i></a>
                                    </div>
                                    @endforeach
                                    @else
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Basic Wage">
                                        <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#wagemodal"><i
                                                class="bi bi-plus-circle"></i></a>
                                    </div>
                                    @endif


                                    @error('wage_amount')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4 column mb-3">
                                    <label class="form-label">Total Kg</label>
                                    <input type="text" class="form-control" id="tea_kg" placeholder="Enter Tea Kg"
                                        name="tea_kg">
                                    @error('tea_kg')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-sm-4 column mb-3">
                                    <label class="form-label">OT(Over Time) Amount </label>
                                    <input type="text" class="form-control" id="ot_amount" placeholder="OT Amount"
                                        name="ot_amount" readonly>
                                    @error('ot_amount')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-sm-4 column mb-3">
                                    <label class="form-label">Total Amount</label>
                                    <input type="text" class="form-control" id="total_amount" placeholder="Total Amount"
                                        name="total_amount" readonly>
                                    @error('total_amount')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row">
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

                                <div class="col-sm-4 column mb-3">

                                </div>

                                <div class="col-sm-4 column mb-3">

                                </div>
                            </div>

                        </div>


                        <button class="btn btn-primary" type="submit">Save Record</button>
                        <a class="btn btn-primary" href="{{url('/admin/tea-bills/view')}}">View Bills</a>
                        <button class="btn btn-primary" type="reset">Reset</button>

                    </form>
                </div>



                <!-- The Modal -->
                <div class="modal" id="employeesmodal">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Create Employee Account</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <form class="m-3" action="{{url('admin/employees/insertrecord')}}" method="post">
                                @csrf
                                <input type="hidden" name="date" value="<?php echo date("Y-m-d");?>"
                                    class="form-control" readonly>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Name</label>
                                            <input type="text" class="form-control" placeholder="Enter name"
                                                name="name">
                                            @error('name')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="address" class="form-label">Address</label>
                                            <input type="text" class="form-control" placeholder="Enter address"
                                                name="address">
                                            @error('address')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="mobile" class="form-label">Mobile No</label>
                                            <input type="text" class="form-control" placeholder="Enter mobile"
                                                name="mobile">
                                            @error('mobile')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">

                                        </div>
                                    </div>
                                </div>


                                <button class="btn btn-primary" type="submit">Save Record</button>
                                <button class="btn btn-primary" type="reset">Reset Form</button>





                            </form>

                        </div>
                    </div>
                </div>


                <script>
                $(document).ready(function() {
                    // Get value on keyup and select change events
                    $("#wage_kg, #wage_amount, #tea_kg").on('keyup change', function() {
                        var total = 0;
                        var wage_kg = Number($("#wage_kg").val());
                        var wage_amount = Number($("#wage_amount").val().replace("Rs. ",
                            "")) || 0;
                        var tea_kg = Number($("#tea_kg").val());

                        ot_kg = tea_kg - wage_kg;
                        ot_amount = ot_kg * 2;
                        total_amount = ot_amount + wage_amount;

                        $('#ot_amount').val(ot_amount);
                        $('#total_amount').val(total_amount);

                    });
                });
                </script>


                <!------------------- The Edit Basic Wage Modal ---------------------------->
                <div class="modal" id="editwagemodal">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Edit Basic Wage Amount</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                @foreach($wage as $data)
                                <form action="{{ url('/admin/wage/update', $data->wage_id) }}" method="post">
                                    @csrf

                                    <label class="form-label">Basic Wage Kg</label>
                                    <input type="text" class="form-control" placeholder="Basic wage kg"
                                        value="{{ $data->wage_kg }}" name="wage_kg"><br>
                                    <label class="form-label">Basic Wage</label>
                                    <input type="hidden" value="{{ $data->wage_id }}" name="wage_id" />
                                    <input type="text" class="form-control" placeholder="Enter wage amount"
                                        value="{{ $data->wage_amount }}" name="wage">

                                    @error('wage')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <br>
                                    <button class="btn btn-primary" type="submit">Edit Record</button>
                                </form>
                                @endforeach

                            </div>


                        </div>
                    </div>
                </div>


                <!------------------- The Basic Wage Modal ---------------------------->
                <div class="modal" id="wagemodal">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Add Basic Wage</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <form action="{{url('/admin/wage/insert')}}" method="post">
                                    @csrf
                                    <label class="form-label">Basic Wage Kg</label>
                                    <input type="text" class="form-control" placeholder="Basic wage kg"
                                        name="wage_kg"><br>
                                    <label class="form-label">Basic Wage</label>
                                    <input type="text" class="form-control" placeholder="Enter wage amount" name="wage">
                                    @error('wage')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    <br>
                                    <button class="btn btn-primary" type="submit">Save Record</button>
                                </form>
                            </div>


                        </div>
                    </div>
                </div>

                <br>
                <div class="table-responsive">
                    <table class="table  table-hover table-striped" id="table_data">
                        <thead>
                            <tr>
                                <th>Bill ID</th>
                                <th>Date</th>
                                <th>Employee Name</th>
                                <th>Wage Kg</th>
                                <th>Wage Amount</th>
                                <th>Tea Kg</th>
                                <th>OT Amount</th>
                                <th>Total Amount</th>
                                <th>Remarks</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                    </table>
                </div>


                <script>
                $(document).ready(function() {
                    var table = $('#table_data').DataTable({
                        ajax: {
                            url: '/admin/tea-bills/ajax',
                            type: 'GET',
                            dataType: 'json',
                            processing: true,
                            serverSide: true,
                        },
                        processing: true,
                        columns: [{
                                data: 'teabill_id'
                            },
                            {
                                data: 'nep_date'
                            },
                            {
                                data: 'Name'
                            },
                            {
                                data: 'wage_kg',
                                render: function(data) {
                                    return data + ' Kg';
                                }
                            },
                            {
                                data: 'wage_amount',
                                render: function(data) {
                                    return ' Rs.' + data;
                                }
                            },
                            {
                                data: 'tea_kg',
                                render: function(data) {
                                    return data + ' Kg';
                                }
                            },
                            {
                                data: 'ot_amount',
                                render: function(data) {
                                    return ' Rs.' + data;
                                }
                            },
                            {
                                data: 'total_amount',
                                render: function(data) {
                                    return ' Rs.' + data;
                                }
                            },
                            {
                                data: 'remarks'
                            },
                            {
                                data: null,
                                render: function(data, type, row) {
                                    // Add an edit button for each row
                                    return '<a  class="btn btn-danger btn-sm" onclick="deleteAccess(' +
                                        row.teabill_id + ')">Delete</button>';
                                }
                            }
                        ],
                        dom: 'Bfrtip',
                        buttons: [
                            'copy',
                            'excelHtml5',
                            'csvHtml5',
                            'pdfHtml5',
                            'print'
                        ],
                        order: [
                            [0, 'desc']
                        ],
                        lengthMenu: [
                            [20, 50, 100, -1],
                            [20, 50, 100, 'All']
                        ],
                        pagingType: 'full_numbers',
                        lengthChange: true // Enable the length change option
                    });
                });
                </script>

                <script>
                function deleteAccess(teabill_id) {
                    if (confirm('Are you sure you want to delete this tea bill record?')) {
                        $.ajax({
                            url: '/admin/tea-bills/delete/' + teabill_id,
                            type: 'GET',
                            data: {
                                _method: 'DELETE'
                            },
                            success: function(response) {
                                if (response.status === 'success') {
                                    Swal.fire({
                                        icon: 'success',
                                        title: response.message,
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                    $('#table_data').DataTable().ajax.reload();
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Error',
                                        text: response.message
                                    });
                                }
                            },
                            error: function(xhr, status, error) {
                                console.error(xhr.responseText);
                            }
                        });
                    }
                }
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

                <style>
                .rounded-container {
                    border: 1px solid #ccc;
                    border-radius: 10px;
                    padding: 20px;
                }

                #table-heading {
                    background: #3F3E91;


                }

                .select2-container .select2-selection--single {
                    height: calc(2.25rem + 2px) !important;

                }
                </style>



                <script type="text/javascript">
                var elm = document.getElementById("nepali-datepicker");

                /* Initialize Datepicker with options */
                elm.nepaliDatePicker({
                    language: "english"
                });
                </script>



                @include('layouts/admin_footer')
                <script>
                $(document).ready(function() {
                    $('.select2').select2({

                    });
                });
                </script>

            </div>
        </div>
    </div>
    @livewireScripts
</body>

</html>