
function removePosts() {
  //var cont = document.getElementById("Contador");
  //cont.remove();
  var elem = document.getElementsByClassName("PostList");
  $j = elem.length;

  for (i = 0; i < $j; i++) {
    elem[0].remove();
  }
}

setInterval(function(){
  checkForChanges(); // after every 2 secs check

  function checkForChanges(){
	var x = document.getElementById("PostContainer").childElementCount;
    //var posts = document.getElementById("PostTotales").textContent; // reset the old value now to the new one, so during next check we should have our myVar changed.
    console.log(x);
    if(x == 0){
      //document.getElementById("ButtonContinue").style.display = "block";
      //document.getElementById("ButtonContinue").disabled = false;
    }else{
      //document.getElementById("ButtonContinue").style.display = "none";
      //document.getElementById("ButtonContinue").disabled = true;
    }
  }
},1000);

function order(){
  $(".PostList").appendTo("#PostContainer");
  //$("#Contador").appendTo("#ContadorXD");

}

function refresh(){
    removePosts();
	
	document.getElementById('carga').className ='';
    document.getElementById('contenido').className ='hide';
	
	var userLang = navigator.language || navigator.userLanguage; 
	if(userLang.includes("es")){
		$('#PostContainer').load('posts.php');
	}else{
		$('#PostContainer').load('posts.php');
		//$('#PostContainer').load('posts_en.php');
	}
	
	
	
	
	
}

setInterval(function() {
	var x = document.getElementById("PostContainer").childElementCount;
	document.getElementById("ContadorXD").innerHTML = x;
	
    document.getElementById('carga').className ='hide';
    document.getElementById('contenido').className ='';
}, 4000);

$( document ).ready(function() {
    console.log( "ready!" );
    refresh();
    order();
});

$(window).focus(function() {
   refresh();
});
