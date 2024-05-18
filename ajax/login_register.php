<?php
require('../admin/inc/db_config.php');
require('../admin/inc/essentials.php');

require('../inc/PHPMailer/PHPMailer.php');
require('../inc/PHPMailer/SMTP.php');
require('../inc/PHPMailer/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function send_mail($uemail, $name, $token)
{
    //Server settings
    $mail = new PHPMailer(true);
    $mail->SMTPDebug = 3;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'kensherry18@gmail.com';               //SMTP username
    $mail->Password   = 'hljx jyaw jooc joos';                            //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`


    $mail->setFrom('kensherry18@gmail.com', 'Ken Sherry');
    $mail->addAddress($uemail, $name);

    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Account Verificatie Link';
    $mail->Body    = "Klik op de link om je account te bevestigen: <br> 
                    <a href='" . SITE_URL . "email_confirm.php?email_confirmation&email=$uemail&token=$token" . "'>
                    KLIK HIER
                    </a>
                    ";


    if ($mail->send()) {
        return 1;
    } else {
        return 0;
    }
}


if (isset($_POST['register'])) {

    $data = filteration($_POST);

    // match password an confirm password field

    if ($data['pass'] != $data['cpass']) {
        echo 'pass_mismatch';
        exit;
    }

    // check user exists
    $u_exist = select(
        "SELECT * FROM `user_cred` WHERE `email` = ? OR `phonenum` = ? LIMIT 1",
        [$data['email'], $data['phonenum']],
        "ss"
    );

    if (mysqli_num_rows($u_exist) != 0) {
        $u_exist_fetch = mysqli_fetch_assoc($u_exist);
        echo ($u_exist_fetch['email'] == $data['email']) ? 'email_already' : 'phone_already';
        exit;
    }

    $img = uploadUserImage($_FILES['profile']);

    if ($img == 'inv_img') {
        echo 'inv_img';
        exit;
    } else if ($img == 'upd_failed') {
        echo 'upd_failed';
        exit;
    }

    // send confirmation link to user's email;
    $token = bin2hex(random_bytes(16));

    if (!send_mail($data['email'], $data['name'], $token)) {
        echo 'mail_failed';
        exit;
    }

    $enc_pass = password_hash($data['pass'], PASSWORD_BCRYPT);

    $query = "INSERT INTO `user_cred` (`name`, `email`, `zip-code`, `address`, `phonenum`, `residence`, 
  `dob`, `password`, `profile`, `token`) VALUES (?,?,?,?,?,?,?,?,?,?)";

    $values = [
        $data['name'], $data['email'], $data['zip-code'], $data['address'], $data['phonenum'], $data['residence'],
        $data['dob'], $enc_pass, $img, $token
    ];

    if (insert($query, $values, 'ssssssssss')) {
        echo 1;
    } else {
        echo 'ins_failed';
    }
}
