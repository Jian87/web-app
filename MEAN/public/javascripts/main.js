$(document).ready(function(){

	$.ajax({
		method:'GET',
		url: 'api/videos',
		success: function(videos){
			$.each(videos, function(i, video){
				$("#videolist").append('<li style="list-style-type:none; float:left; padding: 16px"><img src="../images/'+ video._id +'.jpg" style="width: 200px; height: 200px"><br>' + video.title + '</li>');
			});
		},
		error: function(){
			alert("Error loading videos");
		}

	});
})
