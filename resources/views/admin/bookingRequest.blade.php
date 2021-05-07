@include('admin.admin_header')
<style>
    body {
        font-family: auto;
        font-size: large;
    }
</style>

<body class="h-100">
    <div class="container-fluid">
        <div class="row">
            @include('admin.admin_sidebar')
            <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
                @include('admin.admin_navbar')
                <div class="main-content-container container-fluid px-4">
                    <div class="page-header row no-gutters py-4">
                        <div class="col-12 col-sm-4 text-center text-sm-left mb-0" style="margin-top: -12px;">
                            <span class="text-uppercase page-subtitle">Booking</span>
                            <h3 class="page-title" style="font-family: auto">Request</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="card card-small mb-4" style="margin-top: -13px;">
                                <div class="card-header border-bottom">
                                    <h4 class="m-0" style="text-align:center; font-family:auto">User's request</h4>
                                </div>
                                <div class="card-body p-0 pb-3 text-center table-responsive-sm">
                                    <table class="table mb-0">
                                        <thead class="bg-light">
                                            <tr>
                                                <th scope="col" class="border-0">IP Address</th>
                                                <th scope="col" class="border-0">Name</th>
                                                <th scope="col" class="border-0">Mobile</th>
                                                <th scope="col" class="border-0">Landmark</th>
                                                <th scope="col" class="border-0">City</th>
                                                <th scope="col" class="border-0">Booking Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>@php $key=1;@endphp
                                            @for ($i=0; $i <count($bookingrequest); $i++) <tr>
                                                {{-- <td>{{$key ++}}</td> --}}
                                                <td>{{$bookingrequest[$i]['ip_address']}}</td>
                                                <td>{{$bookingrequest[$i]['name']}}</td>
                                                <td>{{$bookingrequest[$i]['mobile']}}</td>
                                                <td>{{ucwords($bookingrequest[$i]['landmark'])}}</td>
                                                <td>{{ucwords($bookingrequest[$i]['city'])}}</td>
                                                <td>{{date('d-M-Y', strtotime($bookingrequest[$i]['created_at']))}}</td>
                                                </tr>
                                                @endfor
                                        </tbody>
                                    </table>
                                    <div class="col-xs-12 col-md-6 text-right">{{$bookingrequest->links()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('admin.admin_footer')
            </main>
        </div>
    </div>
</body>