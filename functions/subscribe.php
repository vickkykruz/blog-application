<?php

require './PHPMailer/PHPMailer.php';
require './PHPMailer/SMTP.php';
require './PHPMailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require './vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);


require_once('../seen/database/db.php');
require('../seen/database/pdo_db.php');

if(isset($_POST['send'])){
    $email = $_POST['userEmail'];
    if(!empty($email)){

        // Filter Email
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){

            // Check If email exist
            $sql = "SELECT * FROM subscribe WHERE email = '$email'";
            $query = mysqli_query($connection, $sql);

            if(mysqli_num_rows($query) == 0){

                // Insert New User
                $new_user = "INSERT INTO subscribe(email) VALUES($email)";
                $query_new = mysqli_query($connection, $new_user);

                if($query_new){
                    $to = $email;
                    $suject = "Thank for Subscribing";
                    $output = '';

                    $body = $output;

                    try {

                        //Server settings
                        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                        $mail->isSMTP();                                            //Send using SMTP
                        $mail->Host       = "mail.sgenterprisesnow.com";                     //Set the SMTP server to send through
                        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                        $mail->Username   = "no_reply@sgenterprisesnow.com";                     //SMTP username
                        $mail->Password   = 'SnISbOND!v}9';                               //SMTP password
                        $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
                        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                                                            
                                                                //Recipients
                        $mail->setFrom('no_reply@sgenterprisesnow.com', 'SG Enterprises Notification');  
                        $mail->addAddress($to, 'User');     //Add a recipient
                        // $mail->addAddress('ellen@example.com');               //Name is optional
                        $mail->addReplyTo('nascostasce@gmail.com', 'Contact');
                        // $mail->addCC('cc@example.com');
                        // $mail->addBCC('bcc@example.com');
                    
                        //Attachments
                        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
                    
                        //Content
                        $mail->isHTML(true);                                  //Set email format to HTML
                        $mail->Subject = $suject;
                        $mail->Body    = $body;
                        $mail->AltBody = 'SG Enterprise Team ';
                
                    
                        if($mail->send()){

                            $mail->clearAddresses();

                            $sql_request = "SELECT * FROM subscribe WHERE email='$email'";
                            $query_request = mysqli_query($connection, $sql_request);

                            if(mysqli_num_rows($query_request)==0){
                                echo "failed";
                                exit();
                            }else{
                                while($row_request = mysqli_fetch_array($query_request)){
                                    $requestId = $row_request['id'];
                                    $requestName = $row_request['name'];
                                    $requestEmail = $row_request['email'];

                                }
                            }

                            $sql_admin = "SELECT * FROM admin";
                            $statement = $db->prepare($sql_admin);
                            $statement->execute();
                            $result = $statement->fetchAll();
                            $url = "http://localhost/S.G%20Enterprices/SGAdmin/real_estate/tsd_occupany.form/occupant_details.php?page=occupantForm&profession=".$admin_profession."&email=".$main_admin."&checkUserId=".$requestId."&checkUserName=".$requestName."&checkUserEmail=".$requestEmail."";

                            foreach($result as $roe){
                                $suject_main_admin = "SITE  NOTIFICATION - New Subscriber";
                                $output_main_admin = '';

                                $body = $output_main_admin;


                                $mail = new PHPMailer;
                                $mail->isSMTP();                                      //Send using SMTP
                                $mail->Host       = "mail.sgenterprisesnow.com";                     //Set the SMTP server to send through
                                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                                $mail->Username   = "no_reply@sgenterprisesnow.com";                     //SMTP username
                                $mail->Password   = 'SnISbOND!v}9';                               //SMTP password
                                $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
                                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                                
                                //Recipients
                                $mail->setFrom('no_reply@sgenterprisesnow.com', 'SG Enterprises Notification');
                                $mail->addAddress($roe["email"], $roe["name"]);     //Add a recipient

                                $mail->addReplyTo('support@sgqnterprisesnow.com', 'Reply-To');
                                    
                                //Content
                                $mail->isHTML(true);                                  //Set email format to HTML
                                $mail->Subject = $suject_main_admin;
                                $mail->Body    = $body;
                                $mail->AltBody = 'SG Enterprise Team ';
                                
                                $SendAdmin = $mail->Send();
                                if($SendAdmin['code' == '400']){
                                    $output_Admin .= html_entity_decode($SendAdmin['full_error']);
                                
                                }
                            }

                            if($output_Admin == ''){
                                echo "success";
                            }else{
                                echo "failed";
                            }
                        }
                    }

                    catch (Exception $e) {
                        $e->getMessage();
                        echo "MailerErrorToUser";
                        exit();
                    }
                }else{ 
                    echo "failed";
                    die();
                }
            }else{
                echo "emailExaist";
                die();
            }
        }else{
            echo "failed";
            die();
        }
    }else{
        echo 'failed';
        die();
    }
}