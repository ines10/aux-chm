<?php


function sendSms($destination,$msg){
    include_once("ViaNettSMS.php");
    $Username = "ines.atia@esprit.tn";
    $Password = "h52tl";
    $MsgSender = "coucou";
    $DestinationAddress = $destination;
    $Message = $msg;
// Create ViaNettSMS object with params $Username and $Password
    $ViaNettSMS = new ViaNettSMS($Username, $Password);
    try
    {
        // Send SMS through the HTTP API
        $Result = $ViaNettSMS->SendSMS($MsgSender, $DestinationAddress, $Message);
        // Check result object returned and give response to end user according to success or not.
        if ($Result->Success == true)
            $Message = "Message successfully sent!";
        else
            $Message = "Error occured while sending SMS<br />Errorcode: " . $Result->ErrorCode . "<br />Errormessage: " . $Result->ErrorMessage;
    }
    catch (Exception $e)
    {
        //Error occured while connecting to server.
        $Message = $e->getMessage();
    }
    return $Message;
}



?>

<html>
	<head>
		<title>ViaNettSMS Example</title>
	</head>
	<body>
<?php
echo "			<p><strong>SMS Result</strong><br />Status: $Message</p>";
?>
	</body>
</html>