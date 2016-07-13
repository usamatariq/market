<?php
	session_start();
	require_once $_SERVER["DOCUMENT_ROOT"] . "/danceseen/COMMON/Globe.php";
	$globe = new Globe();
	
	if(!isset($_SESSION['userID'])) {
		$index = $globe->g_root() . "/index.php";
		header("Location: index.php");
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Danceseen - Jobs</title>
	<?php
		require_once($globe->g_head());
	?>
</head>

<body>
	<?php
		require_once($globe->g_userHeader());
	?>
	
<div class="container" style="margin-top:20px;">
<div class="col-md-3 col-md-offset-1">       
	<div class="panel panel-default panel-body">

	<!--Name&Photo-->
	<div>
		<h2>Funky Fab</h2>
		<img src="../img/img_rounded.png" alt="..." class="img-rounded" >
		
	</div>
	
	<!--Status-->
	<div style="padding-top:10px;padding-bottom:10px;">
		<ul class="bullet-none">
			<li>Popper/Locker</li>
			<li> FunkyStyles </li>
			<li>8 years experience</li>
			<li>Singapore</li>
		</ul>
	</div>
	<div style="padding-top:10px;padding-bottom:10px;">
			<button type="button" class="btn btn-default col-md-5 " style="margin-right:5px;">Message</button>
			<button type="button" class="btn btn-default col-md-5" style="margin-right:5px;">Follow</button>
	</div>
	</div>
	
	<div class="panel panel-default ">
	<div class="panel-body">
	<h3>About Me</h3>
	<p>
	Hello, my name is Fabian and I love like to write about myself. I enjoy looking at girls much more. I come from Singapore but I was born a gay. 
	</br>
	Feel free to contact me through the website if you'd like to me to help you with any performane or showcase.
	</p>
	</div>
	</div>

 </div>
 
 <div class="col-md-7">
 <div class="panel panel-default" style="background-color: #f8f8f8;border:none;padding:0px;">
 <div class="panel-body" style="background-color: #f8f8f8;border:none;padding:0px;">
  <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
        <li class="active">
		<a href="#aboutme" data-toggle="tab">Videos</a></li>
        <li><a href="#experience" data-toggle="tab">Experience</a></li>
		<li style="float:right;"><a href="profile_edit_old.php">Edit</a></li>
    </ul>
	
    <div id="my-tab-content" class="tab-content " style="padding:15px;background-color: #ffffff; border: 1px solid #dddddd;border-top:none;">
	
        <div class="tab-pane active " id="aboutme">
		<div style="padding-bottom:30px;">
		<iframe width="560" height="315" src="//www.youtube.com/embed/3bslNdp4DHg" frameborder="0" allowfullscreen></iframe>
		asdasdsa
		</div>
		<div>
		<iframe width="560" height="315" src="//www.youtube.com/embed/KenWN5bYxs4" frameborder="0" allowfullscreen></iframe>
		asdasdsa
		</div>
		
		</div>
        
		<div class="tab-pane" id="experience">
        <table class="table">
		<thead>
		<tr>
          <th style="width:30%;">Showcase</th>
          <th></th>
        </tr>
		</thead>
		<tbody>
					
			<tr>
            <td>O School Recital 2012</td>
			<td>Performer</td>
			</tr>
			
			<tr>
            <td>NTU Open House 2009</td>
			<td>Performer</td>
			</tr>
			
			<tr>
            <td>Joint Dance Concert 2010</td>
			<td>Performer</td>
			</tr>
			
			<tr>
            <td>Joint Dance Concert 2011</td>
			<td>Performer</td>
			</tr>
			
		</tbody>
		</table>
		
		<table class="table">
		<thead>
		<tr>
          <th style="width:30%;">Achievements</th>
          <th></th>
        </tr>
		</thead>
		<tbody>
					
			<tr>
            <td>Funk the Floor 2012</td>
			<td>Third Runner-Up</td>
			</tr>
			
			<tr>
            <td>R16 Singapore 2012</td>
			<td>Top 16 Qualifier</td>
			</tr>
			
		</tbody>
		</table>
		
        </div>

       
    </div>
	</div>
	</div>
</div>

	
</div><!--container-->
	
	
	
	
	<?php require_once($globe->g_footer()); ?>
</body>

</html>