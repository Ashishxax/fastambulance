{{-- {{dd(json_encode($bkgCountCurrMonth),json_encode($bookingCounting))}} --}}
@include('admin.admin_header')
<script type="text/javascript">
    window.products = {{json_encode($bookingCounting)}}
    window.items = {{json_encode($bkgCountCurrMonth)}}
</script>

<body class="h-100">
    <div class="container-fluid">
        <div class="row">
            <!-- Main Sidebar -->
            @include('admin.admin_sidebar')
            <!-- End Main Sidebar -->
            <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
                @include('admin.admin_navbar')
                <!-- / .main-navbar -->
                <div class="main-content-container container-fluid px-4" style="margin-top: -15px;">
                    <!-- Page Header -->
                    <div class="page-header row no-gutters py-4">
                        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                            {{-- <span class="text-uppercase page-subtitle">Dashboard</span> --}}
                            {{-- <h3 class="page-title">Blog Overview</h3> --}}
                        </div>
                    </div>
                    <!-- End Page Header -->
                    <!-- Small Stats Blocks -->
                    <div class="row">
                        <div class="col-lg col-md-6 col-sm-6 mb-4">
                            <div class="stats-small stats-small--1 card card-small">
                                <div class="card-body p-0 d-flex">
                                    <div class="d-flex flex-column m-auto">
                                        <div class="stats-small__data text-center">
                                            <span class="stats-small__label text-uppercase">Ambulances</span>
                                            <h6 class="stats-small__value count my-3">{{$ambulance}}</h6>
                                        </div>
                                        <div class="stats-small__data">
                                            <span
                                                class="stats-small__percentage stats-small__percentage--increase">{{100*($ambulance)/5}}%</span>
                                        </div>
                                    </div>
                                    <canvas height="120" class="blog-overview-stats-small-1"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg col-md-6 col-sm-6 mb-4">
                            <div class="stats-small stats-small--1 card card-small">
                                <div class="card-body p-0 d-flex">
                                    <div class="d-flex flex-column m-auto">
                                        <div class="stats-small__data text-center">
                                            <span class="stats-small__label text-uppercase">Booking Request</span>
                                            <h6 class="stats-small__value count my-3">{{$booking}}</h6>
                                        </div>
                                        <div class="stats-small__data">
                                            <span
                                                class="stats-small__percentage stats-small__percentage--increase">{{100*($booking)/5}}%</span>
                                        </div>
                                    </div>
                                    <canvas height="120" class="blog-overview-stats-small-2"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg col-md-4 col-sm-6 mb-4">
                            <div class="stats-small stats-small--1 card card-small">
                                <div class="card-body p-0 d-flex">
                                    <div class="d-flex flex-column m-auto">
                                        <div class="stats-small__data text-center">
                                            <span class="stats-small__label text-uppercase">Searches</span>
                                            <h6 class="stats-small__value count my-3">{{$search}}</h6>
                                        </div>
                                        <div class="stats-small__data">
                                            <span
                                                class="stats-small__percentage stats-small__percentage--decrease">{{100*($search)/5}}%</span>
                                        </div>
                                    </div>
                                    <canvas height="120" class="blog-overview-stats-small-3"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg col-md-4 col-sm-6 mb-4">
                            <div class="stats-small stats-small--1 card card-small">
                                <div class="card-body p-0 d-flex">
                                    <div class="d-flex flex-column m-auto">
                                        <div class="stats-small__data text-center">
                                            <span class="stats-small__label text-uppercase">Total Location</span>
                                            <h6 class="stats-small__value count my-3">{{$location}}</h6>
                                        </div>
                                        <div class="stats-small__data">
                                            <span
                                                class="stats-small__percentage stats-small__percentage--increase">12.4%</span>
                                        </div>
                                    </div>
                                    <canvas height="120" class="blog-overview-stats-small-4"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg col-md-4 col-sm-12 mb-4">
                            <div class="stats-small stats-small--1 card card-small">
                                <div class="card-body p-0 d-flex">
                                    <div class="d-flex flex-column m-auto">
                                        <div class="stats-small__data text-center">
                                            <span class="stats-small__label text-uppercase">Users</span>
                                            <h6 class="stats-small__value count my-3">{{$users}}</h6>
                                        </div>
                                        <div class="stats-small__data">
                                            <span
                                                class="stats-small__percentage stats-small__percentage--increase">{{100*($users)/5}}%</span>
                                        </div>
                                    </div>
                                    <canvas height="120" class="blog-overview-stats-small-5"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Small Stats Blocks -->
                    <div class="row">
                        <!-- Users Stats -->
                        <div class="col-lg-8 col-md-12 col-sm-12 mb-4">
                            <div class="card card-small">
                                <div class="card-header border-bottom">
                                    <h6 class="m-0" style="text-align:center;">Ambulance Booking Monthly Wise Data</h6>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row border-bottom py-2 bg-light">
                                        <div class="col-12 col-sm-6">
                                            <div id="blog-overview-date-range"
                                                class="input-daterange input-group input-group-sm my-auto ml-auto mr-auto ml-sm-auto mr-sm-0"
                                                style="max-width: 350px;">
                                                <input type="text" class="input-sm form-control" name="start"
                                                    placeholder="Start Date" id="blog-overview-date-range-1">
                                                <input type="text" class="input-sm form-control" name="end"
                                                    placeholder="End Date" id="blog-overview-date-range-2">
                                                <span class="input-group-append">
                                                    <span class="input-group-text">
                                                        <i class="material-icons"></i>
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 d-flex mb-2 mb-sm-0">
                                            <button type="button"
                                                class="btn btn-sm btn-white ml-auto mr-auto ml-sm-auto mr-sm-0 mt-3 mt-sm-0">View
                                                Full Report &rarr;</button>
                                        </div>
                                    </div>
                                    <canvas height="130" style="max-width: 100% !important;"
                                        class="blog-overview-users"></canvas>
                                </div>
                            </div>
                        </div>
                        <!-- End Users Stats -->
                        <!-- Users By Device Stats -->
                        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                            <div class="card card-small h-100">
                                <div class="card-header border-bottom">
                                    <h6 class="m-0" style="text-align:center;">Booking Pin Code Wise </h6>
                                </div>
                                <div class="card-body d-flex py-0">
                                    <canvas height="220" class="blog-users-by-device m-auto"></canvas>
                                </div>
                                <div class="card-footer border-top">
                                    <div class="row">
                                        <div class="col">
                                            <select class="custom-select custom-select-sm" style="max-width: 130px;">
                                                <option selected>Last Week</option>
                                                <option value="1">Today</option>
                                                <option value="2">Last Month</option>
                                                <option value="3">Last Year</option>
                                            </select>
                                        </div>
                                        <div class="col text-right view-report">
                                            <a href="#">Full report &rarr;</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Users By Device Stats -->
                        <!-- New Ambulance Add Component -->
                        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                            <!-- Quick Post -->
                            <div class="card card-small h-100">
                                <div class="card-header border-bottom">
                                    <h6 class="m-0">New Ambulance</h6>
                                </div>
                                <div class="card-body d-flex flex-column">
                                    <form action="{{ route('booking-request') }}" class="quick-post-form">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name"
                                                aria-describedby="emailHelp" placeholder="Ambulance Name">
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control"
                                                placeholder="Words can be like X-rays if you use them properly..."></textarea>
                                        </div>
                                        <div class="form-group mb-0">
                                            <button type="submit" class="btn btn-accent">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- End Quick Post -->
                        </div>
                        <!-- End Ambulance Add Component -->
                        <!-- Discussions Component -->
                        <div class="col-lg-5 col-md-12 col-sm-12 mb-4">
                            <div class="card card-small blog-comments">
                                <div class="card-header border-bottom">
                                    <h6 class="m-0">Daily Day Activity</h6>
                                </div>
                                <div class="card-body p-0">
                                    <div class="blog-comments__item d-flex p-3">

                                        <div class="blog-comments__content">
                                            <div class="blog-comments__meta text-muted">
                                                <a class="text-secondary" href="#">{{$lastbooking['name']}}</a>
                                                <a class="text-secondary" href="#">Booked Ambulance from</a>
                                                <span class="text-muted">– {{$lastbooking['landmark']}}</span>
                                            </div>
                                            <p class="m-0 my-1 mb-2 text-muted">{{$lastbooking['mobile']}}
                                                {{$lastbooking['pincode']}}{{$lastbooking['city']}}</p>
                                            <div class="blog-comments__actions">
                                                <div class="btn-group btn-group-sm">
                                                    <button type="button" class="btn btn-white">
                                                        <span class="text-success">
                                                            <i class="material-icons">check</i>
                                                        </span> Approve </button>
                                                    <button type="button" class="btn btn-white">
                                                        <span class="text-danger">
                                                            <i class="material-icons">clear</i>
                                                        </span> Reject </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="blog-comments__item d-flex p-3">

                                        <div class="blog-comments__content">
                                            <div class="blog-comments__meta text-muted">
                                                <a class="text-secondary" href="#">{{$lastUser['name']}}</a> email
                                                <a class="text-secondary" href="#">{{$lastUser['email']}}</a>
                                            </div>
                                            <p class="m-0 my-1 mb-2 text-muted">added on
                                                {{ date('d-M-Y', strtotime($lastUser['created_at']))}}</p>
                                            <div class="blog-comments__actions">
                                                <div class="btn-group btn-group-sm">
                                                    <button type="button" class="btn btn-white">
                                                        <span class="text-success">
                                                            <i class="material-icons">check</i>
                                                        </span> Approve </button>
                                                    <button type="button" class="btn btn-white">
                                                        <span class="text-danger">
                                                            <i class="material-icons">clear</i>
                                                        </span> Reject </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="blog-comments__item d-flex p-3">

                                        <div class="blog-comments__content">
                                            <div class="blog-comments__meta text-muted">
                                                <a class="text-secondary" href="#">{{$lastAmbulance['name']}}</a> from
                                                <a class="text-secondary" href="#">{{$lastAmbulance['address']}}</a>
                                                <span class="text-muted">added on
                                                    {{ date('d-M-Y', strtotime($lastAmbulance['created_at']))}}</span>
                                            </div>
                                            <p class="m-0 my-1 mb-2 text-muted">{{$lastAmbulance['pincode']}}
                                                {{$lastAmbulance['city']}}</p>
                                            <div class="blog-comments__actions">
                                                <div class="btn-group btn-group-sm">
                                                    <button type="button" class="btn btn-white">
                                                        <span class="text-success">
                                                            Latitude &MediumSpace;
                                                        </span> {{$lastAmbulance['latitude']}} </button>
                                                    <button type="button" class="btn btn-white">
                                                        <span class="text-success">
                                                            Longitude &MediumSpace;
                                                        </span> {{$lastAmbulance['longitude']}} </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer border-top">
                                    <div class="row">
                                        <div class="col text-center view-report">
                                            <button type="submit" class="btn btn-white">All Booking</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Discussions Component -->
                        <!-- Top Referrals Component -->
                        <div class="col-lg-3 col-md-12 col-sm-12 mb-4">
                            <div class="card card-small">
                                <div class="card-header border-bottom">
                                    <h6 class="m-0">Every Stats</h6>
                                </div>
                                <div class="card-body p-0">
                                    <ul class="list-group list-group-small list-group-flush">
                                        <li class="list-group-item d-flex px-3">
                                            <span class="text-semibold text-fiord-blue">Ambulance</span>
                                            <span
                                                class="ml-auto text-right text-semibold text-reagent-gray">{{$ambulance}}</span>
                                        </li>
                                        <li class="list-group-item d-flex px-3">
                                            <span class="text-semibold text-fiord-blue">Bookings</span>
                                            <span
                                                class="ml-auto text-right text-semibold text-reagent-gray">{{$booking}}</span>
                                        </li>
                                        <li class="list-group-item d-flex px-3">
                                            <span class="text-semibold text-fiord-blue">Searches</span>
                                            <span
                                                class="ml-auto text-right text-semibold text-reagent-gray">{{$search}}</span>
                                        </li>
                                        <li class="list-group-item d-flex px-3">
                                            <span class="text-semibold text-fiord-blue">Location</span>
                                            <span
                                                class="ml-auto text-right text-semibold text-reagent-gray">{{$location}}</span>
                                        </li>
                                        <li class="list-group-item d-flex px-3">
                                            <span class="text-semibold text-fiord-blue">New Users</span>
                                            <span
                                                class="ml-auto text-right text-semibold text-reagent-gray">{{$users}}</span>
                                        </li>
                                        <li class="list-group-item d-flex px-3">
                                            <span class="text-semibold text-fiord-blue">Overall Customers</span>
                                            <span class="ml-auto text-right text-semibold text-reagent-gray">100</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-footer border-top">
                                    <div class="row">
                                        <div class="col">
                                            <select class="custom-select custom-select-sm">
                                                <option selected>Last Week</option>
                                                <option value="1">Today</option>
                                                <option value="2">Last Month</option>
                                                <option value="3">Last Year</option>
                                            </select>
                                        </div>
                                        <div class="col text-right view-report">
                                            <a href="{{ route('booking-request') }}">Full report &rarr;</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Top Referrals Component -->
                    </div>
                </div>
                @include('admin.admin_footer')
            </main>
        </div>
    </div>
    @include('admin.script')

</body>

</html>