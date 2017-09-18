/* VALIDATION */

$("form").validate();


/* KNOB */
	  
$(".dial").knob({
    'min':0,
    'max':10
});
	 
//Desaparecimento automatico de erros
$(".alert").delay( 5000 ).slideUp( 400 );
