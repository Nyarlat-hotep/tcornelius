<?php
/**
 * The template for displaying pages
 *
 * @package kale
 */
?>
<?php get_header(); ?>


<?php while ( have_posts() ) : the_post(); ?>

<div class="row">
    <div class="col-lg-12 col-md-12">

        <div class="page-content"><?php the_content(); ?></div>

        <?php $images = get_field('gallery'); ?>
        <?php if($images) { ?>
            <ul class="gallery">
                <?php foreach($images as $image) { ?>
                    <li class="galleryItem">
                        <a href="<?php echo $image['url']; ?>">
                            <img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />
                        </a>
                    </li>
               <?php } ?>
            </ul>
        <?php } ?>
    </div>
</div>

<?php endwhile; ?>
<hr />

<?php get_footer(); ?>