currentpage = 1;
maxpage = 3;
currurl = window.location.href;


$(document).ready(function(){
	 
	$('[title]').qtip({ style: { name: 'cream', tip: true},
						position: { corner: {target: 'leftMiddle',tooltip: 'rightMiddle'}}
						}) ;
							
	$("#invia").click(function() {
		
		var valid = '';
		var errors = 0;
		var isr = '</small>';
		
		var name = $("#Nome").val();
		if (name.length<1 || name == $("#Nome").defaultValue) {
			errors++;
			var valid = '<small>Nome: non valido'+isr;
			$(".Nome-wrapper .alert").html(valid);
			$("#Nome").addClass("wrong_input");
		}else{
			$("#Nome").removeClass("wrong_input");
			$(".Nome-wrapper .alert").empty();
		}
		
		var sitoweb = $("#SitoWeb").val();
		if (sitoweb.length<1 || !sitoweb.match(/(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/)) {
			errors++;
			var valid = '<small>Sito web: non valido'+isr;	
			$(".SitoWeb-wrapper .alert").html(valid);
			$("#SitoWeb").addClass("wrong_input");
		}else{
			$("#SitoWeb").removeClass("wrong_input");
			$(".SitoWeb-wrapper .alert").empty();
		}
		
		
	//Se i controlli non vengono superati, appare il messaggio di errore.
		if (errors != 0) {

		}else{
			
			/*Effetto grafico */
			$("#particelle img").animate({
					opacity: 0.4,
					width:"0%",
					height:"0%"
			}, 10500 );	

			
			$("#risposta").css("display", "block");
			$("#risposta").css("background-color","#FFFFA0");
			$("#risposta").html("<p>Building your application...</p>");
			$("#risposta").fadeIn("slow");
			$("form").hide();
			$("#qrcode").show();
			
		}
  		
	});
									 
	$('#fordownload').ajaxForm(function(html) {

	//Recuperiamo tutte le variabili
		var valid = '';
		var errors = 0;
		var isr = '</small>';
				
			
	//Eseguiamo una serie di controlli
	
		var name = $("#Nome").val();
		if (name.length<1 || name == $("#Nome").defaultValue) {
			errors++;
			var valid = '<small><br /> Nome: non valido'+isr;
			$(".Nome-wrapper .alert").html(valid);
			$("#Nome").addClass("wrong_input");
		}else{
			$("#Nome").removeClass("wrong_input");
			$(".Nome-wrapper .alert").empty();
		}
		
		var sitoweb = $("#SitoWeb").val();
		if (sitoweb.length<1 || !sitoweb.match(/(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/)) {
			errors++;
			var valid = '<small><br />Sito web: non valido'+isr;	
			$(".SitoWeb-wrapper .alert").html(valid);
			$("#SitoWeb").addClass("wrong_input");
		}else{
			$("#SitoWeb").removeClass("wrong_input");
			$(".SitoWeb-wrapper .alert").empty();
		}
		
		
	//Se i controlli non vengono superati, appare il messaggio di errore.
		if (errors != 0) {

		}
		//Se i controlli vengono superati, compare un messaggio di invio in corso
		else {	
			
			var response = jQuery.parseJSON(html);
			
			$("#risposta").fadeIn("slow");
			
			if(response.result == "success"){
				linkdata = "<p>Downloading of 'application should start in a few seconds, if not <a href="+response.response+"> Click here </ a></p>";
				qr_api = "http://api.qrserver.com/v1/create-qr-code/?data="+response.response+"&size=300x300";
				qrcode = "<img src='"+qr_api+"' />";
				
				
				$("#risposta").html(linkdata);
				$("#qrcode").css("background","none");
				$("#qrcode").html(qrcode);
				$("#risposta").css("background-color","#e1ffc0");
				$("#download_frame").html("<iframe src="+response.response+"></iframe>");
			}else{
				$("#risposta").html("<p>"+response.response+"</p>");
				$("#risposta").css("background-color","#FFE3E3");
				$("#qrcode").hide();
			}
			
			
		}
		return false;
	});
});