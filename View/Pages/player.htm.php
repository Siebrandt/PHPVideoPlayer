<!--
 @autor Rainer Siebrandt
 @version 1.0
-->
<main role="main">

<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapsePlaylist" aria-expanded="false" aria-controls="collapseExample">
	Playlist anzeigen
</button>

<div class="collapse" id="collapsePlaylist">
  <div class="card card-body">
  	<link href="../View/css/videolist.css" rel="stylesheet">
   	<?php CreateVideoList($_REQUEST["pid"]);?>
  </div>
</div>	

<?php 
   /*if(isset($_SESSION['videoplayer'])){
       if($_SESSION['videoplayer'] == 'Default'){
           
           echo '<video width="80%" height="60%" controls>
           <source src="" type="video/mp4">
           Your browser does not support the video tag.
           </video>';
       }
   }*/

?>

</main>