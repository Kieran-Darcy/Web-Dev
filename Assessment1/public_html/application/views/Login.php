<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
	<title>Login</title>
	<style>
	body {
        background-color: #b3dee5;
        font-family: 'Ubuntu', sans-serif;
    }
    
    .main {
        background-color: #FFFFFF;
        width: 400px;
        height: 400px;
        margin: 112px auto;
        border-radius: 24px;
        box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);
    }
    
    .sign {
        padding-top: 40px;
        color: #3abaff;
        font-family: 'Ubuntu', sans-serif;
        font-weight: bold;
        font-size: 23px;
    }
    
    form {
        padding-top: 40px;
    }
    
    .pass, .un {
		width: 76%;
		color: #263238;
		font-weight: 700;
		font-size: 14px;
		letter-spacing: 1px;
		background: #efefef;
		padding: 10px 20px;
		border: none;
		border-radius: 0px;
		outline: none;
		box-sizing: border-box;
		border: 2px solid #f3f3f3;
		margin-bottom: 50px;
		margin-left: 46px;
		text-align: center;
		margin-bottom: 27px;
		font-family: 'Ubuntu', sans-serif;
    }    
   
    .un:focus, .pass:focus {
		background-color: white;
        border: 2px solid #e0e0e0;
		border-radius: 20px;
    }
	
	.un:hover, .pass:hover {
		border-radius: 20px;
		background: white;
		transition-duration: 1s;
	}
    
    .submit {
      cursor: pointer;
        border-radius: 20px;
        color: #fff;
        background: #99dbe5;
        border: 0;
        padding-left: 40px;
        padding-right: 40px;
        padding-bottom: 10px;
        padding-top: 10px;
        font-family: 'Ubuntu', sans-serif;
        margin-left: 35%;
        font-size: 13px;
		transition-duration: 0.5s;
        box-shadow: 0 0 20px 1px #f5f5f5;
		
    }
	
	.submit:hover {
		box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
		background-color: #99dbe5;
		transition-duration: 0.5s;
	}
	</style>
</head>
<body>
	
	<div class="main">
		<p class="sign" align="center">Sign in</p>
		<form action="<?php echo base_url('user/doLogin') ?>" method="post">
			<input class="un " type="text" align="center" name="username" placeholder="Username">
			<input class="pass" type="password" align="center" name="pass" placeholder="Password">
			<input class="submit" align="center" type="submit" text="Sign in">
		</form>                          
    </div>
</body>
</html>