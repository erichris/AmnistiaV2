<?php require "Amnistia/config.php"; ?>
<?php
  function getPhoto(){
    require "Amnistia/config.php";

    try {
      // Returns a `Facebook\FacebookResponse` object
      $response = $fb->get('me?fields=id,name,picture', $_SESSION['fb_access_token']);
    } catch(Facebook\Exceptions\FacebookResponseException $e) {
      echo 'Graph returned an error: ' . $e->getMessage();
      exit;
    } catch(Facebook\Exceptions\FacebookSDKException $e) {
      echo 'Facebook SDK returned an error: ' . $e->getMessage();
      exit;
    }

    $user = $response->getGraphUser();
	
	//$urlPic = $user["picture"]["url"];
    $urlPic = "https://graph.facebook.com/" . $user["id"] . "/picture?height=480&width=480";
    return $urlPic;
  }


  function createPhoto($urlPic){
	print("<img id='PhotoPerfil' src='" . $urlPic . "' alt=''>");
  }
  
  
  $PhotoUrl = getPhoto();
  createPhoto($PhotoUrl);

 ?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src='https://connect.facebook.net/en_US/all.js'></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<title>Antivirus Contra la Violencia de Género-Desinfectar-perfil</title>
</head>
<body style="background-color: rgb(50,50,50,0.3);" >
<div class="row" style="justify-content: center">
    <div class="col-sm-4" style="background-color: black">
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
			<div class="row">
				<div class="col-sm-12 col-xs-12">
					<img class="puas" src="img/grafico puas   .png" alt="">
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 col xs-12">
					<div class="espacio">

					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 col-xs-12" style="padding-right: 0px; padding-left: 0px;">
					<div class="contendor-inferior">
						<div class="contenedor-img ">
							<img class="img-principal" src="img/bg_grafico_logo_antivirus..png" alt="antivirus amnistia internacional">

							<div class="con-perfil">
								<div class="perfil">
									<!--img id="PhotoPerfil" src="foto-pefil" alt="foto de perfil"-->
								</div>
							</div>
						</div>
						<div class="cont-btn-7">
							<div class="cont-titulo">
									<h1 class="titulo-7" style="text-align: center;">has desinfectado tu perfil</h1>
							</div>
							<h2 class="eliminado"><span id="ContadorXD">00</span> Mensajes eliminados</h2>
							<p class="texto-7">comparte el antivirus con tus amigos, juntos podemos exterminar la violencia de género
							</p>
							<div class="con-logos-7">
								<img class="logos-7" src="img/logo amnistia-internacional-negro.png" alt="logo amnistia internacional ">
								<img class="logos-7" src="img/logo vivan las mujeres-violeta.png" alt="logo vivan las mujeres">
							</div>
							<form action="">
								<input class="boton" id="MyShareBtn" type="button" value="Compartir">
							</form>
						</div>
					</div>

				</div>
			</div>
		</div>
		</div>
</div>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
     <script>
     window.addEventListener('load', () => {
         setTimeout(tiempo_carga, 2000);
         function tiempo_carga(){
         document.getElementById('carga').className ='hide'
         document.getElementById('contenido').className =''

         }
     })
     </script>

  <script>
    window.fbAsyncInit = function() {
      FB.init({
        appId            : '587772308373095',
        autoLogAppEvents : true,
        xfbml            : true,
        version          : 'v3.2'
      });
    };
  </script>
  <script async defer src="https://connect.facebook.net/en_US/sdk.js"></script>

  <script>
  document.getElementById('MyShareBtn').onclick = function() {
    console.log("entro");
    FB.ui({
      method: 'share',
      display: 'popup',
	  hashtag: '#JuntasHastaLaVida',
      href: 'https://www.facebook.com/PixelesMuertosStudio/photos/a.1678876739074501/1769905816638259/',
    }, function(response){});
  }
  </script>
	<script>
	function order(){
	  $("#PhotoPerfil").appendTo(".perfil");
	  //$("#Contador").appendTo("#ContadorXD");

	}
	order();
	</script>
	<script>
			console.log(localStorage.getItem("DelatedPosts"));
			console.log(isNaN(localStorage.getItem("DelatedPosts")));
			if(isNaN(localStorage.hasOwnProperty('User')) || localStorage.getItem('User') == null){
				localStorage.setItem("User", "0");
			}
			if(isNaN(localStorage.hasOwnProperty('DelatedPosts')) || localStorage.getItem('DelatedPosts') == null){
				localStorage.setItem("DelatedPosts", "0");
				console.log(1);
			}
			console.log(localStorage.getItem("DelatedPosts"));
			console.log(isNaN(localStorage.getItem("DelatedPosts")));
	</script>
	<script>
		
		document.getElementById("ContadorXD").innerHTML = localStorage.getItem("DelatedPosts");
	</script>
	
</body>
</html>
