
<?php


$db_host="localhost";
$db_user="root";
$db_pass="";
$db_name="dash_board";

$db_host2="local.rankwatch.com";
$db_user2="rwlocal";
$db_pass2="rwlocal@123!";
$db_name2="zaid_dashboard";

try
{
	$conn= mysqli_connect($db_host,$db_user,$db_pass,$db_name);
	$conn2= mysqli_connect($db_host2,$db_user2,$db_pass2,$db_name2);
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
error_reporting(E_ALL);


?>
