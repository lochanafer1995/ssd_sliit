<?php
//The code for : process.php
//session_start();
if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
}
switch($_GET["action"]) {
    case "login":
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $user = $_POST["user"];
			$pass = $_POST["pass"];
            $salt = '$a$Gfyew@!hjerifdggh#$uyTT$';
			if (isset($user, $pass) && (crypt($user . $pass, $salt) == crypt("loch123", $salt))) {
                $_SESSION["user"] = $_POST["user"];
				setcookie("jsession", $_POST["user"], time() + (56400), "/");
				header("Location: gettokken.php");
            }
        }
        break;
 
    case "logout":
		setcookie("jsession", "", time() - (86400),"/");
		setcookie("csrf", "", time() - (86400),"/");
        $_SESSION = array();
        session_destroy();
		header("Location: login.php");
        break;
    
	
	case "csrf":
		echo ('dsa');
		setcookie("csrf",generateRandomString(), time() + (56400), "/");
        break;
		
	case "check":
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if(($_POST["csrftoken"] == $_COOKIE['csrf']) && ($_POST["sessiontoken"] == $_COOKIE['jsession']))
			$csrvalue = ($_POST["csrftoken"]);
			$sessionvalue = ($_POST["sessiontoken"]);
			header("Location: sucess.php?action=$sessionvalue");
		}
        break;
}

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

?>