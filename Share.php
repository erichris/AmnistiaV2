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

	$urlPic = $user["picture"]["url"];
    
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
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src='https://connect.facebook.net/en_US/all.js'></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	
	<title>Antivirus Contra la Violencia de Género-Desinfectar-perfil</title>
	
	
	
</head>
<body style="background-color: rgb(50,50,50,0.3);" >
    <div class="container" style="background-color: black">
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
                                <h1 class="titulo-7">has desinfectado tu perfil</h1>
                        </div>
                        <h2 class="eliminado"><span>00</span> Mensaje eliminados</h2>
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
	</script
</body>
</html>
