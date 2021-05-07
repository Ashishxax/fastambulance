@include('admin.admin_header')
<?php    
if(Session::get('status_update'))
{ 
  echo '<div class="loader"></div>';
  echo "<script type='text/javascript'>
  swal('Success', 'User Account Status has been updated.', 'success');
  </script>";
}
?>
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
                        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                            <span class="text-uppercase page-subtitle">Manage</span>
                            <h3 class="page-title">Users</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="card card-small mb-4">
                                <div class="card-header border-bottom">
                                    <h6 class="m-0">Active Users</h6>
                                </div>
                                <div class="card-body p-0 pb-3 text-center table-responsive-sm">
                                    <table class="table mb-0">
                                        <thead class="bg-light">
                                            <tr>
                                                <th scope="col" class="border-0">S.No</th>
                                                <th scope="col" class="border-0">Name</th>
                                                <th scope="col" class="border-0">Joined Date</th>
                                                <th scope="col" class="border-0">Email</th>
                                                <th scope="col" class="border-0">Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>@php $key=1;@endphp
                                            @for ($i=0; $i <count($users); $i++) <tr>
                                                <td>{{$key ++}}</td>
                                                <td>{{$users[$i]['name']}}</td>
                                                <td>{{date('d-M-Y', strtotime($users[$i]['created_at']))}}</td>
                                                <td>{{$users[$i]['email']}}</td>
                                                <td><button type="button" class="mb-2 btn btn-sm btn-info mr-1"
                                                        onclick="view_record({{$users[$i]['id']}})"
                                                        data-id="{{$users[$i]['id']}}"> <i
                                                            class="material-icons">edit</i></button>
                                                </td>
                                                </tr>
                                                @endfor
                                        </tbody>
                                    </table>
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