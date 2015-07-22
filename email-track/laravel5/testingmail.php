<?php
require_once 'mandrill-api-php/src/Mandrill.php'; //Not required with Composer
try {
    $mandrill = new Mandrill('W5A15EId9BA5K0KCCx_FCA');
    $result = $mandrill->tags->getList();
    print_r($result);
    die;
    $message = array(
        'html' => '<p>Survey Testing  visit http://pmindia.gov.in/en/ </p>',
        'text' => 'Hello , How are you??',
        'subject' => 'Hi fellow Indians, make your country stronger by contributing your suggestions and ideas!',
        'from_email' => 'ggoyal19@gmail.com',
        'from_name' => 'P',
        'to' => array(
          
              array(
                'email' => 'zaid@rankwatch.com',
                'name' => 'Indians',
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
        'bcc_address' => 'piyuch.kamalpiyush@gmail.com',
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
        'attachments' => array(
            array(
                'type' => 'application/pdf',
                'name' => 'test.pdf'
            )
        ),
        'tags' => array('tag_hdfc')
        
    );
    //$async = false;
   // $ip_pool = 'Main Pool';
   // $send_at = 'example send_at';
    $result = $mandrill->messages->send($message);//, $async, $ip_pool, $send_at);
    print_r($result);
    /*
    Array
    (
        [0] => Array
            (
                [email] => recipient.email@example.com
                [status] => sent
                [reject_reason] => hard-bounce
                [_id] => abc123abc123abc123abc123abc123
            )
    
    )
    */
} catch(Mandrill_Error $e) {
    // Mandrill errors are thrown as exceptions
    echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();

    // A mandrill error occurred: Mandrill_Unknown_Subaccount - No subaccount exists with the id 'customer-123'
    throw $e;
}
?>