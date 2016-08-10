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
<title>Market</title>
	<?php
		require_once($globe->g_head());
	?>
</head>

<body>
	<?php
		require_once($globe->g_userHeader());
	?>
	
<div class="container" style="">
	
	<div style="margin-top:20px;">
		<?php require("common/view/carousel.php"); ?>
	</div>
	
    <div class="row" style="margin-top:20px;">
        <div class="col-md-3">
            <div class="list-group">
				<a href="#" class="list-group-item">Electronics</a>
                <a href="#" class="list-group-item">Computer & Accessories</a>
				<a href="#" class="list-group-item">Tools & Equipment</a>
                <a href="#" class="list-group-item">Home Furniture & Appliances</a>
                <a href="#" class="list-group-item">Ground Transport</a>
				<a href="#" class="list-group-item">Fashion & Jewellery</a>
				<a href="#" class="list-group-item">Party & Event Item</a>
				<a href="#" class="list-group-item">Toys & Hobbies</a>
				<a href="#" class="list-group-item">Books & Entertainment</a>
				<a href="#" class="list-group-item">Wedding Essentials</a>
				<a href="#" class="list-group-item">Services</a>
            </div>
        </div>

        <div class="col-md-9">
			<div class="row">
				<div class="col-md-6">
					<div class="input-group">
					  <input type="text" class="form-control" placeholder="Search for an item">
					  <span class="input-group-btn">
						<button class="btn btn-default" type="button"><i class="glyphicon glyphicon-search"></i></button>
					  </span>
					</div>
				</div>
				
				<div class="col-md-2">
					<div class="form-group">
						<select class="form-control">
							<option>Category</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
						</select>
					</div>
				</div>
				
				<div class="col-md-2">
					<div class="form-group">
						<select class="form-control">
							<option>Sort</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
						</select>
					</div>
				</div>
				
			</div>
		
            <div class="row" style="margin-top:20px;">
                <?php 
						require("job/View/rent_list.php");
				?>     
            </div>

        </div>

    </div>	
			
</div>					
	
<?php require_once($globe->g_footer()); ?>
</body>

</html>

<script>

$(document).ready(function(){

//NEW WINDOW	
	$(".jobtab").click(function(){ 
		var jobview = $(this).attr("id");
		
		window.open("View/job.php?jobID="+ jobview,"", "width=550, height=600");
	});
	
	
//UNAPPLY	
	$(".btn-unapply").click(function(){ 
		var jobID = $(this).val();
		
		alert(jobID);
		
		$.post('Controller/job_unapply.php', {
			id:jobID
		}, function(data,status){
		alert(data);
		});
	});
	
//REMOVAL	
	$(".btn-remove").click(function(){ 
	alert("haha");
		var jobID = $(this).val();

		$.post('Controller/job_remove.php', {
			id:jobID
		}, function(data,status){
alert(data);
		});
	});
	
});

</script>