$(document).ready(function(){

// if the user clicks on the like button ...
$('.like-btn').on('click', function(){
  var post_id = $(this).data('id');
  $clicked_btn = $(this);
  if ($clicked_btn.hasClass('fa-thumbs-o-up')) {
  	action = 'like';
  }
  $.ajax({
  	url: 'index.php',
  	type: 'post',
  	data: {
  		'action': action
  	},
  	success: function(data){
  		
  	}
  });		

});

// if the user clicks on the dislike button ...
$('.dislike-btn').on('click', function(){
  var post_id = $(this).data('id');
  $clicked_btn = $(this);
  if ($clicked_btn.hasClass('fa-thumbs-o-down')) {
  	action = 'dislike';
  }
  $.ajax({
  	url: 'index.php',
  	type: 'post',
  	data: {
  		'action': action
  	},
  	success: function(data){
  		
  	}
  });	

});

});