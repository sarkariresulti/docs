
Theme folder and file structure #
====================================================================

assets (dir)
      - css (dir)
      - images (dir)
      - js (dir)
inc (dir)
template-parts (dir)
      - footer (dir)
      - header (dir)
      - navigation (dir)
      - page (dir)
      - post (dir)
404.php
archive.php
comments.php
footer.php
front-page.php
functions.php
header.php
index.php
page.php
README.txt
rtl.css
screenshot.png
search.php
searchform.php
sidebar.php
single.php
style.css

======================================



$format = get_post_format() ? : 'standard';
Example 1  : aside , chat ,gallery ,link , image , quote , status , video , audio

template-parts/
        content-aside.php
        content-chat.php
        content-gallery.php
        content-link.php
        content-image.php
        content-quote.php
        content-status.php
        content-video.php
        content-audio.php
        content.php
        index.php 

Example 2 : 
----------

<?php 
    $args = array( 'section_title' => 'hello world' );
    get_template_part( 'template-parts/file', 'name', $args );
?>


In your template part.
......................
<h2><?php echo __( $args['section_title'] ); ?></h2>
Output:
.......

<h2>hello world</h2>




===================================== page structure for page =============================================

get_template_part('template-parts/content'); //content.php

get_post_format();  // ye return karega Like : Aside , Link , gallery 

get_template_part('template-parts/content',get_post_format()); //content-aside.php
get_template_part('template-parts/content',get_post_format()); //content-link.php
get_template_part('template-parts/content',get_post_format()); //content-galery.php


========================================  Priority  Index  =======================================

link: https://developer.wordpress.org/themes/basics/template-hierarchy/

Home Page display :
------------------ 
home.php > index.php


Front Page display :
-------------------
front-page.php  > home.php > page.php > index.php 


Privacy Policy Page display : 
----------------------------
privacy-policy.php > page.php  > singular.php >  index.php

1. privacy-policy.php
2. custom template file 
3. page-{slug}.php
4. page-{id}.php
5. page.php
6. singular.php
7. index.php


Single Post :
------------
single-{post-type}-{slug}.php > page-{slug}.php > page-{id}.php > page.php > singular.php > index.php 

1. single-{post-type}-{slug}.php
2. single-{post-type}.php 
3. single.php
4. singular.php
5. index.php


Category :
---------
category-{slug}.php >  category-{id}.php > category.php > archive.php > index.php

1. category-{slug}.php
2. category-{id}.php 
3. category.php
4. archive.php
5. index.php

Tag :
---- 
tag-{slug}.php > tag-{id}.php > tag.php >  archive.php >  index.php 

1. tag-{slug}.php 
2. tag-{id}.php
3. tag.php
4. archive.php
5. index.php


Custom Taxonomies : 
------------------
taxonomy-{taxonomy}-{term}.php > taxonomy-{taxonomy}.php  > taxonomy.php  > archive.php > index.php

1. taxonomy-{taxonomy}-{term}.php
2. taxonomy-{taxonomy}.php 
3. taxonomy.php
4. archive.php
5. index.php


Custom Post Types :
-------------------
archive-{post_type}.php > archive.php > index.php

1. archive-{post_type}.php
2. archive.php 
3. index.php

Author display :
---------------
author-{nicename}.php  > author-{id}.php > author.php > archive.php >  index.php

1. author-{nicename}.php 
2. author-{id}.php
3. author.php
4. archive.php
5. index.php

Date :
-----
date.php > archive.php > index.php 

1. date.php
2. archive.php
3. index.php


Search Result :
--------------
search.php  > index.php

1. search.php
2. index.php


404 (Not Found) :
----------------
404.php > index.php

1. 404.php
2. index.php


Attachment :
------------
{MIME-type}.php > attachment.php > single-attachment-{slug}.php > single-attachment.php > single.php > singular.php  index.php

1. {MIME-type}.php
2. attachment.php
3. single-attachment-{slug}.php
4. single-attachment.php
5. single.php 
6. singular.php
7. index.php



Embeds : 
-------
embed-{post-type}-{post_format}.php  > embed-{post-type}.php  > embed.php

1. embed-{post-type}-{post_format}.php 
2. embed-{post-type}.php 
3. embed.php


Non-ASCII Character Handling : 
------------------------------
page-hello-world-😀.php > page-hello-world-%f0%9f%98%80.php > page-6.php > page.php > singular.php

1. page-hello-world-😀.php
2. page-hello-world-%f0%9f%98%80.php
3. page-6.php
4. page.php
5. singular.php
