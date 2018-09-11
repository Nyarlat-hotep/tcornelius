<?php
/**
 * The template for displaying pages
 *
 * @package kale
 */
?>
<?php get_header(); ?>

<?php 
$kale_pages_sidebar = kale_get_option('kale_pages_sidebar'); 
$kale_sidebar_size = kale_get_option('kale_sidebar_size');

$kale_pages_featured_image_show = 'Default';
$kale_page_meta = get_post_meta(get_the_ID(),'_page_options_meta',TRUE);
if($kale_page_meta) {
    $kale_pages_featured_image_show = $kale_page_meta['featured_image'];
    if($kale_pages_featured_image_show == '' || empty($kale_pages_featured_image_show)) $kale_pages_featured_image_show = 'Default';
} 
?>

<?php while ( have_posts() ) : the_post(); ?>

<?php 
if($kale_pages_featured_image_show == 'Banner' && has_post_thumbnail()) {
    ?>
    <!-- Featured Image (Banner) -->
    <div class="internal-banner">
        <?php 
        $src = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'kale-slider' ) ;
		if ($src)$featured_image = $src[0]
        ?>
        <img src="<?php echo esc_url($featured_image) ?>" alt="<?php the_title_attribute(); ?>" />
        
        <div class="caption">
        
            <?php $title = get_the_title(); ?>
            <?php if($title == '') { ?>
            <h1 class="entry-title"><?php _e('Page ID: ', 'kale'); the_ID(); ?></h1>
            <?php } else { ?>
            <h1 class="entry-title"><?php the_title(); ?></h1>
            <?php } ?>
            
        </div>
    </div>
    <!-- /Featured Image (Banner) -->
<?php } ?>

<!-- Two Columns -->
<div class="row two-columns">
    <!-- Main Column -->
    <?php if($kale_pages_sidebar == 1) { ?>
    <div class="main-column col-md-12">
    <?php } else { ?>
    <div class="main-column col-md-12">
    <?php } ?>
        
        <!-- Page Content -->
        <div id="page-<?php the_ID(); ?>" <?php post_class('entry entry-page'); ?>>
        
            <?php if($kale_pages_featured_image_show == 'Default' && has_post_thumbnail()) { ?>
                <div class="entry-thumb"><?php the_post_thumbnail( 'full', array( 'alt' => get_the_title(), 'class'=>'img-responsive' ) ); ?></div>
            <?php } ?>
            
            
            <?php if($kale_pages_featured_image_show != 'Banner') { ?>
            <?php $title = get_the_title(); ?>
            <?php if($title == '') { ?>
            <h1 class="entry-title"><?php esc_html_e('Page ID: ', 'kale'); the_ID(); ?></h1>
            <?php } else { ?>
            <h1 class="entry-title"><?php the_title(); ?></h1>
            <?php } ?>
            <?php } ?>


            <div class="page-content"><?php the_content(); ?></div>

            <!-- UX Gallery -->
            <?php 
                $args = array(
                    'post_type'       => 'coded_work',
                    'orderby'         => 'title',
                    'order'           => 'ASC',
                    'posts_per_page'  => -1,
                );

                $the_query = new WP_Query( $args );
            ?>
            
                <?php 
                    $start_row = true;
                    $counter   = 0;
                ?>

                <div class="container-fluid">
                <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                

                <?php if ($start_row) {
                    $start_row = false; ?>
                    <div class="row row-eq-height">
                <?php } ?>
                <?php $counter++; ?>    
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="code-work-teaser <?php echo get_post_field('post_name'); ?>" style="background: url(<?php the_field('thumbnail'); ?>);">
                                <a href="<?php echo the_field('work_link'); ?>" target="_blank">
                                    <div class="code-work-teaser-img" style="background: url(<?php the_field('code_example'); ?>);"></div>
                                </a>
                            </div>
                        </div>
                    
                <?php if ($counter === 3) {
                    $counter   = 0;
                    $start_row = true; ?>
                    </div> <!-- end row -->
                <?php } ?>    
                
                <?php endwhile; else: ?>

                <?php endif; wp_reset_postdata(); ?>
                </div> <!-- end container fluid -->
             
            <!--  -->
            
        
        <!-- /Page Content -->
        
        <!-- Page Comments -->
        <?php if ( comments_open() ) : ?>
        <hr />
        <?php comments_template(); ?>
        <?php endif; ?>  
        <!-- /Page Comments -->  
        
    </div>
    <!-- /Main Column -->

    

    <!-- </div> -->
</div>
<!-- /Two Columns -->

<?php endwhile; ?>
<hr />

<?php get_footer(); ?>