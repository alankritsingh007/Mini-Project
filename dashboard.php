<?php
session_start();
if(isset($_SESSION['IS_LOGIN'])){
	echo "";
}else{
	header('location:index.php');
	die();
}
?>
<!DOCTYPE html>
<head>
      <style type="text/css">
  a:link, a:visited {
  background-color: white;
  color: black;
  border: 2px solid green;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}

a:hover, a:active {
  background-color: green;
  color: white;
}
h1 {
  display: block;
  font-size: 6em;
  margin-top: 0.67em;
  margin-bottom: 0.67em;
  margin-left: 0;
  margin-right: 0;
  font-weight: bold;
  
}
</style>
</head>
<body background="image.jpg"> 

<table border="0" width="100%" height="700px">
<tr>
<th> <font face="Monoton"> Alankrit SIngh</font> </th>
<th></th>
<th></th>
<th> <a href="#"> Home </a> </th>
<th> <a href="#"> About Us </a></th>
<th> <a href="#"> Contact Us </a></th>
<th> <a href="logout.php">Logout</a></th>
</tr>
<tr>
<th colspan="6">
<h1> Welcome to our website </h1> <br>
</th>
</tr>

<tr>
<th colspan="6">
<font size="5" color="green" face="Aquire"> Subscribe Now </font>

</th>
</tr>

<tr>
<th></th>
<th></th>
<th></th>
<th></th>
<th></th>
<th></th>
</tr>

<tr>
<th colspan="6">
<font color="black" > Thanks for visiting </font>
</th>
</tr>
<tr>
<th></th>
<th></th>
<th></th>
<th></th>
<th></th>
<th></th>
</tr>
</table>  
</body>
</html>