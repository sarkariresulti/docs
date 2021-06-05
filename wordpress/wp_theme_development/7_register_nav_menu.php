function register_mani_menu_theme(){
    register_nav_menus(
        array(
            'primary-menu'=>__('Primary Menu'),
            'footer-menu'=>__('Footer Menu'),
            'maniCustom_menu'=>__('Mani Custom Menu'),
        )
    );
}
add_action( 'after_setup_theme', 'register_mani_menu_theme' );


Displaying : 
------------
------------

// checking nav menu exists or not 
<?php if ( has_nav_menu( 'maniCustom_menu' ) ) : ?>

<?php endif ?>



$args = array(
        'menu'            => '',
        'container'       => 'div',
        'container_class' => '',
        'container_id'    => '',
        'menu_class'      => 'menu',
        'menu_id'         => '',
        'echo'            => true,
        'fallback_cb'     => 'false',
        'before'          => '',
        'after'           => '',
        'link_before'     => '',
        'link_after'      => '',
        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        'item_spacing'    => 'preserve',
        'depth'           => 0,
        'walker'          => '',
        'theme_location'  => '',
    );
 wp_nav_menu($args);


========================================================= EXAMPLE ===================================================

    <?php 
			$args = array(
				'theme_location'  => 'primary-menu',
				'container'       => 'div',
				'items_wrap'      => '<ul id="%1$s" class="%2$s ">%3$s</ul>',
				'menu_class'      => 'nav navbar-nav',
				'link_after'           => '<i class="fa fa-angle-down"></i>',
			);
			
			
			//adding class in sub menu
			add_action('nav_menu_submenu_css_class', 'custom_submenu_css_class');
			function custom_submenu_css_class() {
				return array('dropdown-menu', 'sub-menu', 'test_sub_menu class-3');
			}
			
			
			// adding  class in li 
			add_filter( 'nav_menu_css_class', 'custom_add_item_label_as_class', 10, 3 );
			function custom_add_item_label_as_class( $classes, $item, $args ) {
				$classes[] = sanitize_title_with_dashes( $item->title );
				foreach($classes as $m_class){
					if($m_class == 'menu-item-has-children'){
						$classes[] = 'dropdown';
					}
				}
				return $classes;
			}
			
			//add class in anchor tag
			add_filter( 'nav_menu_link_attributes', 'nav_menu_anchor_as_class', 10, 3 );
			function nav_menu_anchor_as_class( $attr ) {
				$attr['class']='test_anchor_class';
			}
		
		wp_nav_menu($args);
	?>
	
	
	//create nav menu using locations
	
	$locationDetails  = get_nav_menu_location();
	$menuID			  = $locationDetails['header'];
	
	$primary_menu_items = wp_get_nav_menu_items($menuID);
	print_r($primary_menu_items);



	