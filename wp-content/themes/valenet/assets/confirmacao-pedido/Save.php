<?php
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$email = $request->email;
$pass = $request->password;

$retorno = "";
if (isset($_POST)) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST))
        $_POST = json_decode(file_get_contents('php://input'), true);

    $dados_pessoais = $_POST['dados_pessoais'];

    foreach ($_POST as $key => $value) {
        $retorno +=  "$key: $value<br/>";
    }

    foreach ($dados_pessoais as $key => $value) {
        echo "$key: $value<br/>";
    }
}
echo $dados_pessoais;

//enviar email para contato.desenvolvimento@valenet.com.br


require("phpmailer/src/PHPMailer.php");
require("phpmailer/src/SMTP.php");
require("phpmailer/src/Exception.php");
require("phpmailer/src/OAuth.php");

$mail = new PHPMailer\PHPMailer\PHPMailer();
$mail->IsSMTP(); // enable SMTP

$mail->CharSet = "UTF-8";
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = false; // authentication enabled
$mail->SMTPSecure = false; // secure transfer enabled REQUIRED for Gmail    $mail->SMTPSecure = '**tls**';
$mail->Host = "mail.valenet.com.br";
$mail->Port = 465; // or 
$mail->IsHTML(true);
$mail->Username = "tandrade";
$mail->Password = 'expl@de!';
$mail->SetFrom("tandrade@valenet.com.br");
$mail->Subject = "Test";
$mail->Body = "hello";
$mail->AddAddress("tandrade@valenet.com.br");

if (!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message has been sent";
}
