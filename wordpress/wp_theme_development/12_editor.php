<!-- code for wp_editor -->
<?php wp_editor('', 'about_me'); ?>


=============================================   create wordpress editor ====================================================

	<?php wp_editor("","description_id"); ?>  //for creating editor 
	// for featching content
	var description = encodeURIComponent(tinyMCE.get("description_id").getContent());  // fetching editor content
	
	<?php 	htmlspecialchars(description);?>   // this function convert all special character into string 
	
	
