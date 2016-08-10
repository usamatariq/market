<?php	
	require_once $globe->g_root() . '/ACCOUNT/Model/Account.php';
	$account = new Account();
	
	$account->retriveAccount($_SESSION['userID']);
	$firstname = $account->getFirstName();
	$email = $account->getEmail();
?>

<!-- Nav Fixed Bar-->
<div class="navbar navbar-default navbar-fixed-top" style="background-color:#fff">
    <div class="container">
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
				<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown">
				<?php 
				echo $firstname;
				?> <b class="caret"></b></a>
					<ul class="dropdown-menu">	
						<li><a href="/market/profile/View/profile.php">Profile</a></li>
						<li><a href="/market/inbox.php">Inbox</a></li>
						<li class="divider"></li>
						<li><a href="/market/account">Account Setting</a></li>						
						<li><a href="#">Help</a></li>
						<li><a href="/market/account/Controller/account_logout.php">Logout</a></li>
					</ul>
				</li>
				<li><button id="post" class="btn btn-danger" style="" data-toggle="modal" data-target="#modalpost" onclick="setFormSubmitting()">Post</button></li>
				
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
	
<?php require $globe->g_root() . '/job/View/modal_post.php'; ?>
