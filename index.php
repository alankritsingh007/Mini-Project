<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>PHP OTP Login Form</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<style type="text/css">
	body{
    margin: 0;
    padding: 0;
    background: url("book.jpg");
    background-size: cover;
    background-position: center;
    font-family: sans-serif;
}
	.login-form {
		position: absolute;
 		right: 2px;
  		width: 500px;
		
  		border: 6px solid #73AD21;
  		padding: 10px;
    	margin: 70px auto;
	}
    .login-form form {
    	margin-bottom: 28px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 60px;
		height:300px;
    }
    .login-form h1 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
		background-color: black;
    }
</style>
</head>
<body>
<div class="login-form">
    <form  method="post">
        <h1 class="text-center">Log in</h1>       
        <div class="form-group first_box">
            <input type="text" id="email" class="form-control" placeholder="Email" required="required">
			<span id="email_error" class="field_error"></span>
        </div>
        <div class="form-group first_box">
            <button type="button" class="btn btn-primary btn-block" onclick="send_otp()">Send OTP</button>
        </div>
        <div class="form-group second_box">
            <input type="text" id="otp" class="form-control" placeholder="OTP" required="required">
			<span id="otp_error" class="field_error"></span>
        <div class="form-group second_box">
            <button type="button" class="btn btn-primary btn-block" onclick="submit_otp()">Submit OTP</button>
        </div>     
    </form>
</div>
<script>
function send_otp(){
	var email=jQuery('#email').val();
	jQuery.ajax({
		url:'send_otp.php',
		type:'post',
		data:'email='+email,
		success:function(result){
			alert(result);
			if(result=='yes'){
				jQuery('.second_box').show();
				jQuery('.first_box').hide();
			}
			if(result=='not_exist'){
				jQuery('.field_error').html('Please enter valid email');
			}
		}
	});
}

function submit_otp(){
	var otp=jQuery('#otp').val();
	jQuery.ajax({
		url:'check_otp.php',
		type:'post',
		data:'otp='+otp,
		success:function(result){
			if(result=='yes'){
				window.location='dashboard.php'
			}
			if(result=='not_exist'){
				jQuery('#otp_error').html('Please enter valid otp');
			}
		}
	});
}
</script>
<style>
.second_box{display:none;}
.field_error{color:red;}
</style>
</body>
</html>                                		                            