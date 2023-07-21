<!doctype html>
<html lang="en">
@include('layouts/admin_header')
@push('title')
<title>Naindra Tea Farm</title>
</head>

<body>


    @if(session('success'))
    @php
    $name = Session::get('name');
    @endphp
    <script>
    Swal.fire({
        title: 'Welcome {{ $name }}',
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


                <div class=" card w-100 ">
                    <div class="card-body p-4 mb-5">
                        <div class="mb-4">
                            <h5 class="card-title fw-semibold">Login Activities</h5>
                        </div>
                        <ul class="timeline-widget mb-0 position-relative mb-n5">

                            @foreach($activity as $data)
                            <li class="timeline-item d-flex position-relative overflow-hidden">
                                <div style="word-wrap: break-word;" class="timeline-time text-dark flex-shrink-0 text-end">
                                    User Accessed Time<br>
                                    {{$data->created_at->diffForHumans()}}</div>
                                <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                                    <span
                                        class="timeline-badge border-2 border border-success flex-shrink-0 my-8"></span>
                                    <span class="timeline-badge-border d-block flex-shrink-0"></span>
                                </div>
                                <div class="timeline-desc fs-3 text-dark mt-n1 h3" style="word-wrap: break-word; text-align: left;">
    Device Modal: {{$data->deviceModel}}<br>
    OS: {{$data->osInfo}}<br>
    Location: {{$data->location}}<br>
    Time: {{$data->date}}
</div>


                            </li>
                            @endforeach
                            


                        </ul>

                    </div>
                </div>
                {{ $activity->links('pagination::bootstrap-5') }}


            </div>
        </div>
    </div>



    @include('layouts/admin_footer')


</body>

</html>