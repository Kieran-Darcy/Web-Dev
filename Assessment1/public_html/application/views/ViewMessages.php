<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>View Messages</title>
	<link href='https://fonts.googleapis.com/css?family=Audiowide' rel='stylesheet'>
	<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
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
		
		table {
			font-size: 12px;
			border: 0px;
			margin-top: 30px;
			width: 98.2vw;
		}
		
		tr {
			background-color: #def8fd;
			box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.20);
		}		
		
		tr * {
			padding: 20px 0px 20px 2px;
		}
		
		#name, #name a{
			text-align: center;
			text-decoration: underline;
			color: #3abaff;
		}
		
		#time {
			text-align: right;
		}
		
		a:link, a:visited {
			color: black;
			text-decoration: none;
		}
		
		.follbtn {
			float: right;
			margin: 1vh 1vw 0px 0px;
			padding: 1px 2px 1px 2px;
			font-size: 20px;
			font-weight: bold;
			border: solid 1px black;
		}
		
		.follbtn, .follbtn a:hover {
			background-color: #3abaff;
			color: white;
		}
		
		span {
			margin: 0px 5px;
			padding: 0p;
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
			<?php if(isset($follow)) {echo $follow;} ?>	
		</div>		
	</div>

	<table>
	<?php foreach($results as $row) {?>
		<tr>
			<td id="name" ><a href="<?php echo base_url('user/view/').$row['user_username'] ?>"><?php echo $row['user_username']; ?>: </a></td>
			<td><?php echo $row['text']; ?></td>
			<td id="time" ><?php echo $row['posted_at']; ?></td>
		</tr>
	<?php } ?> 
	</table> 

</body>
</html>