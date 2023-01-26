$(document).ready(function(){
$("#usuario-crear").validate({
		rules:{
			documento:{
				required:true	
			},
			nombres:{
				required:true
			},
			apellidos:{
				required:true
			},
			fechanacimiento:{
				required:true
			},
			email:{
				required:true,
				email:true
			},
			celular:{
				required:true
			},
			usuario:{
				required:true
			},
			password:{
				required:true
			},
			re_password:{
				required:true,
				equalTo:"#password"
			}
		}
	});
	$(function(){
    	$("#datepicker").datepicker({
    		dateFormat:"yy-mm-dd",
    		changeMonth: true,
      		changeYear: true,
      		yearRange: "-100:+0"
    	});
    });
});