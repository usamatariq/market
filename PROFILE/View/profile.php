<?php 	
	require $globe->g_root() . '/PROFILE/Model/Profile.php';
	$profile = new Profile();
	$i=0 ;
	$result = $profile->getProfile($_SESSION['userID']);
	$field = $result[$i];

// CONVERT DATE FORMAT	
	$dob = date_create($field['profile_dob']);
	$dob = date_format($dob, 'd/m/Y');
?>
<!DOCTYPE html>
<html>
<head>
	<title>market - Jobs</title>
	<?php
		require_once($globe->g_head());
		require_once($globe->g_userHeader());
	?>
</head>
<body>


<div class="container">
	<?php	echo '
			<tr>
            <td>First Name</td>
			<td><input type	="text" value="'. $field['profile_firstName'] .'" class="form-control"></td>
			</tr>
			
			<tr>
            <td>Last Name</td>
			<td><input type	="text" value="'. $field['profile_lastName'] .'" class="form-control"></td>
			</tr>
			
			<tr>
            <td>Birth Date</td>
			<td><input id="birthdate" type="text" value="'. $dob .'" class="form-control"></td>
			</tr>
			
			<tr>
			<td>Gender</td>
			<td><input name="gender" type="radio" value="male" checked>
                <span>Male</span>
				<input name="gender" type="radio" value="female">
                <span>Female</span>
				</td>
			</tr>
			
			<tr>
			<td>Mobile</td>
			<td><input type	="text" value="'. $field['profile_mobile'] .'" class="form-control"></td>
			</tr>
			
			<tr>
			<td>Country</td>
			<td>
				<select class="form-control" value="'. $field['profile_country'] .'" name="country" id="country" onload="changeSelect();"></select>
			</td>
			</tr>
			
			<tr><td><button type="submit" class="btn btn-default">Save Changes
			</button></td></tr>
			';
?>

	</div>
</div>
	
</body>

</html>