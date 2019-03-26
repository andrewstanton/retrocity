<?php
if(has_post_thumbnail()):
    $thumb_url = "";
    $thumb_id = get_post_thumbnail_id();
    $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
    $thumb_url = $thumb_url_array[0];
?>

<?php 
    if(is_home() || is_front_page()) 
    {
        $indexClass = 'content-banner--index';
    }
    else 
    {
        $indexClass = 'content-banner--internal';
    }
?>

<section class="content-banner <?php echo $indexClass; ?>">
    <div class="content-banner_blur" style="background-image: url('<?php echo $thumb_url; ?>');"></div>
    <div class="content-banner_image">
        <img src="<?php echo $thumb_url; ?>" />
    </div>
</section>

<?php endif; ?>