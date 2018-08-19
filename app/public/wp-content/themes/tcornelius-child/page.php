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

            <!-- Bio Information -->
            <div class="row two-columns">
                <div class="col-md-6">
                <?php if( get_field('image') ): ?>
                    <div class="bioImg">
                        <img src="<?php the_field('image'); ?>" />
                    </div>
                <?php endif; ?>
                </div>
                <div class="col-md-6">
                    <div class="bioDesc">
                        <h3><?php the_field('description'); ?></h3>
                        <div class="row three-columns">
                            <div class="col-md-4">
                                <div class="skill-1">
                                    <i class="fas fa-users"></i>
                                    <h3>UX Designer</h3>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="skill-1">
                                    <i class="fas fa-laptop-code"></i>
                                    <h3>Front-end Developer</h3>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="skill-1">
                                    <i class="fas fa-paint-brush"></i>
                                    <h3>Artist</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                
            
            
            <div class="page-content"><?php the_content(); ?></div>
            
        </div>
        <!-- /Page Content -->
        
        <!-- Page Comments -->
        <?php if ( comments_open() ) : ?>
        <hr />
        <?php comments_template(); ?>
        <?php endif; ?>  
        <!-- /Page Comments -->  
        
    </div>
    <!-- /Main Column -->

    

</div>
<!-- /Two Columns -->

<?php endwhile; ?>
<hr />

<?php get_footer(); ?>