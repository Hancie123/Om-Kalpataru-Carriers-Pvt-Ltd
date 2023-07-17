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
                <h2 class=" text-center">Tea Suppliers Management System</h2>
                <p class="text-center mb-3 text-dark h5">Naindra Tea Farm</p><br>
                    <form action="{{url('/admin/tea-suppliers/insert')}}" method="post">
                        @csrf
                        <input type="hidden" name="date" value="<?php echo date("Y-m-d");?>" class="form-control"
                            readonly>

                        <input type="hidden" class="form-control" id="tea_id" name="tea_id">
                        <div class="container">




                            <div class="row">
                                <div class="col-sm-4 column mb-3">
                                    <label class="form-label">Date</label>
                                    <select class="select2 form-control" id="date720" name="nep_date">
                                        <option value="">Select an Option</option>
                                        @foreach($tearecords as $data)
                                        <option value="{{$data['nep_date']}}">
                                            {{ explode(' ', $data['remarks'])[0] }}
                                            {{ explode(' ', $data['remarks'])[1] }}
                                            {{$data['nep_date']}}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('nep_date')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-4 column mb-3">
                                    <label class="form-label">Plucked Time</label>
                                    <select class="select2 form-control" name="plucked_time" id="plucked_time">
                                        <option value="">Select an Option</option>
                                    </select>
                                    @error('plucked_time')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-4 column mb-3">

                                    <label class="form-label">Suppliers</label>
                                    <input type="text" class="form-control" id="suppliers"
                                        placeholder="Enter Supplier Name" name="supplier_name">
                                    @error('supplier_name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4 column mb-3">
                                    <label class="form-label">Vechile No.</label>
                                    <input type="text" class="form-control" id="vehicle_number"
                                        placeholder="Enter Vehicle Number" name="vehicle_number">
                                    @error('vehicle_number')
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
                        <button class="btn btn-primary" type="reset">Reset</button>

                    </form>
                </div>


                <div class="container table-responsive mt-3">
                    <table class="table" id="myTable">
                        <thead class="p-0 text-light" id="table-heading">
                            <tr>
                                <th>ID</th>
                                <th>Date</th>
                                <th>Tea KG</th>
                                <th>Tea Rate</th>
                                <th>Water Percent</th>
                                <th>Water KG</th>
                                <th>Total Tea</th>
                                <th>Amount</th>
                                <th>Plucked</th>
                                <th>Remarks</th>
                                <th>Supplier</th>
                                <th>Vehicle No.</th>
                                <th>Updated</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-dark">
                            @foreach($suppliers as $data)
                            <tr>
                                <td>{{$data['tea_id']}}</td>
                                <td>{{$data['nep_date']}}</td>
                                <td>{{$data['tea_kg']}} Kg</td>
                                <td>Rs. {{$data['tea_rate']}}</td>
                                <td>{{$data['water_percent']}} %</td>
                                <td>{{$data['water_kg']}} Kg</td>
                                <td>{{$data['total_tea_kg']}} Kg</td>
                                <td>Rs. {{$data['total_amount']}}</td>
                                <td>{{$data['plucked_time']}}</td>
                                <td>{{$data['remarks']}}</td>
                                <td>{{$data['supplier_name']}}</td>
                                <td>{{$data['vehicle_number']}}</td>

                                <td>
                                    @if ($data->updated_at)
                                    {{ $data->updated_at->diffForHumans() }}
                                    @else
                                    N/A
                                    @endif
                                </td>
                                <td>

                                    <div class="btn-group">

                                        <a href="{{url('/admin/tea-suppliers/delete/')}}/{{$data->tea_id}}"
                                            class="btn btn-primary bg-danger"><i class="bi bi-x-circle"></i></a>

                                    </div>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>


                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script>
                $(document).ready(function() {
                    $('#date720').on('change', function() {
                        var selectedOption = $(this).val();
                        if (selectedOption !== "") {
                            // Retrieve the data based on the selected option's value
                            $.ajax({
                                url: '/get-tea-data/' + selectedOption,
                                method: 'GET',
                                success: function(response) {
                                    // Clear previous options
                                    $('#plucked_time').empty();

                                    // Append new options based on retrieved data
                                    for (var i = 0; i < response.length; i++) {
                                        var option = $('<option>');
                                        option.val(response[i].tea_id);
                                        option.text(response[i].plucked_time);
                                        $('#plucked_time').append(option);
                                    }

                                    // Set the tea_id value in the input field
                                    var teaId = response[0]
                                        .tea_id; // Assuming only one option is selected
                                    $('#tea_id').val(teaId);
                                }
                            });
                        } else {
                            // Clear the second field if no option is selected
                            $('#plucked_time').empty();
                            $('#tea_id').val(''); // Clear the tea_id input field
                        }
                    });
                });
                </script>


                <script>
                $(document).ready(function() {
                    $('#date720').on('change', function() {
                        var selectedOption = $(this).val();
                        if (selectedOption !== "") {
                            // Retrieve the data based on the selected option's value
                            $.ajax({
                                url: '/get-tea-data/' + selectedOption,
                                method: 'GET',
                                success: function(response) {
                                    // Clear previous options
                                    $('#plucked_time').empty();

                                    // Append new options based on retrieved data
                                    for (var i = 0; i < response.length; i++) {
                                        var option = $('<option>');
                                        option.val(response[i].tea_id);
                                        option.text(response[i].plucked_time);
                                        $('#plucked_time').append(option);
                                    }
                                }
                            });
                        } else {
                            // Clear the second field if no option is selected
                            $('#plucked_time').empty();
                            $('#tea_id').val(''); // Clear the tea_id input field
                        }
                    });

                    $('#plucked_time').on('change', function() {
                        var selectedTeaId = $(this).val();
                        $('#tea_id').val(selectedTeaId);
                    });
                });
                </script>


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



                <script>
                $(document).ready(function() {
                    $('.select2').select2({
                        placeholder: 'Select an option'
                    });
                });
                </script>












                @include('layouts/admin_footer')


            </div>
        </div>
    </div>


    @livewireScripts
</body>

</html>