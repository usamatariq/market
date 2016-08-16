<?php 	
	require $globe->g_root() . '/PROFILE/Model/Profile.php';
	$profile = new Profile();
	$i=0 ;
	$result = $profile->getProfile($_SESSION['userID']);
	$field = $result[$i];

// CONVERT DATE FORMAT	
	$dob = date_create($field['profile_dob']);
	$dob = date_format($dob, 'd-m-Y');
?>

	<thead>
		<tr>
          <th style="width:30%;">Profile</th>
          <th></th>
        </tr>
	</thead>
	<tbody>
		
	<?php	echo '
			
			
			<tr>
            <td>Birth Date</td>
			<td><input id="date" name="dob" type="text" value="'. $dob .'" class="form-control"></td>
			</tr>
			
			
			
			<tr>
			<td>Mobile</td>
			<td><input name="mobile" class="form-control" type="text" value="'. $field['profile_mobile'] .'" ></td>
			</tr>
			
			<tr>
			<td>Country</td>
			<td>
				<select name="country" class="form-control" value="'. $field['profile_country'] .'" ></select>
			</td>
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
				<td><button type="submit" class="btn btn-default">Save Changes
				</button></td>
			</tr>
			</form>
			
			';
?>
	<tr><td>
		<form action="/market/account/Controller/upload.php" method="post" enctype="multipart/form-data">
				Select image to upload:
				<input type="file" name="fileToUpload" id="fileToUpload">
				<input type="submit" name="submit" value="Upload Image" >
		</form>
		</td>
	</tr>

</tbody>

