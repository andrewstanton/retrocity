<?php
if(has_post_thumbnail()):
    $thumb_url = "";
    $thumb_id = get_post_thumbnail_id();
    $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
    $thumb_url = $thumb_url_array[0];
?>

<?php if(is_home() || is_front_page()) {?>

<section class="content-banner" style="background-image: url('<?php echo $thumb_url; ?>');"></section>

<?php } 
    else { 
?>

<div class="entry-internal-thumbnail" style="background-image: url('<?php echo $thumb_url; ?>')"></div>

<?php } ?>

<?php endif; ?>