<?php 	
	require_once $globe->g_root() . '/ACCOUNT/Model/Account.php';
	$account = new Account();
	
	$account->retriveAccount($_SESSION['userID']);
	$firstname = $account->getFirstName();
	$lastname = $account->getLastName();
	$email = $account->getEmail();

?>
		
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
