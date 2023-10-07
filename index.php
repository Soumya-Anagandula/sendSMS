<html>
<head>
<title>send sms</title>
<style>
    .container{
        margin-top: 15%;
        margin-left: 36%;
        align-items: center;
    }
    input[type=number] ,textarea{
        width: 30%;
        padding: 12px 20px;
        margin: 8px 0;
        box-sizing: border-box;
        border: none;
        border-bottom: 2px solid;
    }
    .btn {
        background-color: #4CAF50; 
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        border-radius: 10px;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
    }
</style>

</head>
<body background="bg.avif">

	<div class="container">
		<div class="error"></div>
		<form id="frm" action="" method="POST">
			<div class="heading"><h2>Send SMS with MSG91</h2></div>

			<div class="form-row">
				<input type="number" id="number" name="number" class="form-input"
					placeholder="Enter the 10 digit mobile">
			</div>
            <div class="form-row">
				<textarea name="msg"  id="msg"  rows="10" cols="50" placeholder="Enter your message..."></textarea>
                  
			</div>

			<button name="sendmsg" class="btn" onClick="return validate()">Send</button>
		</form>
	</div>
  <script src=validation.js></script>
</body>
</html>
<?php

//Your authentication key
$authKey = "407483AusVp5pui6521334bP1";
$senderId = "sowmya";

if(isset($_POST['sendmsg']))
{
  $mobileNumber= $_POST['number'];
  $msg= $_POST['msg'];
  $message = urlencode($msg);


  $postData = array(
    'authkey' => $authKey,
    'mobiles' => $mobileNumber,
    'message' => $message,
    'sender' => $senderId,

  );
  $url="http://api.msg91.com/api/sendhttp.php";

  // init the resource
    $ch = curl_init($url);
    curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $postData
        //,CURLOPT_FOLLOWLOCATION => true
    ));
    //Ignore SSL certificate verification
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    //get response
    $output = curl_exec($ch);

    //Print error if any
    if(curl_errno($ch))
    {
        echo 'error:' . curl_error($ch);
    }

    curl_close($ch);

    echo '<script> alert("your message has been sent to '.$mobileNumber.'")</script>';
   }

?>
