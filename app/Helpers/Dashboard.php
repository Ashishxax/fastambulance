<?php
    namespace app\Helpers;
    use App\User;
    use App\Models\Ambulance;
    use App\Models\AmbulanceBooking;

    class Dashboard {

        public static function previous_month_data(){
            $bookingCounting        = [];
            $b = [];
            $datePrevStart = date("Y-n-j", strtotime("first day of previous month"));
            $datePrevEnd = date("Y-n-j", strtotime("last day of previous month"));
            $dateLimit = date('d', strtotime($datePrevEnd));
            for ($j = 1; $j <= $dateLimit; $j++) {
                $dateFrom = date('Y-m-' . $j . ' 00:00:00', strtotime($datePrevStart));
                $dateTo = date('Y-m-' . $j . ' 23:59:59', strtotime($datePrevEnd));
                
                $ambBooking = AmbulanceBooking::whereBetween('created_at', [$dateFrom, $dateTo])->count();
                $b[$j] = $ambBooking;
                $bookingCounting = $b;
            }
            $bookingCounting = array_values($bookingCounting);
            return $bookingCounting;
        }
        public static function current_month_data(){
            $bkgCountCurrMonth = [];
            $c=[]; 
            $date = time();
            $currentDateLimit = date('d', $date);
            for ($j = 1; $j <= $currentDateLimit; $j++) {
                $dateFrom = date('Y-m-' . $j . ' 00:00:00', time());
                $dateTo = date('Y-m-' . $j . ' 23:59:59', time());
                $ambBkgCurMonth = AmbulanceBooking::whereBetween('created_at', [$dateFrom, $dateTo])->count();
                $c[$j] = $ambBkgCurMonth;
                $bkgCountCurrMonth = $c;
            }
            $bkgCountCurrMonth = array_values($bkgCountCurrMonth);
            return $bkgCountCurrMonth;
        }
        public static function booking(){
            $lastRecord = AmbulanceBooking::latest()->first()->toArray();
            return $lastRecord;
        }
        public static function user(){
            $lastUser = User::latest()->first()->toArray();
            return $lastUser;
        }
        public static function ambulance(){
            $lastAmbulance = Ambulance::latest()->first()->toArray();
            return $lastAmbulance;
        }
    }