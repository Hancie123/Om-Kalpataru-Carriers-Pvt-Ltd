<!doctype html>
<html lang="en">
@include('layouts/admin_header')
@push('title')
<title>Naindra Tea Farm | Tea Billing Statements For Employees Of {{$remarks}}</title>
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
                    <h2 class=" text-center">Generate Billing Statements for Employees</h2>
                    <p class="text-center mb-3 text-dark h5">Naindra Tea Farm</p><br>
                    <form action="{{url('/admin/emp-bill')}}" method="get">
                        @csrf

                        <div class="container">
                            <div class="row">
                                <div class="col-md-2">
                                    <!-- Content for the first column -->
                                    <label class="h5 mt-2 p-0 m-0">Search By Round:</label>
                                </div>
                                <div class="col-md-10">
                                    <!-- Content for the second column -->
                                    <div class="input-group mb-3">
                                        <select class="select2 form-control" name="remarks" id="remarks">
                                            @foreach($teabills as $data)
                                            <option value="{{$data['remarks']}}">{{$data['remarks']}}</option>
                                            @endforeach()
                                        </select>
                                        <button class="btn btn-primary" type="submit">Search</button>
                                        <button class="btn btn-danger" onclick="printTable()"
                                            type="button">Print</button>
                                    </div>
                                </div>
                            </div>
                        </div>








                    </form>


                    @if($count>=1)
                    <div class="container table-responsive">
                        <div id="print-table">
                            <p class="text-dark text-center h4 mt-4">Tea Bill Of {{$remarks}}</p>
                            <table id="bill-table" class="table table-bordered  rounded">
                                <thead id="table-heading" class="rounded text-danger">
                                    <tr>
                                        <th>Bill ID</th>
                                        <th>Nepali Date</th>
                                        <th>Name</th>
                                        <th>Wage Total Kg</th>
                                        <th>Wage Total Amount</th>
                                        <th>Tea Total Kg</th>
                                        <th>OT Total Amount</th>
                                        <th>Total Amount</th>
                                        <th>Remarks</th>
                                    </tr>
                                </thead>
                                <tbody class="text-dark">
                                    @foreach($teabillquery as $data)
                                    <tr>
                                        <td>{{$data->teabill_id}}</td>
                                        <td>{{$data->nep_date}}</td>
                                        <td>{{$data->Name}}</td>
                                        <td>{{$data->total_wage_kg}} Kg</td>
                                        <td>Rs. {{$data->total_wage_amount}}</td>
                                        <td>{{$data->total_tea_kg}} Kg</td>
                                        <td>Rs. {{$data->total_ot_amount}}</td>
                                        <td>Rs. {{$data->total_amount}}</td>
                                        <td>{{$data->remarks}}</td>
                                    </tr>
                                    @endforeach
                                    <tr id="total-row">
                                        <td colspan="7"></td>
                                        <td id="total-amount" colspan="2"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <button class="btn btn-primary" onclick="printTable()">Print Table</button>
                    </div>
                    @else
                    <p class="text-center p-3 bg-primary rounded text-light mt-3">Currently, there is no available data
                        to retrieve. Please try searching using the tea round as a parameter.</p>
                    @endif
                </div>


                <script>
                // Wait for the document to load before executing the JavaScript code
                document.addEventListener('DOMContentLoaded', function() {
                    // Calculate total amount
                    var rows = document.querySelectorAll('#bill-table tbody tr');
                    var totalAmount = 0;
                    for (var i = 0; i < rows.length - 1; i++) { // Exclude the last row (total row)
                        var amountCell = rows[i].querySelector('td:nth-child(8)');
                        if (amountCell) {
                            totalAmount += parseFloat(amountCell.innerText.replace('Rs. ', ''));
                        }
                    }

                    // Function to convert numeric value to words
                    function numberToWords(num) {
                        const ones = ['Zero', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight',
                            'Nine', 'Ten',
                            'Eleven', 'Twelve', 'Thirteen', 'Fourteen', 'Fifteen', 'Sixteen', 'Seventeen',
                            'Eighteen', 'Nineteen'
                        ];

                        const tens = ['', '', 'Twenty', 'Thirty', 'Forty', 'Fifty', 'Sixty', 'Seventy',
                            'Eighty', 'Ninety'
                        ];

                        function convertToWords(num) {
                            if (num < 20) return ones[num];
                            if (num < 100) return tens[Math.floor(num / 10)] + (num % 10 !== 0 ? '-' + ones[
                                num % 10] : '');
                            if (num < 1000) return ones[Math.floor(num / 100)] + ' Hundred' + (num % 100 !== 0 ?
                                ' and ' + convertToWords(num % 100) : '');
                            if (num < 1000000) return convertToWords(Math.floor(num / 1000)) + ' Thousand' + (
                                num % 1000 !== 0 ? ' ' + convertToWords(num % 1000) : '');
                            if (num < 1000000000) return convertToWords(Math.floor(num / 1000000)) +
                                ' Million' + (num % 1000000 !== 0 ? ' ' + convertToWords(num % 1000000) :
                                    '');
                            return 'Number too large';
                        }

                        return convertToWords(num);
                    }

                    // Assuming 'totalAmount' is a numeric value representing the total amount
                    // Display total amount with commas as thousands separators and in words
                    var totalAmountCell = document.getElementById('total-amount');
                    if (totalAmountCell) {
                        var formattedTotalAmount = totalAmount
                    .toLocaleString(); // Convert to string with commas
                        var totalAmountInWords = numberToWords(totalAmount);
                        totalAmountCell.innerText = 'Total Rs: ' + formattedTotalAmount + '\n(' +
                            totalAmountInWords + ' Rupees Only'+')';
                    }
                });
                </script>


                <script>
                function printTable() {
                    var printContents = document.getElementById("print-table").innerHTML;
                    var originalContents = document.body.innerHTML;
                    document.body.innerHTML = printContents;
                    window.print();
                    document.body.innerHTML = originalContents;
                }
                </script>




                <script>
                $(document).ready(function() {
                    $('.select2').select2({
                        placeholder: 'Select an option'
                    });
                });
                </script>





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