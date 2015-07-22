<?php


date_default_timezone_set('America/Montreal');

if (date_default_timezone_get())
{
    echo 'date_default_timezone_set: ' . date_default_timezone_get() . '<br />';
}
    try 
    {   include("webhook_index.php");
        require_once 'debug/piyush/web/mandrill-api-php/src/Mandrill.php';
        $mandrill = new Mandrill('W5A15EId9BA5K0KCCx_FCA');
        $result = $mandrill->tags->getList();
        foreach ($result as $key => $value) 
        {   
            $version = $mandrill->tags->info($value['tag']);

            //var_dump($version); echo "yasddszzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzz";
            $_tagname= $version['tag'];
            if($_tagname)
            {   
                try // For checking whether the tag exists in tags table
                {
                    $sql_taginitial="SELECT tag_name FROM tags WHERE tag_name='".$_tagname."'";
                }
                catch(exception $e)
                {
                    $error_list[]="connection failed";
                }
                $query_tag=mysqli_query($conn,$sql_taginitial) or die(mysqli_error($conn));
                $tag_row= mysqli_fetch_array($query_tag);
                
                    
                if(count($tag_row)==0)
                {
                    try
                    {
                        $sql_tag="INSERT INTO tags (tag_name) VALUES ('".$_tagname."')";
                    }
                    catch(exception $e)
                    {
                        $error_list[]="connection failed";
                    }
                    $query=mysqli_query($conn,$sql_tag) or die(mysqli_error($conn));
                    $last_id = mysqli_insert_id($conn);

                }
                else //wrote this as mysqli_insert becomes zero if no insert/update query
                {
                    try
                    {
                        $sql_tagid="SELECT _id FROM tags WHERE tag_name='".$_tagname."'";
                    }
                    catch(exception $e)
                    {
                        $error_list[]="connection failed";
                    }
                    $query_tagid=mysqli_query($conn,$sql_tagid) or die(mysqli_error($conn));
                    $tag_row= mysqli_fetch_array($query_tagid);
                    $last_id= $tag_row['_id'];

                }
                
                $_sent =    $version['stats']['today']['sent'];
                $_opens =   $version['stats']['today']['opens'];
                $_hardbounces =     $version['stats']['today']['hard_bounces'];
                $_softbounces =     $version['stats']['today']['soft_bounces'];
                $_clicks =  $version['stats']['today']['clicks'];
                $_rejects =     $version['stats']['today']['rejects'];
                $_unsub =   $version['stats']['today']['unsubs'];
                $_complaints =  $version['stats']['today']['complaints'];
                $_uniqueOpens =     $version['stats']['today']['unique_opens'];
                $_uniqueClicks =    $version['stats']['today']['unique_clicks'];


                try // code for updating tag stats if webhook is ran on the same day
                {   
                    $sql_initial="SELECT _date FROM tagdetails WHERE tag_id='".$last_id."' ORDER BY _date DESC"; 
                    // for getting dates comparis
                }
                catch(exception $e)
                {
                    $error_list[]="connection failed";
                }
                
                $query=mysqli_query($conn,$sql_initial) or die(mysqli_error($conn));
                $row= mysqli_fetch_assoc($query);
                $db_date= $row["_date"];
                //echo $db_date;
                //echo "zaidhaider67576567567567576567576";
                //print_r($y);die;
                $db_date= date("Y/m/d", strtotime($db_date));
                //print_r($date);die;
                print_r($db_date);
                //echo "shjghdjghjgdhjsgahjgdfhjsaghfcg";
                $present_date= date("Y/m/d");
                //echo "shjghdjghjgdhjsgahjgdfhjsaghfcg";
                print_r($present_date);

                //$splitdate = ;

                if( $db_date == $present_date)
                {   

                     try
                    {   
                        

                        $sql_final="UPDATE tagdetails SET sent ='".$_sent."',opens = '".$_opens."', hard_bounces= '".$_hardbounces."', clicks= '".$_clicks."', rejects= '".$_rejects."',unsubs='".$_unsub."',complaints = '".$_complaints."' ,unique_open= '".$_uniqueOpens."',unique_click= '".$_uniqueClicks."', soft_bounces= '".$_softbounces."',last_updated=NOW() WHERE _date = '".$row["_date"]."'";
                        
                            $query=mysqli_query($conn,$sql_final)  or die(mysqli_error($conn));
                            echo $sql_final;

                
                    }
                    catch(exception $e)
                    {
                        $error_list[]="woaah.. seems database just rejected the entry!!";
                                //    errorLog($e->getMessage());
                    }     
                }
                
                else
                {    
                    try // code for insertion of new query where tag_id is extracted from tags table
                    {   

                        $sql_final="INSERT INTO tagdetails (tag_id,sent,opens,hard_bounces,clicks,rejects,unsubs,complaints,unique_open,unique_click,soft_bounces,_date) VALUES ('".$last_id."','".$_sent."','".$_opens."','".$_hardbounces."','".$_clicks."','".$_rejects."','".$_unsub."','".$_complaints."','".$_uniqueOpens."','".$_uniqueClicks."','".$_softbounces."',NOW())";
                           echo($sql_final);
                    }
                    catch(exception $e)
                    {
                        errorLog($e->getMessage());
                    }
                
                    mysqli_query($conn,$sql_final)  or die(mysqli_error($conn));
                    
                    
                }
            } 
        }
            
    }
    catch(Mandrill_Error $e)
    {
        // Mandrill errors are thrown as exceptions
        echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
        // A mandrill error occurred: Mandrill_Invalid_Key - Invalid API key
        throw $e;
    }
    
?>