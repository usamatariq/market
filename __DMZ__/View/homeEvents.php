<?php 
	require_once $globe->g_root() . '/Model/Event.php';
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
				<div style="border-bottom:1px solid #c0c0c0;padding:5px 5px 5px 5px;">
					
						<table>
						<tbody>
							<tr>
								<td style="width:25%;"><b>'. $field['event_title'] . '</b></td>
								<td>' . $field['event_startdate'] . ' </td>
							</tr>
						</tbody>
						</table>
			
				</div>
			';
		}
	}
?>			
