<?php

    // Create the mysql backup file
    // edit this section
    
    // include("config_host_sv.php");
    
    $dbhost = "localhost";
    $dbname = "benderao_web";
    $dbuser = "benderao_user";
    $dbpass = "x#KOm,2!*+Si";
    
    $sendto = "Webmaster <dineromail.bao@gmail.com>";
    $sendfrom = "Automated Backup <backup@bender-online.com.ar>";
    $sendsubject = "Daily Mysql Backup";
    $bodyofemail = "Daily backup.";
    // don't need to edit below this section
    
    $backupfile = $dbname . date("Y-m-d") . '.sql';
    system("mysqldump -h $dbhost -u $dbuser -p$dbpass $dbname > $backupfile");
    
    // Mail the file
    include( 'Mail.php' );
    include( 'Mail/mime.php' );
    
    $message = new Mail_mime();
    $text = "$bodyofemail";
    $message->setTXTBody( $text );
    $message->AddAttachment( $backupfile );
    $body = $message->get();
    $extraheaders = array( "From"=> $sendfrom, "Subject"=> $sendsubject );
    $headers = $message->headers( $extraheaders );
    $mail = Mail::factory( "mail" ); //"mail"
    $mail->send( $sendto, $headers, $body );
    
    // Delete the file from your server
    unlink($backupfile);

?>