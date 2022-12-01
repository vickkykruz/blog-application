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

require_once('../../database/db.php');

if(isset($_POST['save'])){

        
    $selctor = bin2hex(random_bytes(8));
    $token = random_bytes(32);

    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $profession = $_POST['profession'];
    
    $expires = date("U") + 1800;

    $url="https://sgenterprisesnow.com/SGAdmin/invite_admin/index.php?selector=".$selctor."&validator=".bin2hex($token)."&email=".$email;

   
    // echo $name;

    if(!empty($name && $username && $email && $profession)){

        // VALIDATE EMAIL
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo '<script>alert("Invalid email format");</script>';
            echo "<script>window.location.href='../index.php?response=invaildEmail&email=".$email."'</script>";
            die();
        }else {

            // CHECK IF EMPLOYEE EMAIL EXISTS //
            $sql = "SELECT * FROM admin WHERE username = ?";
            $stmt = mysqli_stmt_init($connection);
            if(!mysqli_stmt_prepare($stmt, $sql)){
                echo "<script>alert('There was an error')</script>";
                echo '<script>window.location.href="../index.php?responde=error&email='.$email.'";</script>';
                exit;
            }else{
                mysqli_stmt_bind_param($stmt, "s", $username);
                mysqli_stmt_execute($stmt);

                mysqli_stmt_store_result($stmt);
                // echo '<pre>';
                // var_dump($stmt);
                // echo '</pre>';
                if (mysqli_stmt_num_rows($stmt) > 0 ) {
                    // email already EXISTS
                    echo '<script>alert("Oops...This details already exist");</script>';
                    echo '<script>window.location.href="../index.php?responde=ThisUserExist&email='.$email.'"</script>';
                }else{

                    // CHECK IF EMPLOYEE EMAIL EXISTS //
                    $sql = "SELECT * FROM admin WHERE email = ?;";
                    $stmt = mysqli_stmt_init($connection);

                    if(!mysqli_stmt_prepare($stmt, $sql)){
                        echo "<script>alert('There was an error')</script>";
                        echo '<script>window.location.href="../index.php?responde=error&email='.$email.'";</script>';
                        exit;

                    }else{
                        mysqli_stmt_bind_param($stmt, "s", $email);
                        mysqli_stmt_execute($stmt);

                        mysqli_stmt_store_result($stmt);
                       
                        if (mysqli_stmt_num_rows($stmt) > 0 ) {
                            // email already EXISTS
                            echo '<script>alert("Oops...This details already exist");</script>';
                            // header("Location:")
                            echo '<script>window.location.href="../index.php?responde=ThisUserExist&email='.$email.'"</script>';
                        }else{

                           // echo "Allowed user";
                            // exit;

                            $sql = "DELETE FROM nwmembertoken WHERE nwMemberEmail=?;";
                            $stmt = mysqli_stmt_init($connection);
                            if(!mysqli_stmt_prepare($stmt, $sql)){
                                    echo "<script>alert('There was an error')</script>";
                                    echo '<script>window.location.href="../index.php?responde=error&email='.$email.'";</script>';
                                    exit;
                            }else{
                                    mysqli_stmt_bind_param($stmt, "s", $email);
                                    mysqli_stmt_execute($stmt);
                            }  
                                    
                            $sql = "INSERT INTO nwmembertoken(nwMemberEmail, nwMemberSelector, nwMemberToken, nwMemberExpires) 
                                        VALUES(?,?,?,?);";
                            
                            $stmt = mysqli_stmt_init($connection);
                        
                            if(!mysqli_stmt_prepare($stmt, $sql)){
                                    echo "<script>alert('There was an error in preparing stmt')</script>";
                                    echo '<script>window.location.href="../index.php??responde=error&email='.$email.'";</script>';
                                    exit;
                        
                            }else{
                                    $hashedToken = password_hash($token, PASSWORD_DEFAULT);
                                    mysqli_stmt_bind_param($stmt, "ssss", $email, $selctor, $hashedToken, $expires);
                                    mysqli_stmt_execute($stmt);

                                    $sql = "INSERT INTO admin(name, email, username, profession)
                                            VALUES (?,?,?,?);";
                                    $stmt = mysqli_stmt_init($connection);
                
                                if(!mysqli_stmt_prepare($stmt, $sql)){
                                    echo "<script>alert('There was an error in preparing stmt')</script>";
                                    echo '<script>window.location.href="../index.php?responde=error&email='.$email.'";</script>';
                                    exit;
                                            // echo "<script>window.location.href='../forgot-password.php'</script>";
                        
                                }else{
                                    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $profession);
                                    mysqli_stmt_execute($stmt);

                                    $to = $email;
                                    $suject = "S.G Enterprises - Account Invitation";
                                    $output='
                                    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                                    <html xmlns="http://www.w3.org/1999/xhtml">
                                    <head>
                                        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                                        <meta name="x-apple-disable-message-reformatting" />
                                        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                                        <meta name="color-scheme" content="light dark" />
                                        <meta name="supported-color-schemes" content="light dark" />
                                        <title></title>
                                        <style type="text/css" rel="stylesheet" media="all">
                                        /* Base ------------------------------ */
                                        
                                        @import url("https://fonts.googleapis.com/css?family=Nunito+Sans:400,700&display=swap");
                                        body {
                                        width: 100% !important;
                                        height: 100%;
                                        margin: 0;
                                        -webkit-text-size-adjust: none;
                                        }
                                        
                                        a {
                                        color: #daa520;
                                        }
                                        
                                        a img {
                                        border: none;
                                        }
                                        
                                        td {
                                        word-break: break-word;
                                        }
                                        
                                        .preheader {
                                        display: none !important;
                                        visibility: hidden;
                                        mso-hide: all;
                                        font-size: 1px;
                                        line-height: 1px;
                                        max-height: 0;
                                        max-width: 0;
                                        opacity: 0;
                                        overflow: hidden;
                                        }
                                        /* Type ------------------------------ */
                                        
                                        body,
                                        td,
                                        th {
                                        font-family: "Nunito Sans", Helvetica, Arial, sans-serif;
                                        }
                                        
                                        h1 {
                                        margin-top: 0;
                                        color: #333333;
                                        font-size: 22px;
                                        font-weight: bold;
                                        text-align: left;
                                        }
                                        
                                        h2 {
                                        margin-top: 0;
                                        color: #333333;
                                        font-size: 16px;
                                        font-weight: bold;
                                        text-align: left;
                                        }
                                        
                                        h3 {
                                        margin-top: 0;
                                        color: #333333;
                                        font-size: 14px;
                                        font-weight: bold;
                                        text-align: left;
                                        }
                                        
                                        td,
                                        th {
                                        font-size: 16px;
                                        }
                                        
                                        p,
                                        ul,
                                        ol,
                                        blockquote {
                                        margin: .4em 0 1.1875em;
                                        font-size: 16px;
                                        line-height: 1.625;
                                        }
                                        
                                        p.sub {
                                        font-size: 13px;
                                        }
                                        /* Utilities ------------------------------ */
                                        
                                        .align-right {
                                        text-align: right;
                                        }
                                        
                                        .align-left {
                                        text-align: left;
                                        }
                                        
                                        .align-center {
                                        text-align: center;
                                        }
                                        
                                        .u-margin-bottom-none {
                                        margin-bottom: 0;
                                        }
                                        /* Buttons ------------------------------ */
                                        
                                        .button {
                                        background-color: #daa520;
                                        border-top: 10px solid #daa520;
                                        border-right: 18px solid #daa520;
                                        border-bottom: 10px solid #daa520;
                                        border-left: 18px solid #daa520;
                                        display: inline-block;
                                        color: #FFF;
                                        text-decoration: none;
                                        border-radius: 3px;
                                        box-shadow: 0 2px 3px rgba(0, 0, 0, 0.16);
                                        -webkit-text-size-adjust: none;
                                        box-sizing: border-box;
                                        }
                                        
                                        .button--green {
                                        background-color: #22BC66;
                                        border-top: 10px solid #22BC66;
                                        border-right: 18px solid #22BC66;
                                        border-bottom: 10px solid #22BC66;
                                        border-left: 18px solid #22BC66;
                                        }
                                        
                                        .button--red {
                                        background-color: #FF6136;
                                        border-top: 10px solid #FF6136;
                                        border-right: 18px solid #FF6136;
                                        border-bottom: 10px solid #FF6136;
                                        border-left: 18px solid #FF6136;
                                        }
                                        
                                        @media only screen and (max-width: 500px) {
                                        .button {
                                            width: 100% !important;
                                            text-align: center !important;
                                        }
                                        }
                                        /* Attribute list ------------------------------ */
                                        
                                        .attributes {
                                        margin: 0 0 21px;
                                        }
                                        
                                        .attributes_content {
                                        background-color: #F4F4F7;
                                        padding: 16px;
                                        }
                                        
                                        .attributes_item {
                                        padding: 0;
                                        }
                                        /* Related Items ------------------------------ */
                                        
                                        .related {
                                        width: 100%;
                                        margin: 0;
                                        padding: 25px 0 0 0;
                                        -premailer-width: 100%;
                                        -premailer-cellpadding: 0;
                                        -premailer-cellspacing: 0;
                                        }
                                        
                                        .related_item {
                                        padding: 10px 0;
                                        color: #CBCCCF;
                                        font-size: 15px;
                                        line-height: 18px;
                                        }
                                        
                                        .related_item-title {
                                        display: block;
                                        margin: .5em 0 0;
                                        }
                                        
                                        .related_item-thumb {
                                        display: block;
                                        padding-bottom: 10px;
                                        }
                                        
                                        .related_heading {
                                        border-top: 1px solid #CBCCCF;
                                        text-align: center;
                                        padding: 25px 0 10px;
                                        }
                                        /* Discount Code ------------------------------ */
                                        
                                        .discount {
                                        width: 100%;
                                        margin: 0;
                                        padding: 24px;
                                        -premailer-width: 100%;
                                        -premailer-cellpadding: 0;
                                        -premailer-cellspacing: 0;
                                        background-color: #F4F4F7;
                                        border: 2px dashed #CBCCCF;
                                        }
                                        
                                        .discount_heading {
                                        text-align: center;
                                        }
                                        
                                        .discount_body {
                                        text-align: center;
                                        font-size: 15px;
                                        }
                                        /* Social Icons ------------------------------ */
                                        
                                        .social {
                                        width: auto;
                                        }
                                        
                                        .social td {
                                        padding: 0;
                                        width: auto;
                                        }
                                        
                                        .social_icon {
                                        height: 20px;
                                        margin: 0 8px 10px 8px;
                                        padding: 0;
                                        }
                                        /* Data table ------------------------------ */
                                        
                                        .purchase {
                                        width: 100%;
                                        margin: 0;
                                        padding: 35px 0;
                                        -premailer-width: 100%;
                                        -premailer-cellpadding: 0;
                                        -premailer-cellspacing: 0;
                                        }
                                        
                                        .purchase_content {
                                        width: 100%;
                                        margin: 0;
                                        padding: 25px 0 0 0;
                                        -premailer-width: 100%;
                                        -premailer-cellpadding: 0;
                                        -premailer-cellspacing: 0;
                                        }
                                        
                                        .purchase_item {
                                        padding: 10px 0;
                                        color: #51545E;
                                        font-size: 15px;
                                        line-height: 18px;
                                        }
                                        
                                        .purchase_heading {
                                        padding-bottom: 8px;
                                        border-bottom: 1px solid #EAEAEC;
                                        }
                                        
                                        .purchase_heading p {
                                        margin: 0;
                                        color: #85878E;
                                        font-size: 12px;
                                        }
                                        
                                        .purchase_footer {
                                        padding-top: 15px;
                                        border-top: 1px solid #EAEAEC;
                                        }
                                        
                                        .purchase_total {
                                        margin: 0;
                                        text-align: right;
                                        font-weight: bold;
                                        color: #333333;
                                        }
                                        
                                        .purchase_total--label {
                                        padding: 0 15px 0 0;
                                        }
                                        
                                        body {
                                        background-color: #F2F4F6;
                                        color: #51545E;
                                        }
                                        
                                        p {
                                        color: #51545E;
                                        }
                                        
                                        .email-wrapper {
                                        width: 100%;
                                        margin: 0;
                                        padding: 0;
                                        -premailer-width: 100%;
                                        -premailer-cellpadding: 0;
                                        -premailer-cellspacing: 0;
                                        background-color: #F2F4F6;
                                        }
                                        
                                        .email-content {
                                        width: 100%;
                                        margin: 0;
                                        padding: 0;
                                        -premailer-width: 100%;
                                        -premailer-cellpadding: 0;
                                        -premailer-cellspacing: 0;
                                        }
                                        /* Masthead ----------------------- */
                                        
                                        .email-masthead {
                                        padding: 25px 0;
                                        text-align: center;
                                        }
                                        
                                        .email-masthead_logo {
                                        width: 94px;
                                        }
                                        
                                        .email-masthead_name {
                                        font-size: 16px;
                                        font-weight: bold;
                                        color: #A8AAAF;
                                        text-decoration: none;
                                        text-shadow: 0 1px 0 white;
                                        }
                                        /* Body ------------------------------ */
                                        
                                        .email-body {
                                        width: 100%;
                                        margin: 0;
                                        padding: 0;
                                        -premailer-width: 100%;
                                        -premailer-cellpadding: 0;
                                        -premailer-cellspacing: 0;
                                        }
                                        
                                        .email-body_inner {
                                        width: 570px;
                                        margin: 0 auto;
                                        padding: 0;
                                        -premailer-width: 570px;
                                        -premailer-cellpadding: 0;
                                        -premailer-cellspacing: 0;
                                        background-color: #FFFFFF;
                                        }
                                        
                                        .email-footer {
                                        width: 570px;
                                        margin: 0 auto;
                                        padding: 0;
                                        -premailer-width: 570px;
                                        -premailer-cellpadding: 0;
                                        -premailer-cellspacing: 0;
                                        text-align: center;
                                        }
                                        
                                        .email-footer p {
                                        color: #A8AAAF;
                                        }
                                        
                                        .body-action {
                                        width: 100%;
                                        margin: 30px auto;
                                        padding: 0;
                                        -premailer-width: 100%;
                                        -premailer-cellpadding: 0;
                                        -premailer-cellspacing: 0;
                                        text-align: center;
                                        }
                                        
                                        .body-sub {
                                        margin-top: 25px;
                                        padding-top: 25px;
                                        border-top: 1px solid #EAEAEC;
                                        }
                                        
                                        .content-cell {
                                        padding: 45px;
                                        }
                                        /*Media Queries ------------------------------ */
                                        
                                        @media only screen and (max-width: 600px) {
                                        .email-body_inner,
                                        .email-footer {
                                            width: 100% !important;
                                        }
                                        }
                                        
                                        @media (prefers-color-scheme: dark) {
                                        body,
                                        .email-body,
                                        .email-body_inner,
                                        .email-content,
                                        .email-wrapper,
                                        .email-masthead,
                                        .email-footer {
                                            background-color: #333333 !important;
                                            color: #FFF !important;
                                        }
                                        p,
                                        ul,
                                        ol,
                                        blockquote,
                                        h1,
                                        h2,
                                        h3,
                                        span,
                                        .purchase_item {
                                            color: #FFF !important;
                                        }
                                        .attributes_content,
                                        .discount {
                                            background-color: #222 !important;
                                        }
                                        .email-masthead_name {
                                            text-shadow: none !important;
                                        }
                                        }
                                        
                                        :root {
                                        color-scheme: light dark;
                                        supported-color-schemes: light dark;
                                        }
                                        </style>
                                        <!--[if mso]>
                                        <style type="text/css">
                                        .f-fallback  {
                                            font-family: Arial, sans-serif;
                                        }
                                        </style>
                                    <![endif]-->
                                    </head>
                                    <body>
                                        <span class="preheader">{{invite_sender_name}} with {{invite_sender_organization_name}} has invited you to use [Product Name] to collaborate with them.</span>
                                        <table class="email-wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                        <tr>
                                            <td align="center">
                                            <table class="email-content" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                <tr>
                                                <td class="email-masthead">
                                                    <a href="https://example.com" class="f-fallback email-masthead_name">
                                                        <img src="./image/s.g_gold_logo_size.png" width="150px" height="50px"/>
                                                </a>
                                                </td>
                                                </tr>
                                                <!-- Email Body -->
                                                <tr>
                                                <td class="email-body" width="570" cellpadding="0" cellspacing="0">
                                                    <table class="email-body_inner" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
                                                    <!-- Body content -->
                                                    <tr>
                                                        <td class="content-cell">
                                                        <div class="f-fallback">
                                                            <h1>Hi, '.$name.'!</h1>
                                                            <p>The SG Enterprises Team has invited you to use the postion of '.$profession.' to collaborate with us. Use the button below to set up your account and get started:</p>
                                                            <!-- Action -->
                                                            <table class="body-action" align="center" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                            <tr>
                                                                <td align="center">
                                                                <!-- Border based button
                                            
                                                                <table width="100%" border="0" cellspacing="0" cellpadding="0" role="presentation">
                                                                    <tr>
                                                                    <td align="center">
                                                                        <a href="'.$url.'" class="f-fallback button" target="_blank">Set up account</a>
                                                                    </td>
                                                                    </tr>
                                                                </table>
                                                                </td>
                                                            </tr>
                                                            </table>
                                                            <p>If you have any questions for {{invite_sender_name}}, you can reply to this email and it will go right to them. Alternatively, feel free to <a href="mailto:{{support_email}}">contact our customer success team</a> anytime. (We are lightning quick at replying.) We also offer <a href="{{live_chat_url}}">live chat</a> during business hours.</p>
                                                            <p>Welcome aboard,
                                                            <br>The [Product Name] team</p>
                                                            <p><strong>P.S.</strong> Need help getting started? Check out our <a href="{{help_url}}">help documentation</a>.</p>
                                                            <!-- Sub copy -->
                                                            <table class="body-sub" role="presentation">
                                                            <tr>
                                                                <td>
                                                                <p class="f-fallback sub">If you’re having trouble with the button above, copy and paste the URL below into your web browser.</p>
                                                                <p class="f-fallback sub"><a href="'.$url.'" target="_blank">'.$url.'</a></p>
                                                                </td>
                                                            </tr>
                                                            </table>
                                                        </div>
                                                        </td>
                                                    </tr>
                                                    </table>
                                                </td>
                                                </tr>
                                                <tr>
                                                <td>
                                                    <table class="email-footer" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
                                                    <tr>
                                                        <td class="content-cell" align="center">
                                                        <p class="f-fallback sub align-center">
                                                            SG Enterprises
                                                            <br>1234 Street, Jobore Rd, Omu, Ijebu-Ode,
                                                            <br>Ogun State Nigeria.
                                                            
                                                        </p>
                                                        </td>
                                                    </tr>
                                                    </table>
                                                </td>
                                                </tr>
                                            </table>
                                            </td>
                                        </tr>
                                        </table>
                                    </body>
                                    </html>
                                    ';

                                    $body = $output;

                                    try {
                            
                                        //Server settings
                                        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                                        $mail->isSMTP();                                            //Send using SMTP
                                        $mail->Host       = "smtp.gmail.com";                     //Set the SMTP server to send through
                                        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                                        $mail->Username   = "onwuegbuchulemvic09@gmail.com";                     //SMTP username
                                        $mail->Password   = 'Victorchi';                               //SMTP password
                                        $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
                                        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                                    
                                        //Recipients
                                        $mail->setFrom('onwuegbuchulemvic09@gmail.com', 'Account Verfication');
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
                                            echo '<script>alert("Invitation Mail Sent")</script>';
                                            echo '<script>window.location.href="../index.php?responde=success&email='.$email.'".;</script>';
                                        }else{
                                            echo '<script>alert("Message has been not sent")</script>';
                                            echo '<script>window.location.href="../index.php?responde=error&email='.$email.'";</script>';
                                        }
                            
                                    }
                
                                    catch (Exception $e) {
                                        $e->getMessage();
                                        echo "Error";
                                    }
                                }
                            }
                        }
                    }
                } 
            }
        }
    }else{
        echo "<script>alert('Check Your Details');</script>";
        echo "<script>window.location.href='../index.php?response=checkYourDetails&email=".$email."'</script>";    
    }
    
}else{
    echo "<script>alert('Error');</script>";
    echo "<script>window.location.href='../index.php?response=404PageError&email=".$email."'</script>";
}