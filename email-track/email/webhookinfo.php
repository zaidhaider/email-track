<?php
require_once 'debug/piyush/web/mandrill-api-php/src/Mandrill.php';

try {
        $mandrill = new Mandrill('9RylIxNTRMPpJDxVIzlzsQ');
        $result = $mandrill->webhooks->getList();
        $msg .= '<table>';
        foreach ($result as $key => $value) 
        {   
            $msg .= '<tr><td>id</td><td>'.$value['id'].'</td></tr>';
            $msg .= '<tr><td>url</td><td>'.$value['url'].'</td></tr>';
            $msg .= '<tr><td>description</td><td>'.$value['description'].'</td></tr>';
            $msg .= '<tr><td>created_at</td><td>'.$value['created_at'].'</td></tr>';
            $msg .= '<tr><td>last_sent_at</td><td>'.$value['last_sent_at'].'</td></tr>';
            $msg .= '<tr><td>batches_sent</td><td>'.$value['batches_sent'].'</td></tr>';
            $msg .= '<tr><td>events_sent</td><td>'.$value['events_sent'].'</td></tr>';
            $msg .= '<tr><td>auth_key</td><td>'.$value['auth_key'].'</td></tr>';
            $msg .= '<tr><td>send</td><td>'.$value['events'][0].'</td></tr>';
            $msg .= '<tr><td>hard_bounce</td><td>'.$value['events'][1].'</td></tr>';
            $msg .= '<tr><td>soft_bounce</td><td>'.$value['events'][2].'</td></tr>';
            $msg .= '<tr><td>open</td><td>'.$value['events'][3].'</td></tr>';
            print_r($value);
        }
        $msg .= '</table>';
        
        $message = array(
        /* 'html' => '<h3> This mail is from webhook <br>
        It informs about whether a mail is sent or bounced or opened</h3>;',*/
        'html'=>$msg,
        'text' => '$result',
        'subject' => '$result',
        'from_email' => 'zaid@rankwatch.com',
        'from_name' => 'The GodFather',
        'to' => array(
        array(
        'email' => 'zaidhaider9@gmail.com',
        'name' => 'Recipient zaid',
        'type' => 'to'
        )
        ),
        'headers' => array('Reply-To' => 'message.reply@example.com'),
        'important' => true,
        'track_opens' => true,
        'track_clicks' => true,
        'auto_text' => null,
        'auto_html' => null,
        'inline_css' => null,
        'url_strip_qs' => null,
        'preserve_recipients' => true,
        'view_content_link' => null,
        'bcc_address' => 'piyush.kamalpiyush@gmail.com',
        'tracking_domain' => null,
        'signing_domain' => null,
        'return_path_domain' => null,
        'merge' => true,
        'merge_language' => 'mailchimp',
        'global_merge_vars' => array(
        array(
        'name' => 'merge1',
        'content' => 'merge1 content'
        )
        ),
        'tags' => array('open/bounce')

        );


    } catch(Mandrill_Error $e) {
    // Mandrill errors are thrown as exceptions
    echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
    // A mandrill error occurred: Mandrill_Invalid_Key - Invalid API key
    throw $e;
}
?>