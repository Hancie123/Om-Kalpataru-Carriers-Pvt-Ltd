<!doctype html>
<html lang="en">
@include('layouts/admin_header')
@push('title')
<title>Naindra Tea Farm | view Tea Bills</title>
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






                
                <table class="table table-hover table-striped" id="table_data">
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


       

                


                





               



<script>
    $(document).ready(function() {
    var table = $('#table_data').DataTable({
        ajax: {
            url: '/admin/tea-bills/ajax',
            type: 'GET',
            dataType: 'json',
        },
        processing: true,
        columns: [
            { data: 'teabill_id' },
            { data: 'nep_date' },
            { data: 'Name' },
            { data: 'wage_kg' },
            { data: 'wage_amount' },
            { data: 'tea_kg' },
            { data: 'ot_amount' },
            { data: 'total_amount' },
            { data: 'remarks' },
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