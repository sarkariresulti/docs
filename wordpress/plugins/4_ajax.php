// ============================================= add ajax call in    ===================================	
<script>
   jQuery(document).ready(function(){
	 jQuery("#continue").click(function(){ 
			  var phone 			 =  jQuery("#phone").val();
              
				jQuery.ajax({
			  method: "POST",
			  url: "<?php echo admin_url('admin-ajax.php') ?>",
			  data: { question_title: question_title, action:"ask_question" },
			  success:function(response) {
                alert(response);
                }
          });
	 });
	   
   });
</script>

<?php

function send_my_mail(){
        #do your stuff
}
add_action('wp_ajax_sendmail', 'send_my_mail');
add_action('wp_ajax_nopriv_sendmail', 'send_my_mail');


