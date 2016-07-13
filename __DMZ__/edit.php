<?php
	session_start();
	require $_SERVER["DOCUMENT_ROOT"] . "/danceseen/Globe.php";
	$globe = new Globe();
	
	if(!isset($_SESSION['userID'])) {
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
	<script type="text/javascript" src="js/country.js"></script>
	<script>
$(document).ready(function(){
  $("#btn_add").click(function(){
    $("#11").append('<div class="input-group" style="display:block;padding-bottom:10px;"><select class="form-control"><option ></option><option selected="selected">Bboy</option><option>Locking</option><option>Popping</option></select><button type="button" class="btn btn-default">Remove</button>				</div>');
  });
});
</script>
</head>



<body>
	<?php
		require_once($globe->g_userHeader());
	?>
	
<div class="container" style="margin-top:20px;">
<div class="col-md-3 col-md-offset-1" >       
	<div class="panel panel-default panel-body" style="padding:0px;border:0px;">
	
	<!--Profile-->
	<div class="nav-panel" >
		<a href="#aboutme" data-toggle="tab"><div class="nav-tab">General</div></a>
		<a href="#personal" data-toggle="tab"><div class="nav-tab">Profile</div></a>
		<a href="#portfolio" data-toggle="tab"><div class="nav-tab">Portfolio</div></a>
		

	</div>
	
	
	</div>
</div>
 
 <div class="col-md-7">
 <div class="panel panel-default" style="background-color: #f8f8f8;border:none;padding:0px;">
 <div class="panel-body" style="background-color: #f8f8f8;border:none;padding:0px;">
    <div id="my-tab-content" class="tab-content " style="padding:15px;background-color: #ffffff; border: 1px solid #dddddd;">
	
        <div class="tab-pane active " id="aboutme">
		<table class="table">
		<thead>
		<tr>
          <th style="width:30%;">Account Setting</th>
          <th></th>
        </tr>
		</thead>
		<tbody>
			
			<tr>
            <td>Email</td>
			<td><fieldset disabled><input type	="text" value="fabian9sg@hotmail.com" class="form-control"></fieldset></td>
			</tr>
			
			<tr>
            <td>Username</td>
			<td><fieldset disabled><input type	="text" value="funkyfab" class="form-control"></fieldset></td>
			</tr>
			
			<tr>
            <td>Password</td>
			<td><a href="edit.php">Change Password</a></td>
			</tr>
			
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
					<li><input type="checkbox" value=""> Danceseen has new job offers</li>
					<li><input type="checkbox" value=""> Danceseen has upcoming events</li>
					<li><input type="checkbox" value=""> Danceseen has great deals.</li>
					
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
		
		</div>
        
		<div class="tab-pane" id="personal">
		
		<table class="table">
		<thead>
		<tr>
          <th style="width:30%;">Profile</th>
          <th></th>
        </tr>
		</thead>
		<tbody>
					
			<?php require("View/profile.php");?>
			
			
			
			
			

</table>
</form>
</fieldset>
			</td>
			</tr>
			
		</tbody>
		</table>
		</div>
		
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

</html>