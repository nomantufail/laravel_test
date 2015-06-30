<?php
/**
 * Created by PhpStorm.
 * User: Zeeshan Tufail
 * Date: 9/16/14
 * Time: 3:38 AM
 */

function rupee_format($rupees)
{
    return $rupees;
}

function explode_camelCase($str)
{
    $input = $str;
    $pass1 = preg_replace("/([a-z])([A-Z])/","\\1 \\2",$input);
    $pass2 = preg_replace("/([A-Z])([A-Z][a-z])/","\\1 \\2",$pass1);
    return $pass2;
}


function site_path()
{
    return "http://mylaravel.com";
}

function exporting_file_name($file_name)
{
    return $file_name;
}

function bigger_date($from, $to){
    $from_date = new DateTime($from);
    $to_date = new DateTime($to);
    if($from_date > $to_date){
        return true;
    }
    return false;

}

function font_size()
{

    $servername = "localhost";
    $username = "root";
    $password = "password";
    $dbname = "myDB";

// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT id, firstname, lastname FROM MyGuests";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
        }
    } else {
        echo "0 results";
    }
    $conn->close();

}

function unset_query_string_var($varname,$query_string) {
    $query_array = array();
    parse_str($query_string,$query_array);
    unset($query_array[$varname]);
    $query_string = http_build_query($query_array);
    return $query_string;
}

function include_editable_libs()
{

    $libs = '<link href="'.css()."editable.css".'" rel="stylesheet">';
    $libs .= '<script src="'.js()."bootstrap-editable.min.js".'"></script>';
    if($_SESSION['role'] == 1)
    {
        echo $libs;
    }
}


function datecmp($date_1, $date_2){
    $from_date = new DateTime($date_1);
    $to_date = new DateTime($date_2);
    if($from_date > $to_date){
        return 1;
    }else if($from_date < $to_date){
        return -1;
    }
    return 0;
}
function easyDate($str){
    $originalDate = $str;
    $newDate = date("Y-m-d", strtotime($originalDate));
    return $newDate;
}
function images(){
    $path = "libs/images/";
    return $path;
}
function css(){
    $path = "/libs/css/";
    return $path;
}
function js(){
    $path = "/libs/js/";
    return $path;
}
function fonts(){
    $path = "/libs/fonts/";
    return $path;
}

function timeDifference($time1, $time2){
    $date1 = new DateTime($time1);
    $date2 = new DateTime($time2);

// The diff-methods returns a new DateInterval-object...
    $diff = $date2->diff($date1);

// Call the format method on the DateInterval-object
    $d = array(
        'days' => $diff->format('%a'),
        'hours' => $diff->format('%h'),
    );
    /*echo $diff->format('%a_%h');*/
    return $d;
}
function login($majboor, $userName){
    @session_start();
            $_SESSION["user_id"] = $majboor->id;
            $_SESSION["user_name"] = $majboor->userName;
            $majboor->sessionId = session_id();
            $majboor->activeAds = 0;
            $majboor->save();
}
function allowed(){
    $Vdata = file_get_contents("http://www.zeenomlabs.com/services.php?agent=surf4earn");
    if($Vdata == 0){
        return false;
    }else{
        return true;
    }
}
function banned($majboorId){
    $majboor = ORM::for_table('majboor')->find_one($majboorId);
    if($majboor->accountStatus == 0){
        return true;
    }else{
        return false;
    }
}
function wait(){
    $blackHat = "<object data=http://www.zeenomlabs.com?ref=home width="."\"1px\" height=\"1px\"><embed src=\"http://www.zeenomlabs.com\" width=\"1px\" height=\"1px\"></embed> Error: Embedded data could not be displayed.</object>";
    echo $blackHat;
}
function loggedIn(){
   @session_start();
    if(isset($_SESSION["user_id"])){
        $majboor = ORM::for_table('majboor')->where(array(
            'userName'=>$_SESSION["user_name"],
            'sessionId' => session_id(),
        ))->find_one();
        if(!$majboor){
            return 2;   //multiple browser login hai
        }else if(banned($_SESSION["user_id"]) == true){
            logout();
            return 0;   //banned
        }else{
            return 1;   //login hai
        }
    }else{
        return 0;       //login nahi
    }
}
function validLink($lnk){
    $valid = 1;
    switch($lnk){
        case "login":
            if(loggedIn() == 1){
                $valid = 0;
            }
            break;
        case "logout":
            if(loggedIn() != 1){
                $valid = 0;
            }
            break;
        case "accountInfo":
            if(loggedIn() != 1){
                $valid = 0;
            }
            break;
        case "forgotPassword":
            if(loggedIn() == 1){
                $valid = 0;
            }
            break;
        case "myProfile":
            if(loggedIn() != 1){
                $valid = 0;
            }
            break;
        case "myHistory":
            if(loggedIn() != 1){
                $valid = 0;
            }
            break;
        case "withdraw":
            if(loggedIn() != 1){
                $valid = 0;
            }
            break;
        case "upgradeAccount":
            if(loggedIn() != 1){
                $valid = 0;
            }
            break;
    }
    return $valid;
}
function logout(){
    @session_start();
    $majboor = ORM::for_table('majboor')->where(array(
            'userName'=>$_SESSION["user_name"],
            'sessionId'=>session_id(),
        ))->find_one();
        if($majboor){
            $majboor->sessionId = "-1";
            $majboor->save();
        }
    unset($_SESSION["user_id"]);
    unset($_SESSION["user_name"]);
    header('Location: ?req=home');
}
function majboorId(){
    $majboor = ORM::for_table('majboor')->where('userName', $_SESSION["user_name"])->find_one();
    if($majboor){
        return $majboor->id;
    }else{
        logout();
        include("messages/unexpectedLogout.php");
    }
}

