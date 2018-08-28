<?php
/**
 * The template for displaying posts
 *
 * @package kale
 */
?>
<?php get_header(); ?>

<?php
$kale_posts_meta_show = kale_get_option('kale_posts_meta_show');
$kale_posts_date_show = kale_get_option('kale_posts_date_show');
$kale_posts_category_show = kale_get_option('kale_posts_category_show');
$kale_posts_author_show = kale_get_option('kale_posts_author_show');
$kale_posts_tags_show = kale_get_option('kale_posts_tags_show');
$kale_posts_sidebar = kale_get_option('kale_posts_sidebar');
$kale_posts_featured_image_show = kale_get_option('kale_posts_featured_image_show');
$kale_sidebar_size = kale_get_option('kale_sidebar_size');
$kale_posts_posts_nav_show = kale_get_option('kale_posts_posts_nav_show');

?>
<?php while ( have_posts() ) : the_post(); ?>
<!-- Two Columns -->
<div class="row">

    <!-- My Post Layout -->
    <div class="main-column col-md-12">
        <div id="post-<?php the_ID(); ?>" <?php post_class('entry entry-post'); ?>>
            <div class="entry-header">
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="workHeroContainer" style="background-image: url(<?php the_field('thumbnail'); ?>);">
                        <h1 class="entry-title"><?php the_field('project_intro'); ?></h1>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="uxProblem">
                        <?php the_field('project_problem'); ?>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="uxProblem">
                        <?php the_field('project_solution'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End my layout -->


</div>
<!-- /Two Columns -->
        
<?php endwhile; ?>
<hr />

<?php get_footer(); ?>