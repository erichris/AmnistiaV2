<?php
  function getPosts($PostIds, $PostMessage){
    require "Amnistia/config.php";

    try {
      // Returns a `Facebook\FacebookResponse` object
      $response = $fb->get('me?fields=id,name,posts.limit(100){message,id}', $_SESSION['fb_access_token']);
    } catch(Facebook\Exceptions\FacebookResponseException $e) {
      echo 'Graph returned an error: ' . $e->getMessage();
      exit;
    } catch(Facebook\Exceptions\FacebookSDKException $e) {
      echo 'Facebook SDK returned an error: ' . $e->getMessage();
      exit;
    }

    $user = $response->getGraphUser();

    $filter = ["dVd", "obvio", "agotar"];
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
    print("<div id='Contador'><h1 id='PostTotales'>" . count($PostIds) . "</h1></div>");
    for($i = 0; $i < count($PostIds); $i++) {
      $link = "http://facebook.com/" . $PostIds[$i];
      $message =  substr($PostMessage[$i], 0, 20);
      print("<div class='PostElement'><a class='PostList' href=\"" . $link . "\" target=\"popup\" onclick=\"window.open('$link','popup','width=800,height=600'); return false;\">" . $message . "</br></a></div>");
    }
  }
  
  

  $PostIds = [];
  $PostMessage = [];
  $Answer = getPosts($PostIds, $PostMessage);
  $PostIds = $Answer[0];
  $PostMessage = $Answer[1];
  createList($PostIds, $PostMessage);

 ?>
