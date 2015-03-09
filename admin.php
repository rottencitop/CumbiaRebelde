<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Administración de CumbiaRebelde  ★ Cumbia Rebelde - La nueva cumbia chilena</title>
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/jquery.vegas.min.js"></script>
<script type="text/javascript" src="js/jquery.cycle2.min.js"></script>
<script type="text/javascript" src="js/jquery.tipsy.js"></script>
<script src="//use.edgefonts.net/strong;dynalight;aguafina-script;qwigley.js"></script>
<link href="css/tipsy.css" rel="stylesheet" type="text/css" />
<link href="css/jquery.vegas.min.css" rel="stylesheet" type="text/css"/>
<link href="css/style.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="js/scripts.js"></script>
<script type="text/javascript">
$(document).on("ready",function(){
	$(".opcionadmin").on("click",function(){
		var opcion = $(this).attr("data-opcion");
		$.ajax({
			type:'POST',
			data: "opcion="+opcion,
			url:"opcionesformulario.php",
			success: function(data){
				$("#resopcionesadmin").html(data);
			}
		});
	});
	
	$("#resopcionesadmin").on("submit","#formAgregarVideo",function(e){
		e.preventDefault();
		var datos = $(this).serialize();
		$.ajax({
			data: datos + "&opcion=1",
			type:"post",
			url:"add.php",
			success: function(data){
				$("#res").html(data);
			}
		});
	});
	
	$("#resopcionesadmin").on("submit","#formAgregarNoticia",function(e){
		e.preventDefault();
			var form = $(this);
			var formdata = false;
			if (window.FormData){
				formdata = new FormData(form[0]);
			}
			formdata.append('opcion',2);
			$.ajax({
				data:formdata,
				cache       : false,
				contentType : false,
				processData : false,
				url:"add.php",
				type:"post",
				success: function(data){
					$("#res").html(data);
				}
			});
	});
	
	$("#resopcionesadmin").on("submit","#formAgregarBanda",function(e){
		e.preventDefault();
			var form = $(this);
			var formdata = false;
			if (window.FormData){
				formdata = new FormData(form[0]);
			}
			formdata.append('opcion',3);
			$.ajax({
				data:formdata,
				cache       : false,
				contentType : false,
				processData : false,
				url:"add.php",
				type:"post",
				success: function(data){
					$("#res").html(data);
				}
			});
	});
	
	$("#resopcionesadmin").on("submit","#formAgregarDisco",function(e){
		e.preventDefault();
			var form = $(this);
			var formdata = false;
			if (window.FormData){
				formdata = new FormData(form[0]);
			}
			formdata.append('opcion',4);
			$.ajax({
				data:formdata,
				cache       : false,
				contentType : false,
				processData : false,
				url:"add.php",
				type:"post",
				success: function(data){
					$("#res").html(data);
				}
			});
	});
	
	$("#resopcionesadmin").on("click",".eliminarvideo",function(){
		var video = $(this).attr("data-video");
		$.ajax({
			data: "opcion=1&video="+video,
			url:"delete.php",
			type:"post",
			success: function(data){
				$("#res").html(data);
			}
		});
	});
	
	$("#resopcionesadmin").on("click",".eliminarnoticia",function(){
		var noticia = $(this).attr("data-noticia");
		$.ajax({
			data: "opcion=2&noticia="+noticia,
			url:"delete.php",
			type:"post",
			success: function(data){
				$("#res").html(data);
			}
		});
	});
	
	$("#resopcionesadmin").on("click",".eliminarbanda",function(){
		var banda = $(this).attr("data-banda");
		$.ajax({
			data: "opcion=3&banda="+banda,
			url:"delete.php",
			type:"post",
			success: function(data){
				$("#res").html(data);
			}
		});
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
        	
            <div id="wrappernoticia">
            	<h1>Administración</h1>
                <section id="administracion">
                	<div id="opcionesadmin">
                    	<h3>Videos</h3>
                    	<div class="opcionadmin" data-opcion="1">Agregar Video</div>
                        <div class="opcionadmin" data-opcion="2">Ver todos los Videos</div>
                        
                        <h3>Noticias</h3>
                        <div class="opcionadmin" data-opcion="3">Agregar Noticia</div>
                        <div class="opcionadmin" data-opcion="4">Ver todas las Noticias</div>
                        
                        <h3>Banda</h3>
                        <div class="opcionadmin" data-opcion="5">Agregar Banda</div>
                        <div class="opcionadmin" data-opcion="6">Ver Bandas</div>
                        <div class="opcionadmin" data-opcion="7">Agregar Disco a Banda</div>
                        
                        <h3>Concurso</h3>
                        <div class="opcionadmin" data-opcion="8">Ver Participantes</div>
                    </div>
                    <div id="resopcionesadmin">
                    	
                    </div>
                    <div id="res">
                    </div>
                </section>
            </div>
            
                    </div>
        
        <footer>
        Cumbia Rebelde &copy; 2014 | Sitio desarrollado por Leonel Carrasco
        </footer>
    </div>
</body>
</html>