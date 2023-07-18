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
















                <!--  Row 1 -->
                <div class="row">
                    <div class="col-lg-8 d-flex align-items-strech">
                        <div class="card w-100">
                            <div class="card-body">
                                <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                                    <div class="mb-3 mb-sm-0">
                                        <h5 class="card-title fw-semibold">Sales Overview</h5>
                                    </div>
                                    <div>
                                        <select class="form-select">
                                            <option value="1">March 2023</option>
                                            <option value="2">April 2023</option>
                                            <option value="3">May 2023</option>
                                            <option value="4">June 2023</option>
                                        </select>
                                    </div>
                                </div>
                                <div id="chart"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Yearly Breakup -->
                                <div class="card overflow-hidden">
                                    <div class="card-body p-4">
                                        <h5 class="card-title mb-9 fw-semibold">Yearly Breakup</h5>
                                        <div class="row align-items-center">
                                            <div class="col-8">
                                                <h4 class="fw-semibold mb-3">$36,358</h4>
                                                <div class="d-flex align-items-center mb-3">
                                                    <span
                                                        class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                                                        <i class="ti ti-arrow-up-left text-success"></i>
                                                    </span>
                                                    <p class="text-dark me-1 fs-3 mb-0">+9%</p>
                                                    <p class="fs-3 mb-0">last year</p>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <div class="me-4">
                                                        <span
                                                            class="round-8 bg-primary rounded-circle me-2 d-inline-block"></span>
                                                        <span class="fs-2">2023</span>
                                                    </div>
                                                    <div>
                                                        <span
                                                            class="round-8 bg-light-primary rounded-circle me-2 d-inline-block"></span>
                                                        <span class="fs-2">2023</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="d-flex justify-content-center">
                                                    <div id="breakup"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <!-- Monthly Earnings -->
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row alig n-items-start">
                                            <div class="col-8">
                                                <h5 class="card-title mb-9 fw-semibold"> Monthly Earnings </h5>
                                                <h4 class="fw-semibold mb-3">$6,820</h4>
                                                <div class="d-flex align-items-center pb-1">
                                                    <span
                                                        class="me-2 rounded-circle bg-light-danger round-20 d-flex align-items-center justify-content-center">
                                                        <i class="ti ti-arrow-down-right text-danger"></i>
                                                    </span>
                                                    <p class="text-dark me-1 fs-3 mb-0">+9%</p>
                                                    <p class="fs-3 mb-0">last year</p>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="d-flex justify-content-end">
                                                    <div
                                                        class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                                                        <i class="ti ti-currency-dollar fs-6"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="earning"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 d-flex align-items-stretch">
                        <div class="card w-100">
                            <div class="card-body p-4">
                                <div class="mb-4">
                                    <h5 class="card-title fw-semibold">Recent Transactions</h5>
                                </div>
                                <ul class="timeline-widget mb-0 position-relative mb-n5">
                                    <li class="timeline-item d-flex position-relative overflow-hidden">
                                        <div class="timeline-time text-dark flex-shrink-0 text-end">09:30</div>
                                        <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                                            <span
                                                class="timeline-badge border-2 border border-primary flex-shrink-0 my-8"></span>
                                            <span class="timeline-badge-border d-block flex-shrink-0"></span>
                                        </div>
                                        <div class="timeline-desc fs-3 text-dark mt-n1">Payment received from John
                                            Doe
                                            of $385.90</div>
                                    </li>
                                    <li class="timeline-item d-flex position-relative overflow-hidden">
                                        <div class="timeline-time text-dark flex-shrink-0 text-end">10:00 am</div>
                                        <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                                            <span
                                                class="timeline-badge border-2 border border-info flex-shrink-0 my-8"></span>
                                            <span class="timeline-badge-border d-block flex-shrink-0"></span>
                                        </div>
                                        <div class="timeline-desc fs-3 text-dark mt-n1 fw-semibold">New sale
                                            recorded <a href="javascript:void(0)"
                                                class="text-primary d-block fw-normal">#ML-3467</a>
                                        </div>
                                    </li>
                                    <li class="timeline-item d-flex position-relative overflow-hidden">
                                        <div class="timeline-time text-dark flex-shrink-0 text-end">12:00 am</div>
                                        <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                                            <span
                                                class="timeline-badge border-2 border border-success flex-shrink-0 my-8"></span>
                                            <span class="timeline-badge-border d-block flex-shrink-0"></span>
                                        </div>
                                        <div class="timeline-desc fs-3 text-dark mt-n1">Payment was made of $64.95
                                            to
                                            Michael</div>
                                    </li>
                                    <li class="timeline-item d-flex position-relative overflow-hidden">
                                        <div class="timeline-time text-dark flex-shrink-0 text-end">09:30 am</div>
                                        <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                                            <span
                                                class="timeline-badge border-2 border border-warning flex-shrink-0 my-8"></span>
                                            <span class="timeline-badge-border d-block flex-shrink-0"></span>
                                        </div>
                                        <div class="timeline-desc fs-3 text-dark mt-n1 fw-semibold">New sale
                                            recorded <a href="javascript:void(0)"
                                                class="text-primary d-block fw-normal">#ML-3467</a>
                                        </div>
                                    </li>
                                    <li class="timeline-item d-flex position-relative overflow-hidden">
                                        <div class="timeline-time text-dark flex-shrink-0 text-end">09:30 am</div>
                                        <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                                            <span
                                                class="timeline-badge border-2 border border-danger flex-shrink-0 my-8"></span>
                                            <span class="timeline-badge-border d-block flex-shrink-0"></span>
                                        </div>
                                        <div class="timeline-desc fs-3 text-dark mt-n1 fw-semibold">New arrival
                                            recorded
                                        </div>
                                    </li>
                                    <li class="timeline-item d-flex position-relative overflow-hidden">
                                        <div class="timeline-time text-dark flex-shrink-0 text-end">12:00 am</div>
                                        <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                                            <span
                                                class="timeline-badge border-2 border border-success flex-shrink-0 my-8"></span>
                                        </div>
                                        <div class="timeline-desc fs-3 text-dark mt-n1">Payment Done</div>
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
                </div>


            </div>
        </div>
    </div>

    <script>$(function () {


// =====================================
// Profit
// =====================================
var chart = {
  series: [
    name: "Earnings this month:",
        data: {json_encode($earningsData)} ,
    
  ],

  chart: {
    type: "bar",
    height: 345,
    offsetX: -15,
    toolbar: { show: true },
    foreColor: "#adb0bb",
    fontFamily: 'inherit',
    sparkline: { enabled: false },
  },


  colors: ["#5D87FF", "#49BEFF"],


  plotOptions: {
    bar: {
      horizontal: false,
      columnWidth: "35%",
      borderRadius: [6],
      borderRadiusApplication: 'end',
      borderRadiusWhenStacked: 'all'
    },
  },
  markers: { size: 0 },

  dataLabels: {
    enabled: false,
  },


  legend: {
    show: false,
  },


  grid: {
    borderColor: "rgba(0,0,0,0.1)",
    strokeDashArray: 3,
    xaxis: {
      lines: {
        show: false,
      },
    },
  },

  xaxis: {
    type: "category",
    categories: {!! json_encode($dates) !!},
    labels: {
      style: { cssClass: "grey--text lighten-2--text fill-color" },
    },
  },


  yaxis: {
    show: true,
    min: 0,
    max: 400,
    tickAmount: 4,
    labels: {
      style: {
        cssClass: "grey--text lighten-2--text fill-color",
      },
    },
  },
  stroke: {
    show: true,
    width: 3,
    lineCap: "butt",
    colors: ["transparent"],
  },


  tooltip: { theme: "light" },

  responsive: [
    {
      breakpoint: 600,
      options: {
        plotOptions: {
          bar: {
            borderRadius: 3,
          }
        },
      }
    }
  ]


};

var chart = new ApexCharts(document.querySelector("#chart"), chart);
chart.render();


// =====================================
// Breakup
// =====================================
var breakup = {
  color: "#adb5bd",
  series: [38, 40, 25],
  labels: ["2022", "2021", "2020"],
  chart: {
    width: 180,
    type: "donut",
    fontFamily: "Plus Jakarta Sans', sans-serif",
    foreColor: "#adb0bb",
  },
  plotOptions: {
    pie: {
      startAngle: 0,
      endAngle: 360,
      donut: {
        size: '75%',
      },
    },
  },
  stroke: {
    show: false,
  },

  dataLabels: {
    enabled: false,
  },

  legend: {
    show: false,
  },
  colors: ["#5D87FF", "#ecf2ff", "#F9F9FD"],

  responsive: [
    {
      breakpoint: 991,
      options: {
        chart: {
          width: 150,
        },
      },
    },
  ],
  tooltip: {
    theme: "dark",
    fillSeriesColor: false,
  },
};

var chart = new ApexCharts(document.querySelector("#breakup"), breakup);
chart.render();



// =====================================
// Earning
// =====================================
var earning = {
  chart: {
    id: "sparkline3",
    type: "area",
    height: 60,
    sparkline: {
      enabled: true,
    },
    group: "sparklines",
    fontFamily: "Plus Jakarta Sans', sans-serif",
    foreColor: "#adb0bb",
  },
  series: [
    {
      name: "Earnings",
      color: "#49BEFF",
      data: [25, 66, 20, 40, 12, 58, 20],
    },
  ],
  stroke: {
    curve: "smooth",
    width: 2,
  },
  fill: {
    colors: ["#f3feff"],
    type: "solid",
    opacity: 0.05,
  },

  markers: {
    size: 0,
  },
  tooltip: {
    theme: "dark",
    fixed: {
      enabled: true,
      position: "right",
    },
    x: {
      show: false,
    },
  },
};
new ApexCharts(document.querySelector("#earning"), earning).render();
})</script>
    @include('layouts/admin_footer')


</body>

</html>