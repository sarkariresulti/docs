<?php

/**
 * Template Name: Home Template
 **/
?>


<?php get_header(); ?>

<table>
    <thead>
        <th>ID</th>
        <th>Title </th>
    </thead>
    <tbody>

        <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array(
            'post_type' => 'employee_management',
            'posts_per_page' => 5,
            'paged' => $paged
        );
        
        $loop = new WP_Query($args);
        $totalPost = $loop->found_posts;
        $totalPages = $loop->max_num_pages;

        while ($loop->have_posts()) : $loop->the_post();
        ?>
            <tr>
                <td><?php the_ID(); ?></td>
                <td><?php the_title(); ?></td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<div class="pagination">
    <?php
    $big = 999999999;

    echo paginate_links(array(
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $totalPages,
        'prev_text' =>  __('Back', 'textdomain'),
        'next_text' =>  __('Onward', 'textdomain'),
        'mid_size'  => 5,
    ));

    ?>
</div>



<?php wp_reset_postdata(); ?>

<?php get_footer(); ?>