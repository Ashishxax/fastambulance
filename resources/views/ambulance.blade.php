<style>
    .form-control,
    .form-control:focus,
    .input-group-addon {
        border-color: #e1e1e1;
    }

    .form-control,
    .btn {
        border-radius: 3px;
    }

    .signup-form {
        width: 390px;
        margin: 0 auto;
        padding: 30px 0;
    }

    .signup-form form {
        color: #999;
        border-radius: 3px;
        margin-bottom: 15px;
        background: #fff;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }

    .signup-form h2 {
        color: #333;
        font-weight: bold;
        margin-top: 0;
    }

    .signup-form hr {
        margin: 0 -30px 20px;
    }

    .signup-form .form-group {
        margin-bottom: 20px;
    }

    .signup-form label {
        font-weight: normal;
        font-size: 13px;
    }

    .signup-form .form-control {
        min-height: 38px;
        box-shadow: none !important;
    }

    .signup-form .input-group-addon {
        max-width: 42px;
        text-align: center;
    }

    .signup-form input[type="checkbox"] {
        margin-top: 2px;
    }

    .signup-form .btn {
        font-size: 16px;
        font-weight: bold;
        background: #19aa8d;
        border: none;
        min-width: 140px;
    }

    .signup-form .btn:hover,
    .signup-form .btn:focus {
        background: #179b81;
        outline: none;
    }

    .signup-form a {
        color: #fff;
        text-decoration: underline;
    }

    .signup-form a:hover {
        text-decoration: none;
    }

    .signup-form form a {
        color: #19aa8d;
        text-decoration: none;
    }

    .signup-form form a:hover {
        text-decoration: underline;
    }

    .signup-form .fa {
        font-size: 21px;
    }

    .signup-form .fa-paper-plane {
        font-size: 18px;
    }

    .signup-form .fa-check {
        color: #fff;
        left: 17px;
        top: 18px;
        font-size: 7px;
        position: absolute;
    }
</style>
<div class="modal fade" id="ambulance" tabindex="-1" aria-labelledby="BookingAmbulance">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body" id="records">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <div class="signup-form">
                    <form action="{{URL::to('ambulance-booking')}}" method="post" id="ambulanceForm">
                        @csrf
                        <h2>Fast Book Ambulance</h2>
                        <strong>Please fill in this form to book ambulance</strong>
                        <hr>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name"
                                    required="required">
                            </div>
                            <span class="badge badge-danger fieldRequiredName" style="display: none">Enter your
                                name</span>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input id="number" class="form-control"
                                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                    type="number" maxlength="10" required placeholder="Mobile Number" name="number">
                            </div>
                            <span class="badge badge-danger invalidNo" style="display: none">Number is not valid. Try
                                with other number</span>
                            <span class="badge badge-danger fieldRequiredNumber" style="display: none">Enter your
                                Number</span>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-lock"></i>
                                    <i class="fa fa-check"></i>
                                </span>
                                <input type="text" class="form-control" id="address" placeholder="Address"
                                    required="required" name="address">
                                <input type="hidden" value="{{Request::ip()}}" name="ip" />
                            </div>
                            <span class="badge badge-danger fieldRequiredAddress" style="display: none">Enter your
                                Address</span>
                        </div>
                        <div class="form-group">
                            <label class="checkbox-inline"><input type="checkbox" required="required"> I accept the <a
                                    href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg submit"
                                {{-- onclick="return valid_number()" --}}>Book</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $(".submit").click(function(e){
            e.preventDefault();
            var phone = $('#number').val();
            var name = $('#name').val();
            var address = $('#address').val();
            
            if(!name){
                $('.fieldRequiredName').show();
            }else{
                $('.fieldRequiredName').hide();
            }

            if(!phone){
                $('.fieldRequiredNumber').show();
            }else{
                $('.fieldRequiredNumber').hide();
            }

            if(!address){
                $('.fieldRequiredAddress').show();
            }else{
                $('.fieldRequiredAddress').hide();
            }


            var code = "IN";
            // var str = $("form").serializeArray();
            if(phone && name && address){
                $.ajax({
                    url: '{{ URL:: to('vsm-mobile-validate2') }}',
                    type: 'POST',
                    async: false,
                    dataType: "json",
                    data:{'phone':phone,'country_code':code},
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success:function(data){
                        for (const [key, value] of Object.entries(data)) {
                            var status = value.status;
                        }    
                        if(status=="Success"){
                            $('#ambulanceForm').submit();
                        }else{
                            $('.invalidNo').show();
                        }
                    }
                });
            }    
        });
    });
</script>