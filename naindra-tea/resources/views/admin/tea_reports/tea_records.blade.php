<!doctype html>
<html lang="en">
@include('layouts/admin_header')
@push('title')
<title>Naindra Tea Farm | Tea Record Report</title>
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
                    <a href="{{url('/admin/tea-reports/employees')}}" class="w3-bar-item w3-button">Employees</a>
                    <a href="{{url('/admin/tea-reports/tea-records')}}" class="w3-bar-item w3-button w3-green">Tea
                        Records</a>
                    <a href="#" class="w3-bar-item w3-button">Chemical</a>
                    <a href="#" class="w3-bar-item w3-button">Fertilizer</a>
                    <a href="#" class="w3-bar-item w3-button">Suppliers</a>

                </div>


                <div class="container rounded-container bg-light mt-4">
                    <h2 class=" text-center">Tea Records' Analytics and Reports</h2>
                    <p class="text-center mb-3 text-dark h5">Naindra Tea Farm</p><br>
                    <form action="{{url('/admin/tea-reports/tea-records')}}" method="get">
                        @csrf
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
                                    @error('remarks')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror

                                    <button class="btn btn-primary" type="submit">Search</button>
                                    <a class="btn btn-danger" onclick="printTable()">Print</a>

                                </div>
                            </div>

                        </div><br>

                    </form>
                </div>


                <div class="container rounded-container bg-light mt-4">
                    @if($count>=1)
                    <div id="print-table">
                        <div class="container">
                            <img id="logoImage" class="mx-auto d-block" src="{{asset('assets/Images/2.png')}}"
                                width="80" alt="" /><br>
                            <h3 class="text-center text-dark m-0">Naindra Tea Farm</h3>
                            <p class="text-center text-dark p-0 m-0">Address: Bhadrapur-2</p>
                            <p class="text-center text-dark p-0 m-0">Email: {{Session()->get('email')}}</p>
                            <p class="text-center text-dark p-0 m-0">Mobile no: 9816043149</p><br>

                            <p class="text-dark m-0">Tea Plucked Date:<br>
                                @foreach($tearecord2 as $data)
                                <span>{{$data->nep_date}}</span><br>
                                @endforeach
                            </p>

                            <label class=" text-dark">Tea Round:
                                {{$remarks}}</label>

                            <br><br>

                            <div class="table-responsive mt-2">

                                <table id="tea-table" class="table rounded-billing-table rounded w3-border rounded-3">
                                    <thead id="tearecordtable bordered rounded shadow p-0 m-0" class="text-center">
                                        <tr>
                                            <th>Date</th>
                                            <th>Plucked Time</th>
                                            <th>Tea Kg</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center text-dark">
                                        @foreach($tearecord as $data)
                                        <tr>
                                            <td>{{$data['nep_date']}}</td>
                                            <td>{{$data['plucked_time']}}</td>
                                            <td>{{$data['total_tea_kg']}} Kg</td>
                                            <td>Rs. {{$data['total_amount']}}</td>
                                        </tr>
                                        @endforeach
                                        <tr id="total-row">
                                            <td colspan="2"></td>
                                            <td id="total-kg"></td>
                                            <td id="total-amount"></td>
                                        </tr>
                                    </tbody>


                                </table>
                            </div>

                        </div>




                    </div>







                    @else
                    <p class="text-center">Currently, there is no available data to retrieve. Please try searching using
                        the tea round as a parameter.</p>

                    @endif
                </div>

                <style>
                /* Custom styles for the billing table */
                .rounded-billing-table {
                    border-radius: 15px;
                    border-collapse: separate;
                    border-spacing: 0;
                    overflow: hidden;
                }

                .rounded-billing-table thead th {
                    background-color: #f1f1f1;
                }

                .rounded-billing-table th,
                .rounded-billing-table td {
                    padding: 10px 15px;
                    text-align: center;
                    border: 1px solid #ccc;
                }

                .rounded-billing-table tbody tr:last-child td {
                    border-bottom: none;
                }

                .rounded-billing-table tfoot td {
                    border-top: 1px solid #ccc;
                }


                /* Custom styles for the table when printing */
    @media print {
        .rounded-billing-table {
            border-radius: 15px;
            border-collapse: separate;
            border-spacing: 0;
            overflow: hidden;
        }

        .rounded-billing-table thead th {
            background-color: #f1f1f1;
        }

        .rounded-billing-table th,
        .rounded-billing-table td {
            padding: 10px 15px;
            text-align: center;
            border: 1px solid #ccc;
        }

        .rounded-billing-table tbody tr:last-child td {
            border-bottom: none;
        }

        .rounded-billing-table tfoot td {
            border-top: 1px solid #ccc;
        }
    }

                
                </style>



                <script>
                // Wait for the document to load before executing the JavaScript code
                document.addEventListener('DOMContentLoaded', function() {
                    // Calculate total amount
                    var rows = document.querySelectorAll('#tea-table tbody tr');
                    var totalAmount = 0;
                    for (var i = 0; i < rows.length - 1; i++) { // Exclude the last row (total row)
                        var amountCell = rows[i].querySelector('td:nth-child(3)');
                        if (amountCell) {
                            totalAmount += parseFloat(amountCell.innerText.replace('Rs. ', ''));
                        }
                    }

                    // Display total amount
                    var totalAmountCell = document.getElementById('total-kg');
                    if (totalAmountCell) {
                        const quantilFactor = 100; // Adjust the factor as needed
                        const totalQuantil = totalAmount / quantilFactor;
                        totalAmountCell.innerText = 'Total: ' + totalQuantil + ' Quantils';
                    }

                });
                </script>


                <script>
                // Wait for the document to load before executing the JavaScript code
                document.addEventListener('DOMContentLoaded', function() {
                    // Calculate total amount
                    var rows = document.querySelectorAll('#tea-table tbody tr');
                    var totalAmount = 0;
                    for (var i = 0; i < rows.length - 1; i++) { // Exclude the last row (total row)
                        var amountCell = rows[i].querySelector('td:nth-child(4)');
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
                        
                        totalAmountCell.innerText = 'Total Rs: ' + formattedTotalAmount;
                    }


                });
                </script>






                <script>
                function printTable() {
                    var printContents = document.getElementById("print-table").innerHTML;
                    var originalContents = document.body.innerHTML;
                    document.body.innerHTML = printContents;

                    var logoImage = document.getElementById("logoImage");
                    logoImage.onload = function() {
                        window.print();
                        document.body.innerHTML = originalContents;
                    };
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


</body>

</html>