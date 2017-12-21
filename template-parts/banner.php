<?php
if(has_post_thumbnail()):
    $thumb_url = "";
    $thumb_id = get_post_thumbnail_id();
    $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
    $thumb_url = $thumb_url_array[0];
?>
<section class="content-banner" style="background-image: url('<?php echo $thumb_url; ?>');">

    <?php if(has_excerpt()){ ?>
    <div class="banner-grid">
        <div class="banner-excerpt">

            <div class="excerpt-back">
                <?php echo get_the_excerpt(); ?>
            </div>
        
        </div>
    </div>
<?php } ?>

</section>

<?php endif; ?>