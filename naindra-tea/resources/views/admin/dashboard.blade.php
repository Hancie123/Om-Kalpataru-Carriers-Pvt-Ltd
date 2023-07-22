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



                <div class="row">
                    <!-- First column -->
                    <div class="col-sm-6">
                        <div class="card p-3">

                            <label class="h4 m-4"><i class='bx bx-sun bx-md text-warning'></i> <span id="greeting"></span>,
                                {{Session()->get('name')}}</label><br>


                            <div class="row align-items-center mt-4 mb-4">
                                <!-- First column with a vertical line on the right side -->
                                <div class="col-4 text-center pr-3" style="border-right: 1px solid #ccc;">
                                    <a href="{{url('admin/employees')}}" class="text-dark bx-flashing-hover">
                                        <i class='bx bx-user bx-md text-success'></i><br>
                                        Employees</a>
                                </div><br>

                                <!-- Second column -->
                                <div class="col-4 text-center pl-3" style="border-right: 1px solid #ccc;">
                                    <a href="{{url('admin/tea-records')}}" class="text-dark bx-flashing-hover">
                                        <i class='bx bx-leaf bx-md text-success'></i><br>
                                        Tea Records</a>
                                </div>
                                <!-- Second column -->
                                <div class="col-4 text-center pl-3" >
                                    <a href="{{url('/admin/tea-suppliers')}}" class="text-dark bx-flashing-hover">
                                        <i class='bx bxs-truck bx-md text-success'></i><br>
                                        Suppliers</a>
                                </div>
                            </div>


                            <div class="row align-items-center mt-4 mb-4">
                                <!-- First column with a vertical line on the right side -->
                                <div class="col-4 text-center pr-3" style="border-right: 1px solid #ccc;">
                                    <a href="{{url('/admin/tea-bills')}}" class="text-dark bx-flashing-hover">
                                        <i class='bx bx-receipt bx-md text-success'></i><br>
                                        Tea Bill</a>
                                </div><br>

                                <!-- Second column -->
                                <div class="col-4 text-center pl-3" style="border-right: 1px solid #ccc;">
                                    <a href="#" class="text-dark bx-flashing-hover">
                                        <i class='bx bx-cog bx-md text-success'></i><br>
                                        Settings</a>
                                </div>
                                <!-- Second column -->
                                <div class="col-4 text-center pl-3" >
                                    <a href="#" class="text-dark bx-flashing-hover">
                                        <i class='bx bx-user-circle bx-md text-success'></i><br>
                                        Profile</a>
                                </div>
                            </div>

                        </div>






                    </div>

                    <!-- Second column -->
                    <div class="col-sm-6">
                        <div class="card p-3">
                            <h4>Today's Weather</h4>
                            <div class="weather-card" id="todayWeather"></div>
                        </div>
                    </div>
                </div>

                <script>
                document.addEventListener("DOMContentLoaded", function() {
                    var greetingElement = document.getElementById("greeting");
                    var currentTime = new Date();
                    var currentHour = currentTime.getHours();

                    if (currentHour >= 5 && currentHour < 12) {
                        greetingElement.textContent = "Good Morning";
                    } else if (currentHour >= 12 && currentHour < 15) {
                        greetingElement.textContent = "Good Afternoon";
                    } else {
                        greetingElement.textContent = "Good Evening";
                    }
                });
                </script>

                <script>
                // Replace 'YOUR_API_KEY' with your actual OpenWeatherMap API key
                const apiKey = '86cd5d2209dbd1a831f7e0d53c09d4cb';
                // Replace 'CITY_NAME' with the name of the city for which you want the weather
                const city = 'Bhadrapur';

                // Fetch the weather forecast data from OpenWeatherMap API
                fetch(`https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${apiKey}`)
                    .then(response => response.json())
                    .then(data => {
                        // Extract today's weather from the API response
                        const todayWeather = {
                            weatherDescription: data.weather[0].description,
                            temperatureKelvin: data.main.temp,
                            iconCode: data.weather[0].icon,
                        };
                        displayTodayWeather(todayWeather);
                    })
                    .catch(error => {
                        console.error('Error fetching weather data:', error);
                        document.getElementById('todayWeather').textContent = 'Error fetching weather data.';
                    });

                // Function to display today's weather information
                function displayTodayWeather(weatherData) {
                    const element = document.getElementById('todayWeather');
                    const date = new Date().toDateString();
                    const temperatureCelsius = (weatherData.temperatureKelvin - 273.15).toFixed(2);

                    // Get the corresponding weather icon from BoxIcons
                    const weatherIcon = getWeatherIcon(weatherData.iconCode);

                    element.innerHTML = `
      <p><strong>${date}</strong></p>
      <p class="weather-icon">${weatherIcon}</p>
      <p>Weather: ${capitalizeFirstLetter(weatherData.weatherDescription)}</p>
      <p>Temperature: ${temperatureCelsius}°C</p>
    `;
                }

                // Function to get the corresponding weather icon from BoxIcons
                function getWeatherIcon(iconCode) {
                    // Map the icon code to the corresponding BoxIcons weather icon
                    switch (iconCode) {
                        case '01d':
                            return '<i class="bi bi-sun"></i>';
                        case '01n':
                            return '<i class="bi bi-moon"></i>';
                        case '02d':
                            return '<i class="bi bi-cloud-sun"></i>';
                        case '02n':
                            return '<i class="bi bi-cloud-moon"></i>';
                        case '03d':
                        case '03n':
                            return '<i class="bi bi-cloud"></i>';
                        case '04d':
                        case '04n':
                            return '<i class="bi bi-cloudy"></i>';
                        case '09d':
                        case '09n':
                            return '<i class="bi bi-cloud-rain"></i>';
                        case '10d':
                        case '10n':
                            return '<i class="bi bi-cloud-drizzle"></i>';
                        case '11d':
                        case '11n':
                            return '<i class="bi bi-cloud-lightning-rain"></i>';
                        case '13d':
                        case '13n':
                            return '<i class="bi bi-snow"></i>';
                        case '50d':
                        case '50n':
                            return '<i class="bi bi-cloud-haze"></i>';
                        default:
                            return '<i class="bi bi-question"></i>';
                    }
                }

                // Function to capitalize the first letter of a string
                function capitalizeFirstLetter(string) {
                    return string.charAt(0).toUpperCase() + string.slice(1);
                }
                </script>


                <style>
                /* Add some styles for better presentation */
                .weather-card {
                    border: 1px solid #ccc;
                    border-radius: 10px;
                    padding: 20px;
                    margin: 5px;
                    box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
                    text-align: center;
                }

                .weather-icon {
                    font-size: 60px;
                    margin-bottom: 10px;
                }

                .weather-image {
                    width: 100px;
                    height: 100px;
                    object-fit: cover;
                    border-radius: 50%;
                    margin-bottom: 10px;
                }
                </style>


















                <!--  Row 1 -->
                <div class="row">
                    <div class="col-lg-8 d-flex align-items-strech">
                        <div class="card w-100">
                            <div class="card-body">


                            <div class="row align-items-center mt-2">
                                <!-- First column with a vertical line on the right side -->
                                <div class="col-6 col-sm-3 text-center pr-3 bx-flashing-hover mt-3 " style="border-right: 1px solid #ccc;">
                                    <a class="text-dark">
                                        <i class='bx bx-user bx-md text-success'></i><br>
                                        Total Employees</a><br>
                                        <label class="text-dark">{{$countemployees}}</label>
                                </div>

                                <!-- Second column -->
                                <div class="col-6 col-sm-3 text-center pr-3 bx-flashing-hover mt-3 " style="border-right: 1px solid #ccc;">
                                    <a class="text-dark">
                                        <i class='bx bx-trending-up bx-md text-success'></i><br>
                                        Net Profit</a><br>
                                        <label class="text-dark">Rs. {{$netprofit}}</label>
                                </div>
                                <!-- Second column -->
                                <div class="col-6 col-sm-3 text-center pr-3 bx-flashing-hover mt-3 " style="border-right: 1px solid #ccc;">
                                    <a class="text-dark">
                                        <i class='bx bx-trending-up bx-md text-success'></i><br>
                                        Tea Income</a><br>
                                        <label class="text-dark">Rs. {{$teaincome}}</label>
                                </div>
                                <!-- Second column -->
                                <div class="col-6 col-sm-3 text-center pr-3 bx-flashing-hover mt-3 ">
                                    <a class="text-dark">
                                        <i class='bx bx-rupee bx-md text-success'></i><br>
                                        Total Exp</a><br>
                                        <label class="text-dark">Rs. {{$total_expenses}}</label>
                                </div>
                            </div>


