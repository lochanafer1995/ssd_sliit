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
				
				$sessionid = generateRandomString();
				$csrftoken = generateRandomString();
				setcookie("jsession", $sessionid, time() + (56400), "/");
				
				$myfile = fopen("token.txt", "w") or die("Unable to open file!");
				$txt = $sessionid."-".$csrftoken;
				fwrite($myfile, $txt);
				fclose($myfile);
				
				header("Location: gettokken.php");
            }
        }
        break;
 
    case "logout":
		setcookie("jsession", "", time() - (86400),"/");
        $_SESSION = array();
        session_destroy();
		header("Location: login.php");
        break;
    
	
	case "csrf":

		$myfile = fopen("token.txt", "r") or die("Unable to open file!");
		list ($jession , $csrf) = explode ("-" , fread($myfile,filesize("token.txt")));
		fclose($myfile);
		if($jession == $_POST["sessionid"])
		{
			echo $csrf;
		}
        break;
		
	case "check":
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			
			$myfile = fopen("token.txt", "r") or die("Unable to open file!");
			list ($jession , $csrf) = explode ("-" , fread($myfile,filesize("token.txt")));
			fclose($myfile);
			if($jession == $_COOKIE['jsession'])
			{
				if(($_POST["csrftoken"] == $csrf."ffsd"))
				{
					header("Location: sucess.php");
				}
				else
				{
					header("Location: unsucess.php");
				}
			}
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