<html>

<?php

$message1="";
$message2="";
$message3="";
$name="";
$email="";
$message="";
$x=0;

if(isset($_POST["submit"])){
	
$connection = mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db('message_website',$connection) or die(mysql_error());	
	
$name=$_POST["name"];
$email=$_POST["email"];	
$message=$_POST["message"];		
	
//------------------to verify name   
if(strlen($name)<2 and strlen($name)>0){
	$message1="Name too short";
}
elseif(strlen($name)>35){
	$message1="Name too long";
}
elseif(strlen($name)==0){
	$message1="This field is empty";
}
else{
	$message1="";
	$x=1;
};

//---------------------This is to verify your Email
if($email==""){
	$message2="This field is empty";
}
elseif(!filter_var($email,FILTER_VALIDATE_EMAIL) and $email!=""){
	$message2="Invalid E-mail";
}
else{
	$x=$x+1;
	$message3="";
}

//------------------to verify message  
if(strlen($message)<3 and strlen($message)>0){
	$messag3="Message too short";
}
elseif(strlen($message)>200){
	$message3="Message too long";
}
elseif(strlen($message)==0){
	$message3="This field is empty";
}
else{
	$message3="";
	$x=$x+1;
};
			
}


if($x==3){
	
	$name= mysql_real_escape_string($name);
	$email= mysql_real_escape_string($email);
	$message= mysql_real_escape_string($message);
	
	$mes='Name : '.$name.' ......... Email : '.$email.' .......... Message : '.$message ;
	mail("ikushum@gmail.com","Message from website",$mes);
	
	$insert= "INSERT INTO data (name,email,message) VALUES('$name','$email','$message')";

	mysql_query($insert,$connection); 

	mysql_close();	
	
	$name="";
    $email="";
    $message="";	
	
	echo '';
	
}

?>


<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="ikushum, Ishan Subedi, web designer, graphic designer, ikushum.com">
<meta name="description" content="This is the personal portfolio website of graphic and web designer Ishan Subedi.">
<meta name="author" content="Ishan Subedi">
<title> Ishan Subedi - About </title>
<link  type="text/css" rel="stylesheet" href="style.css">
<link  type="text/css" rel="stylesheet" href="style_contact.css">
<link rel="shortcut icon" type="image/x-icon" href="img/icon.png" />



</head>

<body>

<div id="head">

<div id="header_image">
<img id="header" src="img/ishan.jpg">
</div>

<div id="res_menu">
<div id="res_menu_label">
<div id="line"></div>
<div id="line"></div>
<div id="line"></div>
</div>
<ul class="menu"><li style="border:none;"><a class="rmenu"> Contact </a></li></ul>
</div>

<div id="menu">
<ul class="menu">
<li><a class="menu" href="index.php"> HOME </a></li>
<li><a class="menu" href="about.php" > ABOUT </a></li>
<li><a class="menu" href="gallery.php"> GALLERY </a></li>
<li><a class="menu" href="contact.php"> CONTACT</a></li>
</ul>
</div>
</div>

<div id="container">

<div id="alert">
 <h2 class="alert"> Your message was sent successfully </h2> 
 </div>

<div id="content_contact">


<div id="contact_form">

<br><br>

<h1 class="contact"> Contact Me <h1>
<h2 class="contact"> If you have any questions, comments or suggestions feel free to contact me. I will get back to you as soon as I can. Your privacy will be taken very seriously and will never spam or give out email address. Let me know how I can help you.</h2>

<form action="contact.php" method="post">
<h2 class="form"> Name </h2><?php echo $message1  ?> <input class="text" type="text" name="name" value="<?php echo $name; ?>" >
<h2 class="form"> Email </h2><?php echo $message2  ?> <input class="text" type="text" name="email" value="<?php echo $email; ?>">
<h2 class="form"> Message </h2><?php echo $message3  ?> <textarea name="message" value="<?php echo $message; ?>"></textarea>
<br><input class="submit" type="submit" name="submit" value="Submit">
</form>

</div>

<div id="freelancer_link">
<a href="https://www.freelancer.com/u/ikushum1.html" class="freelancer_image"><div id="freelancer_image"><img src="img/freelancer_logo.jpg"></div></a>
<a href="https://www.freelancer.com/u/ikushum1.html"><h2 class="flancer"> Need help in freelancer ? </h2></a>
<a href="https://www.freelancer.com/u/ikushum1.html" class="freelancer" > Hire Me Now </a>
</div>

<div id="contact_media">
<h2 class="contact_media"> You can find me on: </h2>
<div class="findMe"><a href="https://www.facebook.com/ishan.subedi.5"><img class="media" src="img/facebook_about.jpg"></a></div>
<div class="findMe"><a href="https://instagram.com/ishan_kushum"><img class="media" src="img/insta_about.jpg"></a></div>
<div class="findMe"><a href="https://twitter.com/ikushum"><img class="media" src="img/twitter_about.jpg"></a></div>
</div>



</div>

</div>

<div id="footer">

<br><br>
<text class="footer"> &#169 2015 Ishan Subedi  </text><br>
<text class="footer"> All rights reserved </text><br>
<text class="footer"> Further details: ikushum@gmail.com </text>


</div>

<script src="jquery-list.js"></script>

<?php
if($x==3){
echo'<script src="javascript.js"></script>';
}
?>

<script src="jquery-list.js"></script>
<script src="res_menu.js"></script>



</body>



</html>