<?php
  function getPosts($PostIds, $PostMessage){
    require "Amnistia/config.php";

    try {
      // Returns a `Facebook\FacebookResponse` object
      $response = $fb->get('me?fields=id,name,posts.limit(250){message,id}', $_SESSION['fb_access_token']);
    } catch(Facebook\Exceptions\FacebookResponseException $e) {
      echo 'Graph returned an error: ' . $e->getMessage();
      exit;
    } catch(Facebook\Exceptions\FacebookSDKException $e) {
      echo 'Facebook SDK returned an error: ' . $e->getMessage();
      exit;
    }

    $user = $response->getGraphUser();

    $filter = ["Perra","Zorra","Golfa","Ramera","Prostituta","Culona","Culote","Culo","Culito","Cogerte","Metértela","Rogona","Mujerzuela","Resbalosa","Golosa","Nalgas","Deberías morirte","Lagartona","Histérica","Bruja","Piruja","Feminazi","Puta","Hembra","Mojigata","Trepadora","Vieja","Mantenida","Gata","Arrastrada","Facilota","Naca","Nalga pronta","Gorda","Pinche","Buscona","Loca","Mandona","Apretada","Chichona","Tetas"];
    //$filter = ["Perra","Puta","Golfa"];
	$PostIds = [];
    $PostMessage = [];
    for($i = 0; $i < count($user["posts"]); $i++) {
      //print($user["posts"][$i]);
      $message = "";
      $id = "";

      if(!isset($user["posts"][$i]["message"])){
        continue;
      }

      $message = $user["posts"][$i]["message"];
      $id = $user["posts"][$i]["id"];
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
    return [$PostIds, $PostMessage];
  }


  function createList($PostIds, $PostMessage){
    for($i = 0; $i < count($PostIds); $i++) {
      $link = "http://facebook.com/" . $PostIds[$i];
      $message =  substr($PostMessage[$i], 0, 20);
	  print("<div class='PostElement'>
	  <a class='ancler-post PostList' href='" . $link . "'target=\"popup\" onclick=\"window.open('$link','popup','width=800,height=600'); return false;\">
							<div class='post'>
								<div class='col-sm-1 col-xs-1 con-img-post'>
									<img src='img/foto-perfil.jpg' alt='' class='foto-public'>
								</div>
								<div class='col-sm-11 col-xs-11'>
									<span class='nombre-publi' >Chris Corona</span>
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
  createList($PostIds, $PostMessage);

 ?>
