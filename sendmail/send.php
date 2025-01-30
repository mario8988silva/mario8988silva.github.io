<?php

require_once 'vendor/autoload.php';

define("HOST", "joaogoncalves.net"); // servidor SMTP
define("PORT", 465); // PORT do servidor SMTP
define("SMTP_SECURE", "ssl"); // ssl ou tls, 
define("USERNAME", "flag@joaogoncalves.net"); // username do email de envio
define("PASSWORD", "OsMelhoresDevS"); // password do email de envio
define("FROM_EMAIL", "no-reply@joaogoncalves.net"); // email de quem recebe fizer reply // Fazer conta com dominio real para o formulário poder enviar 
define("FROM_NAME", "ALUNOS FLAG"); // de quem esta a enviar

//identificação das variaveis que correspondem ao atributo "name" no form 
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$message = $_POST['subject'];


/// Construção da mensagem a enviar por email, em php utiliza-se o '.' para juntar strings em vez do '+'
//$msgAEnviar = "Nome: ".$name.' ,Email: '.$email.' ,Mensagem: '.$message;
$msgAEnviar = "<p>Nome: ".$firstname."</p>";
$msgAEnviar .= "<p>Apelido: ".$lastname."</p>";
$msgAEnviar .= "<p>Email: ".$email."</p>";
$msgAEnviar .= "<p>Mensagem: ".$message."</p>";

$mail = new PHPMailer();
//$mail->SMTPDebug = 3;  

$mail->isSMTP();
$mail->Host = HOST;
$mail->SMTPAuth = true;
$mail->Username = USERNAME;
$mail->Password = PASSWORD;
$mail->SMTPSecure = SMTP_SECURE;
$mail->Port = PORT;

$mail->setFrom(FROM_EMAIL, FROM_NAME);
$mail->addAddress($email, $firstname); 
$mail->addAddress('joao@joaogoncalves.net', 'joao jose'); // para enviar para o email que o user insere
$mail->isHTML(true);


$mail->Subject = "Mensagem de teste ....";
$mail->Body    = $msgAEnviar;
$mail->AltBody = $msgAEnviar;

// insere ou mensagem, ou chama o ficheiro .html de sucesso
if(!$mail->send()) {
    // echo 'Message could not be sent.';
    // echo 'Mailer Error: ' . $mail->ErrorInfo;
    //header("Location: ../docs/form_success.html");
    //header("Location: https://joaogoncalves.github.io/sendmail/feedbackformerror.html");
    header("Location: https://mario8988silva.github.io/docs/form_success.html");
    
}

// insere ou mensagem, ou chama o ficheiro .html de erro
else {
    //echo 'Message has been sent.';
    //header("Location: ../docs/form_error.html");
    //header("Location: https://joaogoncalves.github.io/sendmail/feedbackform.html");
    header("Location: https://mario8988silva.github.io/docs/form_error.html");
    
}
