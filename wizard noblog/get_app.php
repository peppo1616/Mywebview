<?php 
/* 

File che si occupa di reperire il pacchetto dell'applicazione
ricevuto il codice identificativo
ID -> APK

*/	
	require_once("configuration.php");
	$code =  $_GET["code"];

	/*Controllo se effettivamente non è vuoto*/
	if(!filter_has_var(INPUT_GET, "code")){
		die();
		exit();		
	};
	
	/*pattern per md5*/
	$pattern = "/^[0-9a-f]{32}$/i";
	
	/*Se è un codice md5 valido procedo per reperirlo*/
	if(preg_match($pattern, $code)){
					
			// definisco una variabile con il percorso alla cartella
			// in cui sono archiviati gli apk pronti
			$dir = DOWNLOAD_DIR_;

			// Recupero il nome del file 
			$file = $dir . "MyWebView_".$code.".apk";
								
			// verifico che il file esista
			if(!file)
			{
			  // se non esiste chiudo e stampo un errore
			  die("<p>Il file non esiste!</p>");
			}else{
			  $fsize = filesize($file);
			  // Se il file esiste...
			  // Cambio gli header per fare il download immediato
			  header("Cache-Control: public");
			  header("Content-Description: File Transfer");
			  header("Content-Disposition: attachment; filename= ".OUTPUTFILE_NAME);
			  header('Content-Type: application/vnd.android.package-archive');
			  header("Content-Length: ".$fsize); 
			  ///Leggo il contenuto del file
			  readfile($file);
			}

	}
	
?>