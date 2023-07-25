<!doctype html>
<html lang="en">
@include('layouts/admin_header')
@push('title')
<title>Naindra Tea Farm | {{Session('name')}} Profile</title>
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





                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="card">
                                <img class="card-img-top img-fluid mx-auto d-block mt-3" src="{{asset('assets/Images/2.png')}}"
                                    alt="Card image" style="max-width: 50%; height: auto;" />
                                    <label class="text-center text-dark mt-3 h5">Naindra Tea Farm</label>
                                    <label class="text-center text-dark h5">Bhadrapur-2,Jhapa</label>
                                <div class="card-body">
                                    <h4 class="card-title text-center">Name: {{Session('name')}}</h4>
                                    <h5 class="card-text text-center">Email: {{Session('email')}}</h5>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="card">
                            <h3 class="text-center">Change password</h3>
                                <div class="card-body">
                                    <form action="{{url('/admin/profile/change-password')}}" method="post">
                                        @csrf
                                        <label>Current Password</label>
                                        <input class="w3-input w3-border w3-round" name="current_password" type="text">
                                        <span class="text-danger">
                                            @error('current_password')
                                            {{$message}}
                                            @enderror
                                        </span>
                                        <br>
                                        <label>New Password</label>
                                        <input class="w3-input w3-border w3-round" name="new_password" type="text">
                                        <span class="text-danger">
                                            @error('new_password')
                                            {{$message}}
                                            @enderror
                                        </span>
                                        <br>
                                        <label>Confirm password</label>
                                        <input class="w3-input w3-border w3-round" name="confirm_password" type="text">
                                        <span class="text-danger">
                                            @error('confirm_password')
                                            {{$message}}
                                            @enderror
                                        </span>
                                        <br>
                                        <button type="submit" class="btn btn-primary mt-3">Change password</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>









                @include('layouts/admin_footer')


            </div>
        </div>
    </div>
    @livewireScripts
</body>

</html>