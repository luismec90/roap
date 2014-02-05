<html>
    <head>
        <title>PHPMailer - SMTP advanced test with authentication</title>
    </head>
    <body>

        <?php
        require_once('../class.phpmailer.php');
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

        $intentos = 0;
        $sended = false;
        while ($intentos <= 3) {
            $mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch
            $mail->IsSMTP(); // telling the class to use SMTP

            try {
                $mail->Host = "localhost"; // SMTP server
                $mail->SMTPDebug = 2;                     // enables SMTP debug information (for testing)
                $mail->SMTPAuth = true;                  // enable SMTP authentication
                $mail->Host = "unmtaout.unal.edu.co"; // sets the SMTP server
                $mail->Port = 25;                    // set the SMTP port for the GMAIL server
                $mail->Username = "roap_med@unal.edu.co"; // SMTP account username
                $mail->Password = "r8160400";        // SMTP account password
                $mail->AddReplyTo('roap_med@unal.edu.co', 'Roap UNAL');
                $mail->AddAddress($email, "$name $lastname");
                $mail->SetFrom('roap_med@unal.edu.co', 'Roap UNAL');
                $mail->Subject = $asunto;
                $mail->MsgHTML($texto);
                $mail->AddAttachment('images/logo.png');      // attachment
                //  $mail->AddAttachment('images/phpmailer_mini.gif'); // attachment
                $mail->Send();
                echo "Message Sent OK</p>\n";
                if ($data['mode'] == 'registro') {
                    $password = sha1($password);
                    $logging = $logging;
                    $query = "insert into users(name,lastname,password,logging,email,role) values('$name','$lastname','$password','$logging','$email',1)";
                    $c->realizarOperacion($query);
                }
                $sended = true;
                break;
            } catch (phpmailerException $e) {
                //echo $e->errorMessage(); //Pretty error messages from PHPMailer
                //echo "No se pudo enviar el correo de confirmación";
            } catch (Exception $e) {
                // echo $e->getMessage(); //Boring error messages from anything else!
                //echo "Se ha producido un error en el registro";
            }
            $intentos++;
        }
        if (!$sended) {
            echo "No se pudo enviar el correo de confirmación";
        }
        ?>

    </body>
</html>