<br><br>
                            <div class="row align-items-center  mb-2">
                                <!-- First column with a vertical line on the right side -->
                                <div class="col-6 col-sm-3 text-center pr-3 bx-flashing-hover mt-3 " style="border-right: 1px solid #ccc;">
                                    <a class="text-dark">
                                        <i class='bx bx-line-chart-down bx-md text-success'></i><br>
                                        Employees Exp</a><br>
                                        <label class="text-dark">Rs. {{$totalemployeesamount}}</label>
                                </div>

                                <!-- Second column -->
                                <div class="col-6 col-sm-3 text-center pr-3 bx-flashing-hover mt-3" style="border-right: 1px solid #ccc;">
                                    <a class="text-dark">
                                        <i class='bx bx-line-chart-down bx-md text-success'></i><br>
                                        Chemical Exp</a><br>
                                        <label class="text-dark">Rs. {{$chemicalexpenses}}</label>
                                </div>
                                <!-- Second column -->
                                <div class="col-6 col-sm-3 text-center pr-3 bx-flashing-hover mt-3" style="border-right: 1px solid #ccc;">
                                    <a class="text-dark">
                                        <i class='bx bx-line-chart-down bx-md text-success'></i><br>
                                        Fertilizer Exp</a><br>
                                        <label class="text-dark">Rs. {{$fertilizerexpenses}}</label>
                                </div><br>
                                <!-- Second column -->
                                <div class="col-6 col-sm-3 text-center pr-3 bx-flashing-hover mt-3">
                                    <a class="text-dark">
                                        <i class='bx bxs-leaf bx-md text-success'></i><br>
                                        Total Tea Kg</a><br>
                                        <label class="text-dark">{{$totaltea->total}} Kg</label>
                                </div>
                            </div>




                            </div>
                        </div>
                    </div>



                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Yearly Breakup -->
                                <div class="card overflow-hidden">
                                    <h5 class="card-title mb-9 fw-semibold mx-2">Tea Bills</h5>
                                    <div class="card-body p-3">

                                        <div class="row align-items-center">
                                            <!-- First column with a vertical line on the right side -->
                                            <div class="col-6 text-center pr-3" style="border-right: 1px solid #ccc;">
                                                <a href="{{url('/admin/tea-bills')}}"
                                                    class="text-dark bx-flashing-hover">
                                                    <i class='bx bx-receipt bx-md text-success'></i><br>
                                                    Tea Bill</a>
                                            </div><br>

                                            <!-- Second column -->
                                            <div class="col-6 text-center pl-3">
                                                <a href="{{url('/admin/emp-bill')}}"
                                                    class="text-dark bx-flashing-hover">
                                                    <i class='bx bx-receipt bx-md text-success'></i><br>
                                                    Emp Bill</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="col-lg-12">
                                <!-- Yearly Breakup -->
                                <div class="card overflow-hidden">
                                    <h5 class="card-title mb-9 fw-semibold mx-2">Tea Records</h5>
                                    <div class="card-body p-3">

                                        <div class="row align-items-center">
                                            <!-- First column with a vertical line on the right side -->
                                            <div class="col-6 text-center pr-3" style="border-right: 1px solid #ccc;">
                                                <a href="{{url('admin/tea-records')}}"
                                                    class="text-dark bx-flashing-hover">
                                                    <i class='bx bx-leaf bx-md text-success'></i><br>
                                                    Tea Records</a>
                                            </div><br>

                                            <!-- Second column -->
                                            <div class="col-6 text-center pl-3">
                                                <a href="{{url('/admin/tea-reports/tea-records')}}"
                                                    class="text-dark bx-flashing-hover">
                                                    <i class='bx bx-leaf bx-md text-success'></i><br>
                                                    Tea Reports</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>



                <!-- <div class="row">
                    <div class="col-lg-4 d-flex align-items-stretch">
                        <div class="card w-100">
                            <div class="card-body p-4">
                                <div class="mb-4">
                                    <h5 class="card-title fw-semibold">Recent Transactions</h5>
                                </div>
                                <ul class="timeline-widget mb-0 position-relative mb-n5">
                                    <li class="timeline-item d-flex position-relative overflow-hidden">
                                        <div class="timeline-time text-dark flex-shrink-0 text-end">
                                            09:30</div>
                                        <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                                            <span
                                                class="timeline-badge border-2 border border-primary flex-shrink-0 my-8"></span>
                                            <span class="timeline-badge-border d-block flex-shrink-0"></span>
                                        </div>
                                        <div class="timeline-desc fs-3 text-dark mt-n1">Payment received
                                            from John
                                            Doe
                                            of $385.90</div>
                                    </li>
                                    <li class="timeline-item d-flex position-relative overflow-hidden">
                                        <div class="timeline-time text-dark flex-shrink-0 text-end">
                                            10:00 am</div>
                                        <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                                            <span
                                                class="timeline-badge border-2 border border-info flex-shrink-0 my-8"></span>
                                            <span class="timeline-badge-border d-block flex-shrink-0"></span>
                                        </div>
                                        <div class="timeline-desc fs-3 text-dark mt-n1 fw-semibold">New
                                            sale
                                            recorded <a href="javascript:void(0)"
                                                class="text-primary d-block fw-normal">#ML-3467</a>
                                        </div>
                                    </li>
                                    <li class="timeline-item d-flex position-relative overflow-hidden">
                                        <div class="timeline-time text-dark flex-shrink-0 text-end">
                                            12:00 am</div>
                                        <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                                            <span
                                                class="timeline-badge border-2 border border-success flex-shrink-0 my-8"></span>
                                            <span class="timeline-badge-border d-block flex-shrink-0"></span>
                                        </div>
                                        <div class="timeline-desc fs-3 text-dark mt-n1">Payment was made
                                            of $64.95
                                            to
                                            Michael</div>
                                    </li>
                                    <li class="timeline-item d-flex position-relative overflow-hidden">
                                        <div class="timeline-time text-dark flex-shrink-0 text-end">
                                            09:30 am</div>
                                        <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                                            <span
                                                class="timeline-badge border-2 border border-warning flex-shrink-0 my-8"></span>
                                            <span class="timeline-badge-border d-block flex-shrink-0"></span>
                                        </div>
                                        <div class="timeline-desc fs-3 text-dark mt-n1 fw-semibold">New
                                            sale
                                            recorded <a href="javascript:void(0)"
                                                class="text-primary d-block fw-normal">#ML-3467</a>
                                        </div>
                                    </li>
                                    <li class="timeline-item d-flex position-relative overflow-hidden">
                                        <div class="timeline-time text-dark flex-shrink-0 text-end">
                                            09:30 am</div>
                                        <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                                            <span
                                                class="timeline-badge border-2 border border-danger flex-shrink-0 my-8"></span>
                                            <span class="timeline-badge-border d-block flex-shrink-0"></span>
                                        </div>
                                        <div class="timeline-desc fs-3 text-dark mt-n1 fw-semibold">New
                                            arrival
                                            recorded
                                        </div>
                                    </li>
                                    <li class="timeline-item d-flex position-relative overflow-hidden">
                                        <div class="timeline-time text-dark flex-shrink-0 text-end">
                                            12:00 am</div>
                                        <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                                            <span
                                                class="timeline-badge border-2 border border-success flex-shrink-0 my-8"></span>
                                        </div>
                                        <div class="timeline-desc fs-3 text-dark mt-n1">Payment Done
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 d-flex align-items-stretch">
                        <div class="card w-100">
                            <div class="card-body p-4">
                                <h5 class="card-title fw-semibold mb-4">Recent Transactions</h5>
                                <div class="table-responsive">
                                    <table class="table text-nowrap mb-0 align-middle">
                                        <thead class="text-dark fs-4">
                                            <tr>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Id</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Assigned</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Name</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Priority</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Budget</h6>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">1</h6>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-1">Sunil Joshi</h6>
                                                    <span class="fw-normal">Web Designer</span>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <p class="mb-0 fw-normal">Elite Admin</p>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <div class="d-flex align-items-center gap-2">
                                                        <span class="badge bg-primary rounded-3 fw-semibold">Low</span>
                                                    </div>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0 fs-4">$3.9</h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">2</h6>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-1">Andrew McDownland</h6>
                                                    <span class="fw-normal">Project Manager</span>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <p class="mb-0 fw-normal">Real Homes WP Theme</p>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <div class="d-flex align-items-center gap-2">
                                                        <span
                                                            class="badge bg-secondary rounded-3 fw-semibold">Medium</span>
                                                    </div>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0 fs-4">$24.5k</h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">3</h6>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-1">Christopher Jamil</h6>
                                                    <span class="fw-normal">Project Manager</span>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <p class="mb-0 fw-normal">MedicalPro WP Theme</p>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <div class="d-flex align-items-center gap-2">
                                                        <span class="badge bg-danger rounded-3 fw-semibold">High</span>
                                                    </div>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0 fs-4">$12.8k</h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">4</h6>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-1">Nirav Joshi</h6>
                                                    <span class="fw-normal">Frontend Engineer</span>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <p class="mb-0 fw-normal">Hosting Press HTML</p>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <div class="d-flex align-items-center gap-2">
                                                        <span
                                                            class="badge bg-success rounded-3 fw-semibold">Critical</span>
                                                    </div>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0 fs-4">$2.4k</h6>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->


            </div>
        </div>
    </div>



    @include('layouts/admin_footer')


</body>

</html>