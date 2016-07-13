<!-- Nav Fixed Bar-->
<div class="navbar navbar-default navbar-fixed-top" style="background-color:#fff">
      <div class="container">
	  <div class=" col-md-12 col-md-offset-0">
        <div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
          <a class="navbar-brand" href="/market/home.php"><img class="logo-nav">Market</a>
        </div>
        
		<div class="navbar-collapse collapse " >
			

			<ul class="nav navbar-nav navbar-right">		
				<li><a href="inbox.php" 	class="glyphicon glyphicon-envelope" aria-hidden="true"></a></li>
				<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['userID'] ?> <b class="caret"></b></a>
					<ul class="dropdown-menu">	
						
						<li><a href="/market/edit.php">Account</a></li>
						<li><a href="/market/PROFILE/View/profile.php">View Portfolio</a></li>
						<li><a href="/market/edit.php">Edit Portfolio</a></li>
						<li><a href="#">Help</a></li>
						<li class="divider"></li>
						<li><a href="/market/ACCOUNT/Controller/account_logout.php">Logout</a></li>
					</ul>
				</li>
				<li><button id="jobpost" class="btn btn-danger" style="margin-top:8px;" data-toggle="modal" data-target="#postjob" onclick="setFormSubmitting()">Rent</button></li>
				
				<form class="navbar-form navbar-right hidden">
					<div class="form-group">
					  <input type="text" placeholder="Search" class="form-control">
					</div>
					<button type="submit" class="btn btn-success">
						<span class="glyphicon glyphicon-search"></span>
					</button>
				</form>
			</ul>
			  

        </div>
		</div>
      </div>
    </div>
