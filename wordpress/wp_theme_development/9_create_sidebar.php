=============================================== creating Sidebar for Theme ===============================

// Register a Sidebar 
function register_mani_first_sidebar(){
    register_sidebar(array(
        'name'=>__('Primary Sidebar','theme_name'),
        'id'=>'sidebar-1',
        'before_widget'=>'<aside id="%1$s" class="%2$s"',
        'after_widget'=>'</aside>',
        'before_title'=>'<h1 class="widget-title">',
        'after_title'=>'</h1>',
    ));
}
add_action('widgets_init','register_mani_first_sidebar');


<!-- For Checking Sidebar is active or not  -->
<?php if(is_active_sidebar('sidebar-1')): ?>
		<div class="first_sidebar">
			<!-- Display Sidebar  -->
			<?php dynamic_sidebar('sidebar-1'); ?>
		</div>
<?php endif; ?>	



add_action( 'widgets_init', 'wpdocs_register_widgets' );
 
function wpdocs_register_widgets() {
    register_widget( 'My_Widget' );
}