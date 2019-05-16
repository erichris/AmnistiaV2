<?php
  function getPosts($PostIds, $PostMessage){
    require "Amnistia/config.php";

    try {
      // Returns a `Facebook\FacebookResponse` object
      $response = $fb->get('me?fields=id,name,picture,feed.limit(250){message,id}', $_SESSION['fb_access_token']);
    } catch(Facebook\Exceptions\FacebookResponseException $e) {
      echo 'Graph returned an error: ' . $e->getMessage();
      exit;
    } catch(Facebook\Exceptions\FacebookSDKException $e) {
      echo 'Facebook SDK returned an error: ' . $e->getMessage();
      exit;
    }

    $user = $response->getGraphUser();

    $filter = ["Perra ","Zorra ","Golfa ","Ramera ","Prostituta ","Culona ","Culote ","Culo ","Culito ","Cogerte ","Metértela ", 
	"Metertela ", "Rogona ","Mujerzuela ","Resbalosa ","Golosa ","Nalgas ","Deberías morirte", "Deberias morirte","Lagartona ","Histérica ", 
	"Histerica ","Bruja ","Piruja ","Feminazi ","Puta ","Hembra ","Mojigata ","Trepadora ","Vieja ","Mantenida ","Gata ","Arrastrada ","Facilota ",
	"Naca ","Nalga pronta","Gorda ","Pinche ","Buscona ","Loca ","Mandona ","Apretada ","Chichona ","Tetas ", "mujerzuelas ", "mierda ", "Piruja ", 
	"Marimacha ", "lencha ", "Suicidate ", "pendeja ", "siéntese señora", "sientese señora", "mensa ", "tonta ",
	"Bitch","Hoo","Whore","Slut","Prostitute","Witch","Cunt","Scum","Pussy","Tart","Frump","Chick","Tramp","Hooker","Hustler","Call girl","Skank","Cum dumpster","Cumhole","Vamp","Bimbo","Nympho","Hussy","Chippy","Twat","Harlot","Scratching","Thot","Fatt","Ass","Airhead","Horny","Ugly","Cheap","Hoe","Milf","Wet","Kinky","Squirt","Prude","Mistress","Busty"];
    //$filter = ["Perra","Puta","Golfa"];
	$PostIds = [];
    $PostMessage = [];
	$urlPic = $user["picture"]["url"];
	$userName = $user["name"];
    for($i = 0; $i < count($user["feed"]); $i++) {
      $message = "";
      $id = "";

      if(!isset($user["feed"][$i]["message"])){
        continue;
      }

      $message = $user["feed"][$i]["message"];
      $id = $user["feed"][$i]["id"];
      for($j = 0; $j < count($filter); $j++) {
        if (strpos(strtolower("| ".$message), strtolower(" ".$filter[$j])) == true) {
            array_push($PostIds, $id);
            array_push($PostMessage, $message);
            //print($filter[$j]. " existe en " . $message ."</br>");
        }else{
          //print($filter[$j]. " no existe en " . $message ."</br>");
        }
      }
    }
    return [$PostIds, $PostMessage, $urlPic, $userName];
  }


  function createList($PostIds, $PostMessage, $urlPic, $userName){
    for($i = 0; $i < count($PostIds); $i++) {
      $link = "http://facebook.com/" . $PostIds[$i];
      $message =  substr($PostMessage[$i], 0, 200);
	  print("<div class='PostElement'>
	  <a class='ancler-post PostList' href='" . $link . "'target=\"popup\" onclick=\"window.open('$link','popup','width=800,height=600'); return false;\">
							<div class='post'>
								<div class='col-sm-2 col-xs-1 con-img-post'>
									<img src='" . $urlPic . "' alt='' class='foto-public'>
								</div>
								<div class='col-sm-10 col-xs-11'>
									<span class='nombre-publi' >" .$userName ."</span>
									<p class='post-text'>" . $message . "</p>
								</div>
							</div>
						</a>
						</div>");
	  
	  
      //print("<div class='PostElement'><a class='PostList' href=\"" . $link . "\" target=\"popup\" onclick=\"window.open('$link','popup','width=800,height=600'); return false;\">" . $message . "</br></a></div>");
    }
	//print("<div id='Contador'><h1 id='PostTotales'>" . count($PostIds) . "</h1></div>");
    
  }
  
  

  $PostIds = [];
  $PostMessage = [];
  $Answer = getPosts($PostIds, $PostMessage);
  $PostIds = $Answer[0];
  $PostMessage = $Answer[1];
  $urlPic = $Answer[2];
  $userName = $Answer[3];
  createList($PostIds, $PostMessage, $urlPic, $userName);

 ?>
