/* VALIDATION */

$("form").validate();


/* KNOB */
	  
$(".dial").knob({
    'min':0,
    'max':10
});
	 
function fechar_modal(){
        setTimeout(location.reload.bind(location), 500);
}
