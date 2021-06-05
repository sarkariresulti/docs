
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

function ask_question_fun(){
    #do your stuff
    print_r($_POST);
    wp_die();
}

add_action('wp_ajax_ask_question', 'ask_question_fun'); //Fires authenticated Ajax actions for logged-in users.
add_action('wp_ajax_nopriv_ask_question', 'ask_question_fun'); //Fires non-authenticated Ajax actions for logged-out users.



<script>
    // check property true
     if(jQuery(this).prop("checked") == true){
				var available     =  jQuery("#available").val();
            }else if(jQuery(this).prop("checked") == false){
               var available     = '';
            }   


maxDate: "6D"
//date picker set specific date from to 
    $('#datepicker').datepicker({
                   minDate : new Date(2019,5,5),
        maxDate: new Date(2019,5,12)
        });
</script>


<script>
$(document).ready(function(){
	$(".main_ul li").hover(
  function () {
    //$(this).addClass("active");
		var className = $(this).attr('class');
  },
  function () {
    $(this).removeClass("active");
  }
);
	
});

</script>