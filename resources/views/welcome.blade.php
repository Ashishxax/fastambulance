@include('layout.header')

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
                <div class="AmbulanceCar " style='background-image: url("img/ambulance_image/ambulance.jpg");'>
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

@include('layout.footer')