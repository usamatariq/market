<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/market/COMMON/Globe.php";
	$globe = new Globe();
?>

<?php
$target_dir = $globe->g_root() . "/uploads/";;
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

// FILE VALIDITY
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        header("Location: /market/account/index.php?response=File is an image - " . $check["mime"] . ".");
        $uploadOk = 1;
    } else {
		header("Location: /market/account/index.php?response=File is not an image.");
        $uploadOk = 0;
    }
}
// FILE EXISTENCE
if (file_exists($target_file)) {
	header("Location: /market/account/index.php?response=Sorry, file already exists.");
    $uploadOk = 0;
}
// FILE SIZE
if ($_FILES["fileToUpload"]["size"] > 500000) {
    header("Location: /market/account/index.php?response=Sorry, your file is too large.");
    $uploadOk = 0;
}
// FILE FORMAT
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    header("Location: /market/account/index.php?response=Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
    $uploadOk = 0;
}
// FILE UPLOAD
if ($uploadOk == 0) {
    header("Location: /market/account/index.php?response=Sorry, your file was not uploaded.");

// UPLOAD FILE
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        header("Location: /market/account/index.php?response=The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.");

    } else {
		header("Location: /market/account/index.php?response=Sorry, there was an error uploading your file.");
  
    }
}

//switch($result) {
//	case EMAILVERIFIER::SUCCESS:
//		echo "congratzzzz.";
//		header("Location: /market/verify.php?response=success");
//		break;
//	case EMAILVERIFIER::CODE_INVALID:
//		header("Location: /market/verify.php?response=code_invalid");
//		break;
//	default:
//		header("Location: /market/verify.php?response=error"); // SORRY =(
//		break;

?>