<?php

include("webhook_index.php");
$file= file_put_contents('debug/piyush/web/dataUnsub.json', $_POST,FILE_APPEND);
if($file)
{
    require_once 'debug/piyush/web/mandrill-api-php/src/Mandrill.php';
    $mandrill = new Mandrill('WjAeRV30FIAIqOP2R1SMPQ');

    $json = stripslashes($_POST['mandrill_events']);
    var_dump($json);
    $jsondata = json_decode($json,true);
    var_dump($jsondata);

    $subject = $jsondata['event'];
    $msg = "STRIPSLASHES: ".$json."----JSONDATA----".$jsondata;
    //$posts = @file_get_contents("php://input");
    //$result= json_decode($posts,true);
    $_events=$jsondata[0]['event'];
    $_tags=$jsondata[0]['msg']['tags'][0];
    $_opened=$jsondata[0]['msg']['opens'];
    $_clicked=$jsondata[0]['msg']['clicks'];
    $_id=$jsondata[0]['_id'];
    $_email=$jsondata[0]['msg']['email'];
    $_state=$jsondata[0]['msg']['state'];
    $_date=$jsondata[0]['msg']['ts'];
    $new_msg="events=" .$_events. ",tags=" .$_tags. ",opened=" .$_opened . ",clicked=" .$_clicked. ",id="  .$_id . ",email=" .$_email. ",state=" .$_state . ",date=" .$_date;

    try
    {
        $sql_initial="SELECT _email FROM taginfos WHERE _id='".$_id."'";
    //    error_log("SELECT _email FROM taginfos WHERE _id='".$_id."'");
    }
    catch(exception $e)
    {
        $error_list[]="connection failed";
    }
    $query=mysqli_query($conn,$sql_initial);
    $row_count=mysqli_num_rows($query);
    
    if($row_count==0)
    {

         try
        {
            $sql_final="INSERT INTO taginfos (_id,_tags,_email,open_rate,click_rate,_events,_state,_date) VALUES('".$_id."','".$_tags."','".$_email."','".$_opened."','".$_clicked."','".$_events."','".$_state."',NOW())";

        //    errorLog("INSERT INTO taginfos (_id,_tags,_email,open_rate,click_rate,_events,_state,_versions,_date) VALUES('".$_id."','".$_tags."','".$_email."','".$_opened."','".$_clicked."','".$_events."','".$_state."','".$version1."',NOW())");

            $query=mysqli_query($conn,$sql_final);
        }
        catch(exception $e)
        {
            errorLog($e->getMessage());
        }
    } 
    else
    { 
        try
        {
            $sql_final="UPDATE taginfos SET (open_rate,click_rate,_events,_state,_date) VALUES ('".$_opened."','".$_clicked."','".$_events."','".$_state."',NOW()) WHERE _id= '".$_id."')";
            $query=mysqli_query($conn,$sql_final);
        //    errorLog("UPDATE taginfos SET (_id,_tags,_email,open_rate,click_rate,_events,_state,_date,_versions) VALUES('".$_id."','".$_tags."','".$_email."','".$_opened."','".$_clicked."','".$_events."','".$_state."',NOW(),'".$version2."') WHERE _id= '".$_id."')");
            $query=mysqli_query($conn,$sql_final);
        }
        catch(exception $e)
        {
            $error_list[]="woaah.. seems database just rejected the entry!!";
        //    errorLog($e->getMessage());
        }     
    }   
        


}
else print 0;
exit;

