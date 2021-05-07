@include('admin.admin_header')
<?php    
if(Session::get('status_update'))
{ 
  echo '<div class="loader"></div>';
  echo "<script type='text/javascript'>
  swal('Success', 'Ambulance data has been updated.', 'success');
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
                        <div class="col-12 col-sm-4 text-center text-sm-left mb-0" style="margin-top: -12px;">
                            <span class="text-uppercase page-subtitle">Manage</span>
                            <h3 class="page-title" style="font-family: auto">Ambulances</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="card card-small mb-4" style="margin-top: -13px;">
                                <div class="card-header border-bottom">
                                    <h4 class="m-0" style="text-align:center; font-family:auto">Active Ambulances</h4>
                                </div>
                                <div class="card-body p-0 pb-3 text-center table-responsive-sm">
                                    <table class="table mb-0">
                                        <thead class="bg-light">
                                            <tr>
                                                <th scope="col" class="border-0">S.No</th>
                                                <th scope="col" class="border-0">Name</th>
                                                <th scope="col" class="border-0">Joined Date</th>
                                                <th scope="col" class="border-0">City</th>
                                                <th scope="col" class="border-0">Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>@php $key=1;@endphp
                                            @for ($i=0; $i <count($ambulances); $i++) <tr>
                                                <td>{{$key ++}}</td>
                                                <td>{{$ambulances[$i]['name']}}</td>
                                                <td>{{date('d-M-Y', strtotime($ambulances[$i]['created_at']))}}</td>
                                                <td>{{$ambulances[$i]['city']}}</td>
                                                <td><button type="button" class="mb-2 btn btn-sm btn-info mr-1"
                                                        onclick="view_record({{$ambulances[$i]['id']}})"
                                                        data-id="{{$ambulances[$i]['id']}}"> <i
                                                            class="material-icons">edit</i></button>
                                                </td>
                                                </tr>
                                                @endfor
                                        </tbody>
                                    </table>
                                    <div class="col-xs-12 col-md-6 text-right">{{$ambulances->links()}}
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
    {{-- Modal for Manage Ambulance --}}
    <div class="modal fade" id="records" tabindex="-1" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body" id="records">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <div id="appendRecord"></div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
    <script>
        function view_record(id){
            $("#appendRecord").empty();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "GET",
                url: "/get-record/"+id,
                success: function(data){
                    var html=""; var id ; var name;
                    html+= '<div class="card-header border-bottom"><h5 class="m-0" style="font-family:auto;text-align:center">Ambulance Details</h5></div><div class="col-sm-12 col-md-6"><br>';
                    $.each(data,function(key, value) {
                        html += '<form method="post" action="/ambulance-form">';
                        html += '@csrf <input type="hidden" value=" '+value.id+' " name= "id" />';
                        html+=  '<div class="form-row"><div class="form-group col-md-6"><input type="text" class="form-control" style="margin-left:230px;"  name="name" value=" '+value.name +' " required /></div>'; 
                        html+='<div class="form-group col-md-6"><span class="text-semibold text-fiord-blue">Name</span></div></div>';
                        
                        html+=  '<div class="form-row"><div class="form-group col-md-6"><input type="text" class="form-control" style="margin-left:230px;"  name="address" value=" '+value.address +' " required/></div>'; 
                        html+='<div class="form-group col-md-6"><span class="text-semibold text-fiord-blue">Address</span></div></div>';

                        html+=  '<div class="form-row"><div class="form-group col-md-6"><input type="text" class="form-control" style="margin-left:230px;"  name="pincode" value=" '+value.pincode +' " required/></div>'; 
                        html+='<div class="form-group col-md-6"><span class="text-semibold text-fiord-blue">Pincode</span></div></div>';
                        
                        html+=  '<div class="form-row"><div class="form-group col-md-6"><input type="text" class="form-control" style="margin-left:230px;"  name="city" value=" '+value.city +' "required /></div>'; 
                        html+='<div class="form-group col-md-6"><span class="text-semibold text-fiord-blue">City</span></div></div>'; 
                        
                        html+=  '<div class="form-row"><div class="form-group col-md-6"><input type="text" class="form-control" style="margin-left:230px;"  name="state" value=" '+value.state +' " required/></div>'; 
                        html+='<div class="form-group col-md-6"><span class="text-semibold text-fiord-blue">State</span></div></div>';
                        html+=  '<div class="form-row"><div class="form-group col-md-6"><input type="text" class="form-control" style="margin-left:230px;"  name="latitude" value=" '+value.latitude +' " required/></div>'; 
                        html+='<div class="form-group col-md-6"><span class="text-semibold text-fiord-blue">Latitude</span></div></div>';
                        html+=  '<div class="form-row"><div class="form-group col-md-6"><input type="text" class="form-control" style="margin-left:230px;"  name="longitude" value=" '+value.longitude +' " required/></div>'; 
                        html+='<div class="form-group col-md-6"><span class="text-semibold text-fiord-blue">Longitude</span></div></div>';                            


                        html+='<button type="submit"class="mb-2 btn btn-sm btn-danger mr-1"  style="margin-left:296px;margin-top: 13px;">Update</button>';
                        html+='<button type="button"class="mb-2 btn btn-sm btn-info mr-1" data-dismiss="modal" style="margin-left:190px;margin-top:-66px;">Close Box</button>';
                        html +="</form>";
                    });
                    html += '</div>';
                    $("#appendRecord").append(html);
                    $("#records").modal("show");
                }
            });
        }
    </script>
</body>