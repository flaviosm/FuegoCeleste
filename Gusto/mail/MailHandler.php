<?php
// Passando os dados obtidos pelo formulário para as variáveis abaixo
$nomeremetente     = $_POST['name'];
$emailremetente    = trim($_POST['email']);
$emaildestinatario = 'flasp2000@gmail.com'; // Digite seu e-mail aqui, lembrando que o e-mail deve estar em seu servidor web
$telefone      	   = $_POST['phone'];
$mensagem          = $_POST['message'];
$assunto		   = 'FORMULARIO PREENCHIDO NO SITE Fuego Celeste';
 
 
/* Montando a mensagem a ser enviada no corpo do e-mail. */
$mensagemHTML = '<p><b>Nome:</b> '.$nomeremetente.'
<p><b>E-Mail:</b> '.$emailremetente.'
<p><b>Telefone:</b> '.$telefone.'
<p><b>Mensagem:</b> '.$mensagem.'</p>
<hr>';
	
	
try{
// O remetente deve ser um e-mail do seu domínio conforme determina a RFC 822.
// O return-path deve ser ser o mesmo e-mail do remetente.
$headers = "MIME-Version: 1.1\r\n";
$headers .= "Content-type: text/html; charset=utf-8\r\n";
$headers .= "From: $emailremetente\r\n"; // remetente
$headers .= "Return-Path: $emaildestinatario \r\n"; // return-path
$envio = mail($emaildestinatario, $assunto, $mensagemHTML, $headers); 

	if($envio){
		die('success');
	}	
	
}catch(Exception $mail){
	die($mail);
}	
?>

