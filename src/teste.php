<?php
// Incluindo arquivo com a classe Mail
@require_once('Mail.php');

// Destinatário da mensagem
$to = "lhmaia@gmail.com";
$from = "lhmaia@gmail.com";

// Assunto da mensagem
$subject = "Testando envio autenticado pelo Google Apps";

/* Corpo da mensagem
Em caso de formulário alterar para a variável $_POST['CAMPO'] */
$body = "Teste efetuado com sucesso!";

// Servidor do Gmail. Este servidor é padrão.
$host = "ssl://smtp.gmail.com";

/* Email do Gmail que fará o envio autenticado. Digite neste campo o seu e-mail que será responsável pelo envio dos e-mails */
$username = "lhmaia@gmail.com";

// Sua senha do GMAIL
$password = "lhmc1983";

$headers = array ('From' => $from,
 'To' => $to,
 'Subject' => $subject);

$smtp = @Mail::factory('smtp',
 array ('host' => $host,
 'port' => 465, // SMTPS(para mais detalhes ver /etc/services
 'auth' => true,
 'debug' => false, // Debug ligado
 'username' => $username,
 'password' => $password)
 );

// Efetuando o envio autenticado
$mail = @$smtp->send($to, $headers, $body);

// Verificando se houve erro
if (@PEAR::isError($mail)) {
 echo("Error" . $mail->getMessage());
} else {
 echo("Email enviado com sucesso!!");
}
?>

<?php/*
 require_once "Mail.php";
 
 $from = "Luiz Henrique <lhmaia@gmail.com>";
 $to = "Luiz <luizhenriquemc@hotmail.com>";
 $subject = "Hi!";
 $body = "Hi,\n\nHow are you?";
 
 $host = "ssl://smtp.gmail.com";
 $port = "465";
 $username = "lhmaia@gmail.com";
 $password = "lhmc1983";
  
 $headers = array ('From' => $from,
   'To' => $to,
   'Subject' => $subject);
 $smtp = Mail::factory('smtp',
   array ('host' => $host,
     'port' => $port,
     'auth' => true,
     'username' => $username,
     'password' => $password));
 
 $mail = $smtp->send($to, $headers, $body);
 
 if (PEAR::isError($mail)) {
   echo("<p>" . $mail->getMessage() . "</p>");
  } else {
   echo("<p>Message successfully sent!</p>");
  }
  */
 ?>