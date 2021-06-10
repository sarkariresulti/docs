//===================================

<script>
 jQuery(document).ready(function(){

		jQuery(".page-id-149 .et_pb_button_module_wrapper .et_pb_bg_layout_dark").on('click',function(e) {
			e.preventDefault();
		   jQuery('html, body').animate({
		        'scrollTop' : jQuery("#contact-form-product-b").position().top
		    });

		});	
});


// Get Image base64 url  
var mycanvas = document.getElementById("sig-canvas"); 
var image    = mycanvas.toDataURL("image/png");

</script>


