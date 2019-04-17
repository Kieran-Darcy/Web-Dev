<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Audiowide' rel='stylesheet'>
	<title>Post</title>
	<style>
		body {
			background-color: #b3dee5;
			font-family: 'Ubuntu', sans-serif;
			margin: 0px;
		}
		
		.container {
			background-color: #fff;
			border-bottom: solid 1px white;
			margin: 0px;
			padding: 0px;
			width: 98.2vw;
			height: 10vh;
			box-shadow: 0px 1px 5px;
		}
		
		.header {
			float: left;
			margin: 20px 0px 0px 0px;
			display: inline-block;
			font-family: 'Audiowide', sans-serif;
			color: #3abaff;
		}
		
		.menu {
			display: inline-block;
			margin: 5px 0px;
			padding: 0px;	
			float: right;			
		}
		
		ul {
			margin: 0px;
			padding: 0px;
		}
		
		.viewbtn {
			display: inline-block;
			text-align: center;	
			list-style-type: none;
			background-color: white;
			color: black;
			border-radius: 20px;			
			padding: 1px 2px 1px 2px;
		}		

		.viewbtn:hover{
			background-color: #3abaff;
			box-shadow: 0px 0px 150px 0px #0000f0;
			transition-duration: 0.5s;
		}
			
		.viewbtn a:hover{
			color: white;
			transition-duration: 0.5s;
		}
		
		.viewbtn:last-child {
			font-weight: bold;
		}
			
		a:link, a:visited {
			color: black;
			text-decoration: none;
		}	
		
		span {
			margin: 0px 5px;
			padding: 0p;
		}
		
		.poster {
			background-color: #FFFFFF;
			width: 400px;
			height: 400px;
			margin: 112px auto;
			border-radius: 24px;
			box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);
		}
    
		.subhead {
			padding-top: 40px;
			color: #3abaff;
			font-family: 'Ubuntu', sans-serif;
			font-weight: bold;
			font-size: 23px;
		}
    
		form {
			padding-top: 40px;
		}
    
		.un {
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
   
		.un:focus {
			background-color: white;
			border: 2px solid #e0e0e0;
			border-radius: 20px;
		}
	
		.un:hover {
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
			margin-left: 30%;
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
	<div class="container" >
		<h1 class="header" >Messager</h1>		
		<div class="menu" >		
			<ul>			
				<li class="viewbtn" ><a href="<?php echo base_url('message'); ?>">Add Post</a></li>				
				<span></span>
				<li class="viewbtn" >
				<a href="<?php if(isset($_SESSION['username'])) {echo base_url('user/view/').$_SESSION['username'];} else {echo base_url('user/login');} ?>">Your Posts</a>
				</li>
				<span></span>
				<li class="viewbtn" ><a href="<?php echo base_url('search'); ?>">Search</a></li>
				<span></span>
				<li class="viewbtn" ><a href="<?php if(isset($_SESSION['username'])) {echo base_url('user/feed/').$_SESSION['username'];} else {echo base_url('user/login');} ?>">Followed Messages!</a></li>
				<span></span>
				<li class="viewbtn" ><a href="<?php echo base_url('user/logout'); ?>">Logout!</a></li>
			</ul>
		</div>		
	</div>

	<div class="poster">
	<p class="subhead" align="center">Make a Post</p>
	<form action="<?php echo base_url('message/doPost') ?>" method="post">
		<textarea class="un" type="text" align="center" rows="4" cols="50" name="mpost" placeholder="Write a post"></textarea>
		<input class="submit" align="center" type="submit" value="Post Message">
	</form>	
	</div>
</body>
</html>