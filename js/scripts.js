// JavaScript Document
$(document).on("ready",function(){
	$('.ultimovideo').tipsy({gravity: 's',fade:true,html:true});
	
	$('.banda').tipsy({gravity: 's',fade:true,html:true});
	
	$.vegas('slideshow', {
		delay: 10000,
		backgrounds:[
			{ src:'images/sonoradellegar.jpg', fade:1000 },
			{ src:'images/chicotrujillo2.jpg', fade:1000 },
			{ src:'images/sonoradellegar2.jpg', fade:1000 },
			{ src:'images/juanafe.jpg', fade:1000 }
		]
		})('overlay', {
		src:'images/02.png'
    });
	
	$("body").fadeIn(1000);
	
	$("nav ul a").on("click",function(e){
		e.preventDefault();
		var url = $(this).attr("href");
		$("body").fadeOut(1000,function(){
			window.location = url;
		});
	});
	
	$("#close").on("click",function(){
		$("#wrapperreproductor").fadeOut(1000);
	});
	
	$(".ultimovideo").on("click",function(){
		var video = $(this).attr("data-video");
		var urlvideo = '//www.youtube.com/embed/'+video;
		var iframe = '<iframe id="reproductorvideo" width="640" height="360" src="'+urlvideo+'" frameborder="0" allowfullscreen></iframe>';
		$("#containervideo").html(iframe);
		$("#wrapperreproductor").fadeIn(1000);
	});
	
});