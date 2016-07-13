<?php 
	require_once $globe->g_root() . '/Model/Message.php';
	$message = new Message();
	
	$usernameArr = $_SESSION['userID'];
	$messagesArr = $message->getUserMessages($usernameArr);
	$messagesArr = array_reverse($messagesArr);
	
	$numMessages= count($messagesArr);
	$pageMessages=ceil($numMessages/5);

	echo'
	<div class="panel panel-default" style="border:none;padding:0px;">
		<div class="panel-body" style="background-color: #f8f8f8;border:none;padding:0px;">
	
	';
	
	echo '
			<ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
			';
	for($j=1 ; $j<=$pageMessages ; $j++) 
	{		
		if ($j == 1)
		{	echo'
				<li class="active">	<a href="#'.$j.'" data-toggle="tab">'.$j.'	</a></li>
				';
		}	else	{
				echo'
					<li class="">	<a href="#'.$j.'" data-toggle="tab">'.$j.'	</a></li>
					';
					}
	}
			echo'

			</ul>
			
			<div id="my-tab-content" class="tab-content padding-none margin-none">
	';
	
	if($numMessages == 0 ) {
		echo "There are no messages";
	}

	else {
	
	for($k=1 ; $k<=$pageMessages ; $k++) 
	{	if ($k==1)
		{	
		echo '<div class="tab-pane active" id="'.$k.'" >
		<div class="panel-body">
		';
		//echo($k);
		} else {
					echo '
					<div class="tab-pane" id="'.$k.'" >
						<div class="panel-body">
					';
					//echo($k);
				}
				
		for($i=(5*($k-1)); $i<=min((5*$k-1),($numMessages-1)) ; $i++) 
		{
			$field = $messagesArr[$i];
				//echo($k);
				//echo($i);
				
				echo '
					<div class="panel panel-default panel-body">
						From: ' .$field['message_from_id'] . ' <br />
						Subject: ' .$field['message_subject'] . ' <br />
						Message: ' .$field['message_text'] . ' <br />
						Date: '.$field['message_datetime'].'<br/>
					</div>
					';
		}
		
		echo '
		</div>
	</div>
	';
				
	}
		
	
	
	}
	
	echo'
	</div>
				
			</div>
			</div>
	';
	
	
?>	