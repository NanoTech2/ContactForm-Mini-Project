<?php
error_reporting();
include('config.php');
// fetching admin email where mail will send
$sql ="SELECT emailId from tblemail";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0):
foreach($results as $result):
$adminemail=$result->emailId;
endforeach;
endif;
if(isset($_POST['submit']))
{
// getting Post values	
$name=$_POST['name'];
$phoneno=$_POST['phonenumber'];
$email=$_POST['emailaddres'];
$subject=$_POST['subject'];
$message=$_POST['message'];
$uip = $_SERVER ['REMOTE_ADDR'];
$isread=0;
// Insert quaery
$sql="INSERT INTO  tblcontactdata(FullName,PhoneNumber,EmailId,Subject,Message,UserIp,Is_Read) VALUES(:fname,:phone,:email,:subject,:message,:uip,:isread)";
$query = $dbh->prepare($sql);
// Bind parameters
$query->bindParam(':fname',$name,PDO::PARAM_STR);
$query->bindParam(':phone',$phoneno,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':subject',$subject,PDO::PARAM_STR);
$query->bindParam(':message',$message,PDO::PARAM_STR);
$query->bindParam(':uip',$uip,PDO::PARAM_STR);
$query->bindParam(':isread',$isread,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
//mail function for sending mail
$to=$email.",".$adminemail; 
$headers .= "MIME-Version: 1.0"."\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
$headers .= 'From:PHPGurukul Contact Form Demo<info@phpgurukul.com>'."\r\n";
$ms.="<html></body><div>
<div><b>Name:</b> $name,</div>
<div><b>Phone Number:</b> $phoneno,</div>
<div><b>Email Id:</b> $email,</div>";
$ms.="<div style='padding-top:8px;'><b>Message : </b>$message</div><div></div></body></html>";
mail($to,$subject,$ms,$headers);




echo "<script>alert('Your info submitted successfully.');</script>";
  echo "<script>window.location.href='index.php'</script>";
}
else 
{
echo "<script>alert('Something went wrong. Please try again');</script>";
  echo "<script>window.location.href='index.php'</script>";
}


}


?>
<!DOCTYPE HTML>
<html>
<head>
<title>PHPGurukul Contact Form With Mail function and Database store Facility</title>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>

<!--web-fonts-->
<link href='//fonts.googleapis.com/css?family=Josefin+Sans:400,100,300,600,700' rel='stylesheet' type='text/css'>
<!--web-fonts-->
</head>
<body>
		<!---header--->
		<div class="header">
			<h1>Contact Form</h1>
		</div>
		<!---header--->
		<!---main--->
			<div class="main">
				<div class="main-section">
				<div class="login-form">
					<h2>get in touch with us</h2>
					<p>Feel free to drop us a line and we'll get back to you in 24 hours min!</p>
						<span></span>
					<form name="ContactForm" method="post">

<h4>your name</h4>
<input type="text" name="name" class="user" placeholder="Johne"  autocomplete="off" required>

<h4>your phone number</h4>
<input type="text" name="phonenumber" class="phone" placeholder="0900.234.145678" maxlength="10" required autocomplete="off">

<h4>your email address</h4>
<input type="email" name="emailaddres" class="email" placeholder="Example@mail.com" required autocomplete="off">

<h4>your subject</h4>
<input type="text" name="subject" class="email" placeholder="Subject" autocomplete="off">

<h4>your message</h4>
<textarea class="mess" name="message" placeholder="Message" required></textarea>
<input type="submit" value="send your message" name="submit">
</form>
				
				</div>
				</div>
			</div>

		<!---main--->
</body>
</html>