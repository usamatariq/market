<?php 
	require $globe->g_root() . '/Model/Event.php';
	$event = new Event();
	$result = $event->getAllEvents();

	$numEvents = count($result);

	if($numEvents == 0 ) {
		echo "There are no events";
	}

	else {
		for($i=($numEvents-1) ; $i>=0 ; $i--) {
			$field = $result[$i];

			echo '
				<div class="panel panel-default">
					<img border="0" src="' . $field['event_image'] . '" width="100%">
					<div class="panel-heading panel-joblist">
						' . $field['event_title'] . '
					</div>
					
					<div class="panel-collapse panel-body">
						<table class="content-job">
						<tbody>
							<tr>
								<td>' . $field['event_startdate'] . ' </td>
							</tr>
							<tr>
								<td>' . $field['event_description'] . '</td>
							</tr>
						</tbody>
						</table>
					</div>

					<div style="margin:15px;">
						<form action="view/eventPage.php" method="post">
							<input type="hidden" name="event_id" value="' . $field['event_id'] . '">
							<button type="submit" class="btn btn-success">View Event</button>
						</form> 
					</div>
				</div>
			';
		}
	}
?>			
