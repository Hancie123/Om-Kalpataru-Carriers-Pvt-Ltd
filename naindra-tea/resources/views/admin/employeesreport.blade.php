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

                        <form action="{{url('/admin/tea-reports/employees')}}" method="get">
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="h5 mt-2 p-0 m-0">Select Name:</label>
                                </div>
                                <div class="col-md-10">
                                    <div class="input-group mb-3">
                                        <select class="select2 form-control" name="name" id="name">
                                            @foreach($employeesall as $data)
                                            <option value="{{$data['name']}}">{{$data['name']}}</option>
                                            @endforeach
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




                </div>


                <div class="container rounded-container bg-light mt-4">
                    @if(isset($employeesdetails) && $employeesdetails->isNotEmpty())
                    <h4 class="text-center m-0">Employees Details</h4>
                    <p class="text-center text-dark">Naindra Tea Farm</p>

                    @foreach($employeesdetails as $employee)
                    <p class="text-dark m-0">Name: {{ $employee->Name }}</p>
                    <p class="text-dark m-0">Address: {{ $employee->Address ? $employee->Address : 'Null' }}</p>
                    <p class="text-dark m-0">Mobile No: {{ $employee->Mobile ? $employee->Mobile : 'Null' }}</p>
                    <p class="text-dark m-0">Account Created Date: {{ $employee->date }}</p>
                    <p class="text-dark m-0">Account Created: {{ $employee->created_at->diffForHumans() }}</p>
                    @endforeach

                    <div class="row mt-4">
                        <div class="col-md-9">
                            <p class="text-center text-dark">{{$name}} Tea Data</p>

                            <table class="table" id="employees-table">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Day</th>
                                        <th>Wage Kg</th>
                                        <th>Wage Amount</th>
                                        <th>Tea Kg</th>
                                        <th>OT Amount</th>
                                        <th>Total Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($employeesdate as $data)
                                    <tr>
                                        <td>{{ $data->nep_date ? $data->nep_date : 'Null' }}</td>
                                        <td>{{ $data->nep_date ? date('l', strtotime($data->nep_date)) : 'Null' }}</td>
                                        <td>{{ $data->wage_kg}} Kg</td>
                                        <td>Rs. {{ $data->wage_amount}}</td>
                                        <td>{{ $data->tea_kg}} Kg</td>
                                        <td>Rs. {{ $data->ot_amount}}</td>
                                        <td>Rs. {{ $data->total_amount}}</td>
                                    </tr>
                                    @endforeach
                                    <tr id="total-row" class="text-dark bg-success">
                                        <td colspan="2" class="text-center">Total </td>
                                        <td id="wage-kg"></td>
                                        <td id="wage-amount"></td>
                                        <td id="tea-kg"></td>
                                        <td id="ot-amount"></td>
                                        <td id="total-amount"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3">

                            <p class="text-center text-dark">Attended Date(s)</p>
                            <table class="table voucher-table">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Day</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($employeesdate as $data)
                                    <tr>
                                        <td>{{ $data->nep_date ? $data->nep_date : 'Null' }}</td>
                                        <td>{{ $data->nep_date ? date('l', strtotime($data->nep_date)) : 'Null' }}</td>
                                    </tr>
                                    @endforeach
                                    <tr class="text-dark bg-success">
                                        <td>Total Day(s)</td>
                                        <td>{{$countbill}} Day(s)</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>



                    












                    @else
                    <p class="text-center">Currently, there is no available data to retrieve. Please try searching using
                        the employees' name as a parameter.</p>
                    @endif


                </div>

                <script>
                // Wait for the document to load before executing the JavaScript code
                document.addEventListener('DOMContentLoaded', function() {
                    // Calculate total amount
                    var rows = document.querySelectorAll('#employees-table tbody tr');
                    var totalAmount = 0;
                    for (var i = 0; i < rows.length - 1; i++) { // Exclude the last row (total row)
                        var amountCell = rows[i].querySelector('td:nth-child(6)');
                        if (amountCell) {
                            totalAmount += parseFloat(amountCell.innerText.replace('Rs. ', ''));
                        }
                    }

                    // Display total amount
                    var totalAmountCell = document.getElementById('ot-amount');
                    if (totalAmountCell) {
                        var formattedTotalAmount = totalAmount
                            .toLocaleString(); // Convert to string with commas
                        totalAmountCell.innerText = 'Rs. ' + formattedTotalAmount;
                    }

                });
                </script>


                <script>
                // Wait for the document to load before executing the JavaScript code
                document.addEventListener('DOMContentLoaded', function() {
                    // Calculate total amount
                    var rows = document.querySelectorAll('#employees-table tbody tr');
                    var totalAmount = 0;
                    for (var i = 0; i < rows.length - 1; i++) { // Exclude the last row (total row)
                        var amountCell = rows[i].querySelector('td:nth-child(5)');
                        if (amountCell) {
                            totalAmount += parseFloat(amountCell.innerText.replace('Rs. ', ''));
                        }
                    }

                    // Display total amount
                    var totalAmountCell = document.getElementById('tea-kg');
                    if (totalAmountCell) {
                        var formattedTotalAmount = totalAmount
                            .toLocaleString(); // Convert to string with commas
                        totalAmountCell.innerText = formattedTotalAmount + ' Kg';
                    }

                });
                </script>


                <script>
                // Wait for the document to load before executing the JavaScript code
                document.addEventListener('DOMContentLoaded', function() {
                    // Calculate total amount
                    var rows = document.querySelectorAll('#employees-table tbody tr');
                    var totalAmount = 0;
                    for (var i = 0; i < rows.length - 1; i++) { // Exclude the last row (total row)
                        var amountCell = rows[i].querySelector('td:nth-child(4)');
                        if (amountCell) {
                            totalAmount += parseFloat(amountCell.innerText.replace('Rs. ', ''));
                        }
                    }

                    // Display total amount
                    var totalAmountCell = document.getElementById('wage-amount');
                    if (totalAmountCell) {
                        var formattedTotalAmount = totalAmount
                            .toLocaleString(); // Convert to string with commas
                        totalAmountCell.innerText = 'Rs. ' + formattedTotalAmount;
                    }

                });
                </script>


                <script>
                // Wait for the document to load before executing the JavaScript code
                document.addEventListener('DOMContentLoaded', function() {
                    // Calculate total amount
                    var rows = document.querySelectorAll('#employees-table tbody tr');
                    var totalAmount = 0;
                    for (var i = 0; i < rows.length - 1; i++) { // Exclude the last row (total row)
                        var amountCell = rows[i].querySelector('td:nth-child(3)');
                        if (amountCell) {
                            totalAmount += parseFloat(amountCell.innerText.replace('Rs. ', ''));
                        }
                    }

                    // Display total amount
                    var totalAmountCell = document.getElementById('wage-kg');
                    if (totalAmountCell) {
                        var formattedTotalAmount = totalAmount
                            .toLocaleString(); // Convert to string with commas
                        totalAmountCell.innerText = formattedTotalAmount + ' Kg';
                    }

                });
                </script>



                <script>
                // Wait for the document to load before executing the JavaScript code
                document.addEventListener('DOMContentLoaded', function() {
                    // Calculate total amount
                    var rows = document.querySelectorAll('#employees-table tbody tr');
                    var totalAmount = 0;
                    for (var i = 0; i < rows.length - 1; i++) { // Exclude the last row (total row)
                        var amountCell = rows[i].querySelector('td:nth-child(7)');
                        if (amountCell) {
                            totalAmount += parseFloat(amountCell.innerText.replace('Rs. ', ''));
                        }
                    }



                    // Assuming 'totalAmount' is a numeric value representing the total amount
                    // Display total amount with commas as thousands separators and in words
                    var totalAmountCell = document.getElementById('total-amount');
                    if (totalAmountCell) {
                        var formattedTotalAmount = totalAmount
                            .toLocaleString(); // Convert to string with commas

                        totalAmountCell.innerText = 'Rs. ' + formattedTotalAmount;
                    }


                });
                </script>

                <style>
                /* Add these styles to your CSS file or in a <style> tag within your HTML */

                .table {
                    border-collapse: collapse;
                    width: 100%;
                }

                .table th,
                .table td {
                    border: 1px solid #ccc;
                    padding: 8px;
                }

                .table thead th {
                    background-color: #f2f2f2;
                    text-align: center;
                }

                .voucher-table {
                    max-width: 300px;
                    /* Adjust the max-width to fit your design */
                    margin: 0 auto;
                    /* Center the table horizontally */
                    font-family: Arial, sans-serif;
                    /* Use any font you prefer */
                }

                .voucher-table tbody tr:nth-child(even) {
                    background-color: #f9f9f9;
                    /* Alternate row background color */
                }

                .voucher-table td:first-child {
                    text-align: center;
                    /* Center the content in the first column (Date) */
                }

                .voucher-table td:last-child {
                    text-align: center;
                    /* Center the content in the last column (Day) */
                }
                </style>




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

                .card {
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