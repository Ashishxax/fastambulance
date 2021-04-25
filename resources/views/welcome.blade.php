@include('layout.header')

<body>
    <?php    
    if(Session::get('booked_status'))
    { 
        echo '<div class="loader"></div>';
        echo "<script type='text/javascript'>
        swal('Success', 'Ambulance has been book,You will get a call', 'success');
        </script>";
    }
?>
    <div class="wrap">
        <div class="AmbulanceCar" style='background-image: url("img/ambulance_image/ambulance.jpg");'>
            <div class="rotate-img">

                <img src="{{asset('img/ambulance_image/1.png')}}" />
                <div class="outCircle">
                    <div class="image-one">
                        <img class="rotate-one" src="{{asset('img/ambulance_image/inner1.svg')}}" data-aos="fade-up"
                            data-aos-duration="3000" />
                    </div>
                    <div class="image-two">
                        <img class="rotate-two" src="{{asset('img/ambulance_image/outer.svg')}}" data-aos="fade-up"
                            data-aos-duration="3500" />
                    </div>
                    <div class="image-three">
                        <img class="rotate-three" src="{{asset('img/ambulance_image/outer2.svg')}}" data-aos="fade-up"
                            data-aos-duration="4000" />
                    </div>
                </div>

                <button type="button" class="btn btn-danger book" data-toggle="modal"
                    {{-- style="margin-left: 615px;margin-top: -310px;" --}} data-target="#ambulance"> Book</button>
            </div>
        </div>
    </div>

    @include('ambulance')
</body>

@include('layout.footer')