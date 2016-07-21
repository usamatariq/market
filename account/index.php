<?php
	session_start();
	require_once $_SERVER["DOCUMENT_ROOT"] . "/market/COMMON/Globe.php";
	$globe = new Globe();
	
	if(!isset($_SESSION['userID'])) {
		$index = $globe->g_root() . "/index.php";
		header("Location: index.php");
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>market - Jobs</title>
	<?php
		require_once($globe->g_head());
	?>
	<script type="text/javascript" src="js/country.js"></script>
	<script>
		$(document).ready(function(){
		  $("#btn_add").click(function(){
			$("#11").append('<div class="input-group" style="display:block;padding-bottom:10px;"><select class="form-control"><option ></option><option selected="selected">Bboy</option><option>Locking</option><option>Popping</option></select><button type="button" class="btn btn-default">Remove</button>				</div>');
		  });
		});
	</script>
	<?php
		require_once($globe->g_userHeader());
	?>
</head>

<body>	
<div class="container" style="margin-top:20px;">


<div class="col-md-3 " >       
	<div class="panel panel-default panel-body" style="padding:0px;border:0px;">
		<div class="nav-panel" >
			<img src="../img/img_rounded_200.png" alt="..." class="img-rounded img-centered">
		</div>
	</div>
	
	<div class="panel panel-default panel-body" style="padding:0px;border:0px;">
		<div class="nav-panel" >
			<a href="#account" data-toggle="tab"><div class="nav-tab">General</div></a>
			<a href="#personal" data-toggle="tab"><div class="nav-tab">Profile</div></a>
			<a href="#portfolio" data-toggle="tab"><div class="nav-tab">Portfolio</div></a>
		</div>
	</div>
</div>
 
 <div class="col-md-7">
 <div class="panel panel-default" style="background-color: #f8f8f8;border:none;padding:0px;">
 <div class="panel-body" style="background-color: #f8f8f8;border:none;padding:0px;">
    <div id="my-tab-content" class="tab-content " style="padding:15px;background-color: #ffffff; border: 1px solid #dddddd;">
<!--------------------TAB 1---------------------------->	
        <div class="tab-pane active " id="account">
		<table class="table">
		<thead>
		<tr>
			<th style="width:30%;">Account Setting</th>
			<th></th>
        </tr>
		</thead>
			<tbody>					
				<?php require $globe->g_root() . "/account/view/account.php";?>
			</tbody>
		</table>
		
		<table class="table">
		<thead>
		<tr>
          <th style="width:30%;">Email Notification</th>
          <th></th>
        </tr>
		</thead>
		<tbody>
			
			<tr>
			<td>Send me email when:</td>
			<td>
			<ul class="bullet-none">
					<li><input type="checkbox" value=""> Market has new job offers</li>
					<li><input type="checkbox" value=""> Market has upcoming events</li>
					<li><input type="checkbox" value=""> Market has great deals.</li>
					
				</ul>
			</td>
			</tr>
			
			<tr>
			<td>Remind me when:</td>
			<td>
			<ul class="bullet-none">
					<li><input type="checkbox" value=""> I have an upcoming job request.</li>
					<li><input type="checkbox" value=""> I have been accepted in a job.</li>
					<li><input type="checkbox" value=""> I have received a new message</li>
					<li><input type="checkbox" value=""> I have received a new reference request</li>
					
				</ul>
			</td>
			</tr>
			
			
		</tbody>
		</table>
		
		<table class="table">
		<thead>
		<tr>
          <th style="width:30%;">Privacy Setting</th>
          <th></th>
        </tr>
		</thead>
		<tbody>
					
			<tr>
			<td>Search</td>
			<td><input name="notify" type="radio" value="y" checked>
                <span>Yes</span>
				<input name="notify" type="radio" value="n">
                <span>No</span>
				</td>
			</tr>
			
			
		</tbody>
		</table>
		
		<table class="table">
		<thead>
		<tr>
          <th style="width:30%;">Others</th>
          <th></th>
        </tr>
		</thead>
		<tbody>
			
			<tr>
			<td><a href='#' style='color:#d9534f'>Delete Account<a></td>
			</tr>
			
			
		</tbody>
		</table>
		
		</div>
<!--------------------TAB 2---------------------------->        
		<div class="tab-pane" id="personal">		
		<table class="table">
		<thead>
			<tr>
			  <th style="width:30%;">Profile</th>
			  <th></th>
			</tr>
		</thead>
		<tbody>					
			<?php require $globe->g_root() . "/profile/view/profile.php";?>
		</tbody>
		</table>
		</div>
<!--------------------TAB 2----------------------------> 		
		<div class="tab-pane" id="portfolio">
		
		<table class="table">
		<thead>
		<tr>
          <th style="width:30%;">Portfolio</th>
          <th></th>
		  <th></th>
        </tr>
		</thead>
		<tbody>
			
			<tr>
            <td>Street Name</td>
			<td><input type	="text" value="Funky Fab" class="form-control"></td>
			</tr>
					
					
			<tr>
            <td>Genre</td>
			<td id="11">

			<div class="input-group" style="display:block;padding-bottom:10px;">
				
				<select class="form-control">
				<option selected="selected">Bboy</option>
				<option>Locking</option>
				<option>Popping</option>
				</select>
				<button type="button" class="btn btn-default">Remove</button>				
			</div>
			<div class="input-group" style="display:block;padding-bottom:10px;">
				
				<select class="form-control">
				<option>Bboy</option>
				<option selected="selected">Locking</option>
				<option>Popping</option>
				</select>
				<button type="button" class="btn btn-default">Remove</button>				
			</div>
			
			</td>
			</tr>
			
		</tbody>
		</table>
		<button id="btn_add" type="button" class="btn btn-default">Add</button>
		
		<table class="table">
			<tr>
            <td style="width:30%;">First Dance</td>
			<td><input type	="date" value="22/11/2007" class="form-control"></td>
			</tr>
			
			<tr>
            <td>Crew</td>
			<td><input type	="text" value="FunkyStyle" class="form-control"></td>
			</tr>
			
			<tr>
			<td>About Me</td>
			<td><textarea class="form-control" value="" rows="10">Hello, my name is Fabian and I love like to write about myself. I enjoy looking at girls much more. I come from Singapore but I was born a gay. Feel free to contact me through the website if you'd like to me to help you with any performance or showcase.</textarea></td>
			</tr>
			
			
			
		</tbody>
		</table>
		
		<table class="table">
		<thead>
		<tr>
          <th style="width:30%;">Showcase</th>
          <th> 
		  </th>
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
			
			<tr>
			<td>
			</td>
			<td><button type="submit" class="btn btn-default" style="float:right;">Add</button></td>
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
			
			<tr>
			<td>
			</td>
			<td><button type="submit" class="btn btn-default" style="float:right;">Add</button></td>
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
<script src="js/bootstrap-datepicker.js"></script>
<script>
	
	$('#dob').datepicker({
		 format: "dd/mm/yyyy",
		startDate: "01-01-1940",
		autoclose: true,
	});
			
	</script>
</script>
</html>