<?php
/*
file per prendere i parametri di personalizzazione
e chiamare la shell per la compilazione
restituisce il link per il download 
*/
	require_once("configuration.php");
	setlocale(LC_CTYPE, "en_US.UTF-8");
 	/*Parametri di personalizzazione*/
	$nome = $_POST["Nome"];
	$sito = $_POST["SitoWeb"];
	
	$currentsite = $CURRENT_SITE;
	
	/*Struttura di rispota json*/
	$output = array("result" =>"","response" =>"");
	
	/*genero il nome unico per l'applicazione*/
	$tmp_dir = md5($nome."MyWebApp".$sito);

	/*Se sono vuoti ritorno un errore via json*/
	if(!filter_has_var(INPUT_POST, "Nome") ||
	   !filter_has_var(INPUT_POST, "SitoWeb")
	){
		$output["result"] = "failure";
		$output["response"] = "no data";
		
		die(json_encode($output));
		exit();		
	};
	
	/*Se l'url non è valido ritorno errore*/
	if (filter_var($sito, FILTER_VALIDATE_URL) == false){
		
		$output["result"] = "failure";
		$output["response"] = "sito web non valido";
		
		die(json_encode($output));
	}
	
	/*Pulisco i caratteri non attesi*/
	$nome = escapeshellarg($nome);
	$sito = escapeshellarg($sito);
	$indirizzo = escapeshellarg($indirizzo);
	
	/*Compilo da shell e passo i parametri di personalizzazione*/
	$mycmd = SHELL_PATH." ".$nome." ".$sito." ".$tmp_dir;
	
	/*Pulisco i comandi non attesi*/
	$last_line = exec(escapeshellcmd($mycmd));
	if($last_line == "finish"){
			
			/*url di download*/
			$url = $currentsite."get_app.php?code=".$tmp_dir;			  
			
			$output["result"] = "success";
			$output["response"] = $url;
			
			echo json_encode($output);
	}else{
		
			$output["result"] = "failure";
			$output["response"] = "compilation failed";
			
			echo json_encode($output);
	}
	
?>