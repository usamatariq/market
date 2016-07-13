<?php 
	require $globe->g_root() . '/PROFILE/Model/Profile.php';
	$profile = new Profile();
	$i=0 ;
	$result = $profile->getProfile($_SESSION['userID']);
	$field = $result[$i];
		echo '
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
			<td><input type	="date" value="'. $field['profile_dob'] .'" class="form-control"></td>
			</tr>
			
			<tr>
			<td>Photo</td>
			<td><img src="../img/img_rounded.png" alt="..." class="img-rounded">
			<input type="file" id="exampleInputFile" style="padding:5px;">
			<p class="help-block">Example block-level help text here.</p></td>
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
			<td><input type	="text" value="'. $field['profile_mobile'] .'" orclass="form-control"></td>
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