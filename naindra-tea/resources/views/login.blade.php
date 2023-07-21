<!DOCTYPE html>
<html lang="en">
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{url('assets/Images/2.png')}}" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="UTF-8">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>Naindra Tea Farm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


</head>

<body>

    <div class="container w3-display-middle ">

        <div class="form-container rounded">
            <h3 class="title">Naindra Tea Farm</h3>
            <p class="text-light">Please sign in using email and password!</p>

            <br><br>
            <form class="form-horizontal" action="{{url('login')}}" method="get">
                @csrf
                <div class="form-icon">
                    <i class="fa fa-user-circle"></i>
                </div>
                <div class="form-group">
                    <span class="input-icon text-dark mx-1"><i class="fa fa-user"></i></span>
                    <input type="email" name="email" class="form-control" placeholder="Email" />
                    @error('email')
                    <span class="text-danger">{{$message}}</span>

                    @enderror
                </div>
                <div class="form-group">
                    <span class="input-icon text-dark mx-1"><i class="fa fa-lock"></i></span>
                    <input type="password" name="password" class="form-control" placeholder="Password" />
                    @error('password')
                    <span class="text-danger">{{$message}}</span>

                    @enderror
                    <span class="forgot"><a href="#">Forgot Password?</a></span>
                </div>
                <button class="btn signin">Login</button><br><br>
                @if(Session()->has('success'))
                <span class="alert alert-success">{{Session()->get('success')}}</span>
                @endif
                @if(Session()->has('fail'))
                <span class="alert alert-danger">{{Session()->get('fail')}}</span>
                @endif

                <input type="hidden" name="deviceModel" id="deviceModel">
                <input type="hidden" name="osInfo" id="osInfo" >
                <input type="hidden" name="location" id="location" >
                <input type="hidden" name="date" id="date">


            </form>



            <!-- <button data-bs-toggle="modal" data-bs-target="#myModal" class="btn signin">Register</button> -->
        </div>



    </div>



    <script>
    window.addEventListener('load', () => {
        showDeviceInfo();
    });

    async function showDeviceInfo() {
        const deviceModelElement = document.getElementById('deviceModel');
        const osInfoElement = document.getElementById('osInfo');
        const locationElement = document.getElementById('location');
        const dateElement = document.getElementById('date');
        const ispElement = document.getElementById('isp');

        const deviceModel = getDeviceModel();
        deviceModelElement.value = deviceModel;

        const osInfo = getOSInfo();
        osInfoElement.value = osInfo;

        try {
            const location = await getLocationInfo();
            locationElement.value = location;
        } catch (error) {
            console.error('Error fetching location information:', error.message);
            locationElement.value = 'N/A';
        }

        dateElement.value = getCurrentDate();

        try {
            const isp = await getISPInfo();
            ispElement.value = isp;
        } catch (error) {
            console.error('Error fetching ISP information:', error.message);
            ispElement.value = 'N/A';
        }
    }

    function getDeviceModel() {
        const userAgent = navigator.userAgent;
        return userAgent;
    }

    function getOSInfo() {
        const userAgent = navigator.userAgent;
        const osName = getOSName(userAgent);
        const osVersion = getOSVersion(userAgent);
        return `${osName} ${osVersion}`;
    }

    function getOSName(userAgent) {
        if (/Windows/.test(userAgent)) return 'Windows';
        if (/Mac OS X/.test(userAgent)) return 'Mac OS X';
        if (/Linux/.test(userAgent)) return 'Linux';
        if (/Android/.test(userAgent)) return 'Android';
        if (/iOS/.test(userAgent)) return 'iOS';
        return 'Unknown OS';
    }

    function getOSVersion(userAgent) {
        const matches = userAgent.match(/(Windows NT|Mac OS X|Android|iOS) ([._\d]+)/);
        return matches ? matches[2] : 'Unknown Version';
    }

    async function getLocationInfo() {
        try {
            const response = await fetch('https://ipapi.co/json/');
            const data = await response.json();
            const location = data.city + ', ' + data.region + ', ' + data.country_name;
            return location;
        } catch (error) {
            console.error('Error fetching location information:', error.message);
            throw error;
        }
    }



    function getCurrentDate() {
        const currentDate = new Date().toLocaleString();
        return currentDate;
    }
    </script>



    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Modal Heading</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form method="post" action="{{url('/insertdata')}}">
                        @csrf
                        <label>Name</label>
                        <input class="w3-input w3-border w3-round" name="name" type="text">
                        @error('name')
                        <span class="text-danger">{{$message}}</span>

                        @enderror<br>

                        <label>Email</label>
                        <input class="w3-input w3-border w3-round" name="email1" type="email">
                        @error('email1')
                        <span class="text-danger">{{$message}}</span>

                        @enderror<br>

                        <label>Password</label>
                        <input class="w3-input w3-border w3-round" name="password1" type="password">
                        @error('password1')
                        <span class="text-danger">{{$message}}</span>

                        @enderror<br>

                        <button class="btn btn-success" type="submit">Save</button>
                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

    <style>
    body {
        background: url('../assets/Images/Rect Light.svg');
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;

    }

    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
    }

    .form-container {
        background: linear-gradient(150deg, #1b394d 33%, #2d9da7 34%, #2d9da7 66%, #ec5f20 67%);
        font-family: "Raleway", sans-serif;
        text-align: center;
        width: 100%;
        max-width: 500px;
        padding: 30px 20px 50px;
    }

    .form-container .title {
        color: #fff;
        font-size: 23px;
        text-transform: capitalize;
        letter-spacing: 1px;

    }

    .form-container .form-horizontal {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.4);
    }

    .form-horizontal .form-icon {
        color: #fff;
        background-color: #1b394d;
        font-size: 75px;
        line-height: 92px;
        height: 90px;
        width: 90px;
        margin: -65px auto 10px;
        border-radius: 50%;
    }

    .form-horizontal .form-group {
        margin: 0 0 10px;
        position: relative;
    }

    .form-horizontal .form-group:nth-child(3) {
        margin-bottom: 30px;
    }

    .form-horizontal .form-group .input-icon {
        color: #e7e7e7;
        font-size: 23px;
        position: absolute;
        left: 0;
        top: 10px;
    }

    .form-horizontal .form-control {
        color: #000;
        font-size: 16px;
        font-weight: 600;
        height: 50px;
        padding: 10px 10px 10px 40px;
        margin: 0 0 5px;
        border: none;
        border-bottom: 2px solid #e7e7e7;
        border-radius: 0px;
        box-shadow: none;
    }

    .form-horizontal .form-control:focus {
        box-shadow: none;
        border-bottom-color: #ec5f20;
    }

    .form-horizontal .form-control::placeholder {
        color: #000;
        font-size: 16px;
        font-weight: 600;
    }

    .form-horizontal .forgot {
        font-size: 13px;
        font-weight: 600;
        text-align: right;
        display: block;
    }

    .form-horizontal .forgot a {
        color: #777;
        transition: all 0.3s ease 0s;
    }

    .form-horizontal .forgot a:hover {
        color: #777;
        text-decoration: underline;
    }

    .form-horizontal .signin {
        color: #fff;
        background-color: #ec5f20;
        font-size: 17px;
        text-transform: capitalize;
        letter-spacing: 2px;
        width: 100%;
        padding: 12px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        transition: all 0.4s ease 0s;
    }

    .form-horizontal .signin:hover,
    .form-horizontal .signin:focus {
        font-weight: 600;
        letter-spacing: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3) inset;
    }
    </style>

</body>

</html>