<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fast Ambulance</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="description"
        content="Fast Ambulance &amp; book ambulance nearby yours find immediate ambulance by just search button">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('css/ambulance.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>

<body>
    <?php    
        if(Session::get('booked_status'))
        { 
            echo '<div class="loader"></div>';
            echo "<script type='text/javascript'>
            swal('Success', 'Ambulance has been book,You will get a call, Immediately', 'success');
            </script>";
        }
    ?>
    <div class="wrap container" id="app">
        <div class="row">
            <div class="col-md-lg-4"></div>
            <div class=" col-sm-12 col-md-lg-4">
                <div class="AmbulanceCar " style='background-image: url("img/ambulance_image/ambulance.webp");'>
                    <div class="outCircle">
                        <div class="rotate-img ">

                            <img src="{{asset('img/ambulance_image/1.png')}}" />
                        </div>
                        <div class="image-one">
                            <img class="rotate-one" src="{{asset('img/ambulance_image/inner1.svg')}}" data-aos="fade-up"
                                data-aos-duration="3000" />
                        </div>
                        <div class="image-two">
                            <img class="rotate-two" src="{{asset('img/ambulance_image/outer.svg')}}" data-aos="fade-up"
                                data-aos-duration="3500" />
                        </div>
                        <div class="image-three">
                            <img class="rotate-three" src="{{asset('img/ambulance_image/outer2.svg')}}"
                                data-aos="fade-up" data-aos-duration="4000" />
                        </div>
                        <button type="button" class="btn btn-danger book bookBtn" data-toggle="modal"
                            {{-- style="margin-left: 615px;margin-top: -310px;" --}} data-target="#ambulance">
                            Book</button>
                    </div>

                </div>
            </div>
            <div class="col-md-lg-4"></div>
        </div>
    </div>


    @include('ambulance')
</body>

</html>