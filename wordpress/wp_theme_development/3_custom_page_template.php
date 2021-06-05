
For Creating Custom Template : 
------------------------------

<?php /* Template Name: Example Template */ ?>


Using Conditional Tags in Page Templates : 
------------------------------------------
You can make smaller, page-specific changes with Conditional Tags in your theme’s page.php file.    
example: header-home.php , header-about.php . 


<?php 
    if ( is_front_page() ) :
    get_header( 'home' );
    elseif ( is_page( 'About' ) ) :
    get_header( 'about' );
    else:
    get_header();
    endif;
?>


Note: 
-----
If your template uses the `body_class() `function, WordPress will print classes in the body tag 

<body class="page page-id-6 page-template-default">
    
</body>