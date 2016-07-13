<?php 

$db_username = 'danceseen';
$db_password = '12345';
$db_name = 'danceseen';
$db_host = 'localhost';

session_start();
require $_SERVER["DOCUMENT_ROOT"] . "/danceseen/Globe.php";
$globe = new Globe();
require $globe->g_root() . "/Model/Account.php";
    
	$account = new Account();

if(isset($_POST["loginEmail"]))
{
    //check if its an ajax request, exit if not
    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        die();
    }   
	
	//$loginEmail = $_POST["loginEmail"];
	//$loginPassword = $_POST["loginPassword"];
	
	//$userID = $account->authenticate($loginEmail, $loginPassword);
	
        //try connect to db
    $connecDB = mysqli_connect($db_host, $db_username	, $db_password,$db_name)or die('could not connect to database');
    
    //trim and lowercase username
    $email =  strtolower(trim($_POST["loginEmail"])); 
    
    //sanitize username
    $email = filter_var($email, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);
    
    //check username in db
    $results = mysqli_query($connecDB,"SELECT account_email  FROM account WHERE account_email='$email'");
    
    //return total count
    $email_exist = mysqli_num_rows($results); //total records

	//if value is more than 0, username is not available
    if($email_exist) {
        echo "1";
    } 
	
	
	
    

    mysqli_close($connecDB);
}
?>