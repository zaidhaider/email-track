
<?php
$db_host="localhost";
$db_user="rankzaid";
$db_pass="zaid1234";
$db_name="zaid_dashboard";
try
{
	$conn= mysqli_connect($db_host,$db_user,$db_pass,$db_name);
	if($conn)
	{}
	else 
	{	
		$file= file_put_contents('debug/piyush/web/dataUnsub.json', "connection could not be established",FILE_APPEND);
	} 
}
catch(exception $e)
{
	echo "connection could not be established";
}
function errorLog( $msg)
{   
    file_put_contents('debug/piyush/web/log.txt', $msg);
}
error_reporting(E_ALL);


?>
