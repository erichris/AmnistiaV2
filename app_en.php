<?php require "posts.php" ?>
<html lang="es">
<head>
    <meta charset="UTF-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="functions.js"></script>
	<title>Antivirus Amnistia Internacional-Revisar Perfil</title>
</head>
<body>
	<div class="row sin-borde" style="justify-content: center;">
	<div class="col-sm-4 sin-borde" style="background-color: black;">
	<div class="contenedor-carga" id="carga" style="min-height:100vh; display:flex; flex-direction: column; align-items: center; justify-content:center;">
                    <div class="center">
                        <div class="imagen-carga" style="margin-bottom: 30px;">
                            <img src="img/logo_amnistia_internacional.png" alt=" logo amnistia internacional">
                        </div>
                        <div class="preloader-wrapper big active">
                            <div class="spinner-layer spinner-yellow-only">
                                <div class="circle-clipper left">
                                <div class="circle"></div>
                                </div><div class="gap-patch">
                                <div class="circle"></div>
                                </div><div class="circle-clipper right">
                                <div class="circle"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
	<div class="hide" id="contenido">
        <div class="row sin-borde">
            <div class="col-sm-12 col-xs-12 sin-borde" >
                <div class="encabezado">
                    <div class="col-sm-5" style="padding: 0%;">
                        <div class="con-titulo-3">
						<h1 class="titulo-3"> <span id="ContadorXD"> 00 </span> cases </br>of sexist language were detected.<h1>
						<h2 class="eliminado-3"> Delete them!</h2>
						</div>
                    </div>
                    <div class="col-sm-7" style="padding: 0%;">
                        <img class="img-paso3" src="img/ai_antivirus_grafico.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="row sin-borde">
            <div class="col-sm-12 col xs-12 sin-borde"  style=" padding:unset; background-color: #fff;" >
				<div style="padding-left: 10px" > 
				<p class="instruc"><br>1. Click on a post to see it. <br>2. Delete it by clicking on the ellipsis on the upper right side.<br>3. Continue analyzing. </p>	
				</div>
                    
                <div class="contedor-publicaciones" style=" background-color: #fff;">
					<div id="PostContainer">
					<!--<h1 id='PostTotales'>12</h1>-->
						<!--Lala -->
					</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-xs-12" style="padding-right: 0px; padding-left: 0px;">
                <div class="boton-3">
					<div> 
					
					</div>
                    <form class="form-btn-3" action="https://antivirusamnistiainternacional.com/paso6.html">
                        <input class="btn-3" id="ButtonContinue" type="submit" value="Continue" value="Continue">
                    </form>
                </div>
            </div>
        </div>
		</div>
	</div>
	</div>
	<!-- Compiled and minified JavaScript -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
     <script>
     window.addEventListener('load', () => {
         setTimeout(tiempo_carga, 5000);
         function tiempo_carga(){
         document.getElementById('carga').className ='hide'
         document.getElementById('contenido').className =''
         }
     })
     </script>
	 <script>
		localStorage.removeItem("TotalPostsDetecteds");
		localStorage.removeItem("User");
		localStorage.setItem("DelatedPosts", "0");
		window.setInterval(function(){
			var x = document.getElementById("PostContainer").childElementCount;
			if(x != 0 && localStorage.getItem("User") == null){
				localStorage.setItem("TotalPostsDetecteds", x);
				localStorage.setItem("User", "Chris");
			}
			var y = parseInt(localStorage.getItem("TotalPostsDetecteds")) - x;
			localStorage.setItem("DelatedPosts", y);
			
			if(localStorage.getItem("TotalPostsDetecteds") == 1){
				document.getElementById("AmountCasos").innerHTML = " caso";
				document.getElementById("CasoTag").innerHTML = " detectó";
			}else{
				document.getElementById("AmountCasos").innerHTML = " casos";
				document.getElementById("CasoTag").innerHTML = " detectaron";
			}
			
		}, 100);
		
	 </script>
</body>
</html>