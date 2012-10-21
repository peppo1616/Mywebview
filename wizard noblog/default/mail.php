<?php
//Recuperiamo tutte le variabili
	$mail = $_POST['mail'];
	$name = $_POST['name'];
	$subject = $_POST['subject'];
	$text = $_POST['messaggio'];
	$ip = $_SERVER['REMOTE_ADDR'];
	
//Qui andrà inserito il tuo indirizzo e-mail
$to = "nome@email.com";

//Creazione del mesaggio da inviare
$message = "Hai ricevuto una e-mail da: ".$name.", ".$mail.".<br />";
$message .= "Messaggio: <br />".$text."<br /><br />";
$message .= "IP: ".$ip."<br />";
$headers = "From: $mail \n";
$headers .= "Reply-To: $mail \n";
$headers .= "MIME-Version: 1.0 \n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1 \n";

//Se l'e-mail viene spedita correttamente, compare un messaggio di avvenuto invio
 if(mail($to, $subject,$message, $headers)){
	echo "<p>Messaggio inviato con successo</p>";
}
//Altrimenti un messaggio di errore
else{ 
	echo "<p>Ci sono stati degli errori nell'invio della e-mail.</p>";
}
?>