<?php

	if($_POST){

        /*
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
            //send email
            mail("info@swiss-solutions.ag", "This is an email from:" .$email, $message);
        }
        */

        $output         = isset($_POST['output'])   ? $_POST['output']  : 'json';


        $name           = isset($_POST['name'])     ? $_POST['name']    : 'Not Defined' ;
        // $phone          = isset($_POST['phone'])    ? $_POST['phone']   : 'Not Defined' ;
        $email          = isset($_POST['email'])    ? $_POST['email']   : 'Not Defined' ;
        // $subject        = isset($_POST['subject'])  ? $_POST['subject'] : 'Not Defined' ;
        $message        = isset($_POST['message']) ? $_POST['message'] : 'Not Defined';


        // mail paramaters.
        $params           = (object) $_POST;

        $destination_base ="swiss-solutions.ag";
        $destination      ="info@swiss-solutions.ag";


        $mail_subjet      ="SS.AG: Konkakt From ";


        $debug_mail       = "info@swiss-solutions.ag";
        $charset          = 'utf-8';

      $headers          =
              'From: webmaster@'. $destination_base . "\r\n" .
              'Reply-To: webmaster@'. $destination_base . "\r\n" .
              'Cc: aserron.dev@gmail.com'         . "\r\n" .
              'MIME-Version:'  . '1.0'        . "\r\n" .

              // 'Content-type:'  . 'text/html'  . "\r\n" .
              'Content-type: text/html; charset=utf-8' . "\r\n" .

              'X-Mailer: PHP/' . phpversion() . "\r\n" ;


      $body           ="Name: $name\n";
      // $body          .="Phone: $phone\n";
      $body          .="Email: $email\n";
      // $body          .="Subject: $subject\n";
      $body          .="Message: $message\n";

      $html_message = '
          <html>
          <head>
          <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
          <title>Kontakt Form Message</title>
          </head>
          <body>
          <p>'. '<pre>' . $body . '</pre>'.'</p>'.
          '</body>
          </html>
          ';

      // debug
      // $destination = "aserron@gmail.com";

      $body = $html_message;

      mail($destination,$mail_subjet,$body, $headers);

      if($output=="json"){

          $o = (object)[
              'success'=> true,
              'msg'    => "Form Submited Successfully",
              'params' => $params
          ];

          header('Content-Type: application/json');
          echo(json_encode($o));
          exit;

      } else {

          print("<h2>Debug Output</h2>");
          print("<pre>");
          print_r($_POST);
          print("<hr><hr>");
          print_r($headers);
          print("</pre>");

      };
    };


?>
