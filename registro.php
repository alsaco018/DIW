<!DOCTYPE html>
<html lang="es" >
<head>
  <meta charset="UTF-8">
  <title>Animated text fill</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Neuton|Oswald'>
<link rel="stylesheet" href="assets/css/signUp.css"><script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>
<body>
<!-- partial:index.partial.html -->
<p>
  Has sido dado de alta
  <span>
    Revisa tu correo
  </span>
  &mdash; y confirma tu cuenta de usuario &mdash;
</p>
<!-- partial -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <?php
    
            use PHPMailer\PHPMailer\PHPMailer;
            use PHPMailer\PHPMailer\Exception;
        
        /* Exception class. */
        require 'PHPMailer/src/Exception.php';
        
        /* The main PHPMailer class. */
        require 'PHPMailer/src/PHPMailer.php';
        
        /* SMTP class, needed if you want to use SMTP. */
        require 'PHPMailer/src/SMTP.php';
        
        $mailer = new PHPMailer(TRUE);
        
        /* $servername = "sql104.phpzilla.net";
         $username = "phpz_24535379";
         $password = "colossusmark45";
         $dbname = "phpz_24535379_diw";
         
         // Create connection
         
         //echo $servername;echo "<br>";
         //echo $username;echo "<br>";
         //echo $dbname;echo "<br>";
          //establecemos la conexion con la BD
         $conexion = mysqli_connect($servername, $username, $password, $dbname) or
             die("Connection failed: ");
         //valores recibidos del formulario
    
         $nick = $_REQUEST['user'];
         $email = $_REQUEST['email'];
         $pass = $_REQUEST['pass'];

         $token = Time();

         //hasheo de la clave
         $passHash = hash('md5', $pass);
         //echo $passHash;
        $sql = "INSERT INTO usuarios(Usuario_nick, Usuario_clave, Usuario_email, Usuario_token_aleatorio) VALUES ('$nick','$passHash','$email','$token')";
         //password_hash($password, PASSWORD_DEFAULT);
         mysqli_query($conexion,$sql)
         or die("Problemas en el insert".mysqli_error($conexion));
         mysqli_close($conexion);
        */
         try {
          /* Set the mail sender. */
          $mailer->setFrom('albertosaldanadiw@gmail.com', 'Alberto');
       
          /* Add a recipient. */
          $mailer->addAddress('alsaco182115@gmail.com', 'Usuario');
       
          /* Set the subject. */
          $mailer->Subject = 'Force';
       
          /* Set the mail message body. */
          $mailer->Body = 'There is a great disturbance in the Force.';

          $mailer->isSMTP();
          $mailer->Host = 'smtp.gmail.com';
          $mailer->Port = 587;
          $mailer->SMTPAuth = true;
          $mailer->SMTPSecure = 'tls';

          /* Username (email address). */
          $mailer->Username = 'albertosaldanadiw@gmail.com';

          /* Google account password. */
          $mailer->Password = 'colossusmark45';
                
          /* Finally send the mail. */
          $mailer->send();
       }
       catch (Exception $e)
       {
          /* PHPMailer exception. */
         echo $e->errorMessage();
       }
       catch (\Exception $e)
       {
          /* PHP exception (note the backslash to select the global namespace Exception class). */
          echo $e->getMessage();
       }
//Import PHPMailer classes into the global namespace
/*

//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// SMTP::DEBUG_OFF = off (for production use)
// SMTP::DEBUG_CLIENT = client messages
// SMTP::DEBUG_SERVER = client and server messages
//$mail->SMTPDebug = SMTP::DEBUG_SERVER;
//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;
//Set the encryption mechanism to use - STARTTLS or SMTPS
//$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "albertosaldanadiw@gmail.com";
//Password to use for SMTP authentication
$mail->Password = "colossusmark45";
//Set who the message is to be sent from
$mail->setFrom('albertosaldanadiw@gmail.com', 'First Last');
//Set an alternative reply-to address
//$mail->addReplyTo('replyto@example.com', 'First Last');
//Set who the message is to be sent to
$mail->addAddress('alsaco182115@gmail.com', 'John Doe');
//Set the subject line
$mail->Subject = 'PHPMailer GMail SMTP test';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), __DIR__);
//Replace the plain text body with one created manually
//$mail->AltBody = 'This is a plain-text message body';
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');
//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
    //Section 2: IMAP
    //Uncomment these to save your message in the 'Sent Mail' folder.
    #if (save_mail($mail)) {
    #    echo "Message saved!";
    #}
}


       
        /*$from = "albertosaldanadiw@gmail.com";
        $to = "alsaco182115@gmail.com"; //email al que enviamos el correo
        //$from = $email; //
        //$to = $_REQUEST['email'];
        $subject = "Registro";
       
        $message = $nick . " Has sido dado de alta en nuestra web:";
        

        $headers = "From:" . $to;
        $headers2 = "From:" . $to;
        mail($to,$subject,$message,$headers);
        //$envio2 = mail($from,$subject,$message); // sends a copy of the message to the sender
        
        // You can also use header('Location: thank_you.php'); to redirect to another page.
    */
    

    ?>



</body>
</html>