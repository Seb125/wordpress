<?php
get_header();
while (have_posts()) {
    the_post();
    pageBanner();
    ?>

    <div class="container container--narrow page-section">
        <div class="metabox metabox--position-up metabox--with-home-link">
            <p>
                <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('program'); ?>"><i
                        class="fa fa-home" aria-hidden="true"></i> All Programs</a> <span class="metabox__main">
                    <?php the_title(); ?></span>
            </p>
        </div>
        <div class="generic-content">
            <?php the_content(); ?>
        </div>
        <?php
        $today = date('Ymd');
        $homepageEvents = new WP_Query(
            array(
                "posts_per_page" => -1,
                "post_type" => "event",
                'meta_key' => 'event_date',
                'orderby' => 'meta_value_num',
                'order' => 'DESC',
                'meta_query' => array(
                    array(
                        'key' => 'event_date',
                        'compare' => '>=',
                        'value' => $today,
                        'type' => 'numeric'
                    ),
                    array(
                        'key' => 'related_programs',
                        'compare' => 'LIKE',
                        'value' => '"' . get_the_ID() . '"',
                    )
                )
            )
        );
        echo $homepageEvents->post_count;
        while ($homepageEvents->have_posts()) {
            $homepageEvents->the_post();
            get_template_part('template-parts/event');

       }

        ?>
    </div>
    <?php
}
get_footer();
?>


<h1> <?php bloginfo("description"); ?> </h1>