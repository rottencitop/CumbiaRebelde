<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Participa por Entradas Dobles ★ Cumbia Rebelde - La nueva cumbia chilena</title>
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/jquery.vegas.min.js"></script>
<script type="text/javascript" src="js/jquery.cycle2.min.js"></script>
<script type="text/javascript" src="js/jquery.tipsy.js"></script>
<link href="css/tipsy.css" rel="stylesheet" type="text/css" />
<link href="css/jquery.vegas.min.css" rel="stylesheet" type="text/css"/>
<link href="css/style.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="js/scripts.js"></script>
<script type="text/javascript">
$(document).ready(function(e) {
    $("#formConcurso").submit(function(form){
		if($("#nombre").val() == "" || $("#nombre").val() == null){
			$("#nombre").addClass("error");
			$("#nombre").next("span").first().html("Nombre Obligatorio");
			return false;
		}else{
			$("#nombre").removeClass("error");
			$("#nombre").next("span").first().html("*");
		}
		
		
		if($("#edad").val() == "" || $("#edad").val() == null){
			$("#edad").addClass("error");
			$("#edad").next("span").first().html("Edad obligatoria");
			return false;
		}else if(isNaN($("#edad").val())){
			$("#edad").addClass("error");
			$("#edad").next("span").first().html("Formato Numerico obligatorio");
			return false;
		}else if($("#edad").val() < 18){
			$("#edad").addClass("error");
			$("#edad").next("span").first().html("Debes ser mayor de edad");
			return false;
		}else{
			$("#edad").removeClass("error");
			$("#edad").next("span").first().html("*");
		}
		
		var emailreg = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
		
		if($("#email").val() == "" || $("#email").val() == null){
			$("#email").addClass("error");
			$("#email").next("span").first().html("Email Obligatorio");
			return false;
		}else if(!emailreg.test($("#email").val())){
			$("#email").addClass("error");
			$("#email").next("span").first().html("Email no válido");
			return false;
		}else{
			$("#email").removeClass("error");
			$("#email").next("span").first().html("*");
		}
		
		if(!$("input[name='sexo']:checked").length){
			$("input[name='sexo']").next("span").first().html("Sexo Obligario");
			return false;
		}else{
			$("input[name='sexo']").next("span").first().html("*");
		}
		
		if($("#comuna").val() == ""){
			$("#comuna").addClass("error");
			$("#comuna").next("span").first().html("Comuna Obligatoria");
			return false;
		}else{
			$("#comuna").removeClass("error");
			$("#comuna").next("span").first().html("*");
		}
		
		if(!$("input[name='banda']:checked").length){
			alert("Debes elegir por lo menos una banda");
			return false;
		}
		
		if($("#mensaje").val() == "" || $("#mensaje").val == null){
			$("#mensaje").addClass("error");
			$("#mensaje").next("span").first().html("Campo obligatorio");
			return false;
		}
			});
	
	$("#mensaje").on("keyup",function(){
		var mensaje = $(this);
		var limite = parseInt(mensaje.attr("maxlength"));
		var cantidad = parseInt(mensaje.val().length);
		var disp = limite - cantidad;
		$("#caracteres").html("Te quedan "+ disp + " Caracteres");	
	});
});
</script>
</head>

<body onUnload="">
	<div id="container">
    	<header>
        	<div id="logo"><img src="images/logo.png" alt=""/></div>
            <nav>
            	<ul>
                	<a href="index.html"><li>Inicio</li></a>
                    <a href="noticias.html"><li>Noticias</li></a>
                    <a href="bandas.html"><li>Bandas</li></a>
                    <a href="participa.html"><li>Participa por Entradas Dobles</li></a>
                </ul>
            </nav>
        </header>
        
        <div id="wrappercontenido">
        	
            <div id="wrapperconcurso">
            	<h1>Participa por entradas dobles al Festival de la nueva cumbia chilena</h1>
                <section id="concurso">
                	<form id="formConcurso">

                    	<fieldset>
                        	<legend>Datos Personales</legend>
                            <div>
                                <label>Nombre Completo:</label>
                                <input type="text" name="nombre" id="nombre">
                                <span>*</span>
                            </div>
                            <div>
                                <label>Edad:</label>
                                <input type="text" name="edad" id="edad">
                                <span>*</span>
                            </div>
                            <div>
                            	<label>Email:</label>
                                <input type="text" name="email" id="email">
                                <span>*</span>
                            </div>
                            <div>
                            	<label>Sexo:</label>
                                <input type="radio" name="sexo" value="Masculino">Masculino
                                <input type="radio" name="sexo" value="Femenino">Femenino
                                <span>*</span>
                            </div>
                            	
                            <div>
                            <label>Comuna:</label>
                                <select name="comuna" id="comuna">
                                	<option value="" selected>Selecciona</option>
                                    <option value="La Florida">La Florida</option>
                                    <option value="Puente Alto">Puente Alto</option>
                                    <option value="Macul">Macul</option>
                                    <option value="San Joaquin">San Joaquín</option>
                                </select>
                                <span>*</span>
                            </div>
                        </fieldset>
                        
                        <fieldset>
                        	<legend>Informacion Extra</legend>
                            <div>
                            	<label>Que bandas quieres ver?</label>
                                <input type="checkbox" name="banda" value="Villa Carino">Villa Cariño
                                <input type="checkbox" name="banda" value="Chico Trujillo">Chico Trujillo
                                <input type="checkbox" name="banda" value="Juana Fe">Juana Fé
                                <input type="checkbox" name="banda" value="Pata e Cumbia">Pata e Cumbia
                                <span>*</span>
                            </div>
                            <div>
                            	<label>Cuéntanos porqué deberías ganar en 150 carácteres</label>
                                <textarea maxlength="150" name="mensaje" id="mensaje" style="width:40%;"></textarea>
                                <span>*</span>
                                <div id="caracteres">Te quedan 150 Caracteres</div>
                            </div>
                        </fieldset>
                        <input type="submit" value="Enviar Información">
                        <input type="reset" value="Resetear Información">
                    </form>
                </section>
            </div>
            
                    </div>
        
        <footer>
        Cumbia Rebelde &copy; 2014 | Sitio desarrollado por Leonel Carrasco
        </footer>
    </div>
</body>
</html>