<!doctype html>
<html lang="en">
@include('layouts/admin_header')
@push('title')
<title>Naindra Tea Farm | Employees Management System</title>
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
                <h2 class=" text-center">Employees Account Management System</h2>
                <p class="text-center mb-3 text-dark h5">Naindra Tea Farm</p><br>
                    <form action="{{url('admin/employees/insertrecord')}}" method="post">
                        @csrf
                        <input type="hidden" name="date" value="<?php echo date("Y-m-d");?>" class="form-control"
                            readonly>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" placeholder="Enter name" name="name">
                                    @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control" placeholder="Enter address" name="address">
                                    @error('address')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="mobile" class="form-label">Mobile No</label>
                                    <input type="text" class="form-control" placeholder="Enter mobile" name="mobile">
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


                <div class="container responsive-table mt-3">
                    <table class="table" id="myTable">
                        <thead class="p-0 text-light" id="table-heading">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Mobile No</th>
                                <th>Address</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-dark">
                            @foreach($employee as $data)
                            <tr>
                                <td>{{$data['Employees_ID']}}</td>
                                <td>{{$data['Name']}}</td>
                                <td>{{$data['Mobile']}}</td>
                                <td>{{$data['Address']}}</td>
                                <td>
                                    @if ($data->created_at)
                                    {{ $data->created_at->diffForHumans() }}
                                    @else
                                    N/A
                                    @endif
                                </td>
                                <td>
                                    <a href="javascript:void(0)" onclick="editCustomer('{{$data['Employees_ID']}}')"
                                        class="btn btn-primary"><i class='bx bx-edit-alt'></i> Edit</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>





                <!-- Bootstrap Edit Modal -->
                <div class="modal fade" id="editModal" role="dialog" aria-labelledby="editModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Update Employee Details</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <form method="post" action="{{url('admin/employees/updaterecord')}}" class="p-4">
                                @csrf

                                <input type="hidden" id="employeeId" name="employeeId" />
                                <input type="hidden" name="date" value="<?php echo date("Y-m-d");?>"
                                    class="form-control" readonly>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Name</label>
                                            <input type="text" class="form-control" id="name" placeholder="Enter name"
                                                name="employees_name">
                                            @error('name')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="address" class="form-label">Address</label>
                                            <input type="text" class="form-control" id="address"
                                                placeholder="Enter address" name="employees_address">
                                            @error('address')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="mobile" class="form-label">Mobile No</label>
                                            <input type="text" class="form-control" id="mobile"
                                                placeholder="Enter mobile" name="employees_mobile">
                                            @error('mobile')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">

                                        </div>
                                    </div>
                                </div>


                                <button class="btn btn-primary" type="submit">Save Record</button>
                            </form>

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
                function editCustomer(id) {
                    $.get('/admin/employees/' + id, function(data) {
                        $('#editModal').modal('show');
                        console.log(data.Employees_ID);
                        $("#employeeId").val(data.Employees_ID);
                        $("#name").val(data.Name);
                        $("#mobile").val(data.Mobile); // Corrected ID here
                        $("#address").val(data.Address);
                    });
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


            </div>
        </div>
    </div>

    @livewireScripts
</body>

</html>