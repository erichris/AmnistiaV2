
function removePosts() {
  var cont = document.getElementById("Contador");
  cont.remove();
  var elem = document.getElementsByClassName("PostList");
  $j = elem.length;

  for (i = 0; i < $j; i++) {
    elem[0].remove();
  }
}

setInterval(function(){
  checkForChanges(); // after every 2 secs check
  function checkForChanges(){
    var posts = document.getElementById("PostTotales").textContent; // reset the old value now to the new one, so during next check we should have our myVar changed.
    console.log(posts);
    if(posts == 0){
      console.log( "No more posts!" );
      //document.getElementById("ButtonContinue").style.display = "block";
      document.getElementById("ButtonContinue").disabled = false;
    }else{
      console.log( "Delate all of them" );
      //document.getElementById("ButtonContinue").style.display = "none";
      document.getElementById("ButtonContinue").disabled = true;
    }
  }
},1000);

function order(){
  $(".PostList").appendTo("#PostContainer");
  //$("#PostTotales").appendTo("#Contador");

}

function refresh(){
    removePosts();
	  $('#PostContainer').load('posts.php');
}

$( document ).ready(function() {
    console.log( "ready!" );
    refresh();
    order();
});

$(window).focus(function() {
   refresh();
});
