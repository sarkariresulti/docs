<?php wp_enqueue_media(); ?> //add this in head section

<script>
	jQuery("#btn_click").on("click",function(){
		var images = wp.media = ({
			title:"Upload Image",
			multiple:true
		}).open()).on("select",function(e){
			var  uploadImages = images.state().get()("selection");
			var selectedImages = uploadImages.toJSON();
			
			jQuery.each(selectedImages,function(index,image){
				console.log(image);
			});
		});
	});
</script>