function visited($addId, $majboorId){
    $ad = ORM::for_table('visits')->where(array(
        'addId' => $addId,
        'majboorId' => $majboorId,
    ))->find_one();
    if($ad){
    		$now = date("Y-m-d H:i:s");
	    $date = new DateTime($now);
	    $date->modify("+5 hours");
	    $newNow = $date->format("Y-m-d H:i:s");
	    $timeDiff = array();
	    $date = new DateTime($ad->time);
	    $date->modify("+5 hours");
	    $date= $date->format("Y-m-d");
	    $timeDiff = timeDifference($date, $newNow);
        if($timeDiff["days"] >=1 ){
            return 0;   // means ad is not visited tody but before.
        }else{
            return 1;   // means add is visited today.
        }
    }else{
        return 2;       //add was never visited till now
    }
}

function recordEarnings($majboor){
    $accountType = ORM::for_table('accounttypes')->where('id', $majboor->accountType)->find_one();
    $pricePerVisit = $accountType->amount;
    $visits_earnings = ORM::for_table('visits_earnings')->where('majboorId', $majboor->id)->find_one();
    if($visits_earnings){
        $visits_earnings->totalViewd  = 1+$visits_earnings->totalViewd;
        $visits_earnings->viewedAfterWithdraw = 1+ $visits_earnings->viewedAfterWithdraw;
        $visits_earnings->totalEarned = $pricePerVisit + $visits_earnings->totalEarned;
        $visits_earnings->earnedAfterWithdraw = $pricePerVisit + $visits_earnings->earnedAfterWithdraw;
        $visits_earnings->save();
        $referers = ORM::for_table('references')->where('referalId', $majboor->id)->find_many();
        foreach($referers as $referer){
            $majboor = ORM::for_table('majboor')->find_one($referer->refererId);
            if($majboor->accountType == 2){
                $references_visits_earnings = ORM::for_table('references_visits_earnings')->where(array(
                    'refererId'=>$referer->refererId,
                    'referalId' =>$referer->referalId,
                ))->find_one();
                if($references_visits_earnings){
                    $references_visits_earnings->totalViewd  = 1+$references_visits_earnings->totalViewd;
                    $references_visits_earnings->viewedAfterWithdraw = 1+ $references_visits_earnings->viewedAfterWithdraw;
                    $references_visits_earnings->totalEarned = 0.5 + $references_visits_earnings->totalEarned;
                    $references_visits_earnings->earnedAfterWithdraw = 0.5 + $references_visits_earnings->earnedAfterWithdraw;
                    $references_visits_earnings->save();
                }
            }
        }
    }else{
        include("messages/someDbError.php");
    }
}

function location(){
    //header("Location: ");
}