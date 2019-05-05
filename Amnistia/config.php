<?php
  session_start();
  require 'Facebook/autoload.php';
  $fb = new Facebook\Facebook([
    'app_id' => '587772308373095', // Replace {app-id} with your app id
    'app_secret' => 'acd86abc1bd330ead24408e5f85d4f74',
    'default_graph_version' => 'v3.2',
  ]);

?>
