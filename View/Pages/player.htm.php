<!--
 @autor Rainer Siebrandt
 @version 1.0
-->
<div class="container">
    <button class="btn btn-primary col-sm-12" type="button" data-toggle="collapse" data-target="#collapsePlaylist" aria-expanded="false" aria-controls="collapseExample">
    	Playlist anzeigen
	</button>

    <div class="collapse" id="collapsePlaylist">
      <div class="card card-body">
      	<link href="../View/css/videolist.css" rel="stylesheet">
       	<?php CreateVideoList($_REQUEST["pid"]);?>
      </div>
	</div>
</div>
<div class="container">
	<div class="embed-responsive embed-responsive-16by9">
    	<video class="embed-responsive-item" controls autoplay>
        	<source type="video/mp4" src="data:video/mp4;base64,
        	<?php 
        	if(isset($_REQUEST["vid"])) LoadPlayerSource($_REQUEST["vid"]);
        	?>">
        	Your browser does not support the video tag.
        </video>
	</div>
	<div class="row">
		<?php if(isset($_REQUEST["vid"])) LoadVideoStats($_REQUEST["vid"]);?>
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