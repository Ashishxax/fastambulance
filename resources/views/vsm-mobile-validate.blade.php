<?php
$path = base_path() . '/vendor/autoload1.php';
// die($path);
require $path;

$result=[];

if($_SERVER["REQUEST_METHOD"] == "POST") {
        // dd($_POST['phone'],$_POST['country_code']);
		if(!empty($_POST['phone']) && !empty($_POST['country_code'])){
            $_POST['country_code'] = strtoupper($_POST['country_code']);
			$phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();
            $user_no = $phoneUtil->parse($_POST['phone'], $_POST['country_code']);
            
            $isValid = $phoneUtil->isValidNumber($user_no);
            $timeZoneMapper = \libphonenumber\PhoneNumberToTimeZonesMapper::getInstance();
            $timeZones = $timeZoneMapper->getTimeZonesForNumber($user_no);
            // dd($isValid);
			if($isValid==true) {
                $number_type = $phoneUtil->getNumberType($user_no); 
                if($number_type==1) $number_type="MOBILE"; else $number_type="Fixedline";
                
                $response['status'] = "Success";
                $response['Valid Number'] = $_POST['phone'];
                // $response['Is possible Number'] = 'True';
                $response['Number Type'] = $number_type;
                $response['Region Code'] = $phoneUtil->getRegionCodeForNumber($user_no);
                $result = 
	    		[
					'status'     => 200,
					
					'data'       => $response
				];
            }else{
                $result = 
	    		[
					'status'        => 201,
					
					'message'    => "Invalid Phone Number"
				];
            }
		}else{
                $result = 
	    		[
                    'status'          => 202,
                    'message'     => "Phone number and country code Fields required"
				];
		}
	}else{
        $result = 
        [
            'status'            => 203,
            'message'        => "Invalid Request Method"
        ];
	}

http_response_code(200);
header("HTTP/1.0 200");
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
// return print_r($result);
 echo json_encode($result);
?>