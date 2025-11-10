<?php 
// Get current page URL 
$job_link_url = get_field('link');
// echo $job_link_url;
$socialiconURL = $job_link_url;
// echo $socialiconURL;

// Get current page title
$socialiconTitle = str_replace( ' ', '%20', get_the_title());

// Get Post Thumbnail for pinterest
$socialiconThumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );

// Construct sharing URL without using any script
$twitterURL = 'https://twitter.com/intent/tweet?text='.$socialiconTitle.'&amp;url='.$socialiconURL.'&amp;via=socialicon';
$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$socialiconURL;
// $bufferURL = 'https://bufferapp.com/add?url='.$socialiconURL.'&amp;text='.$socialiconTitle;
$whatsappURL = 'whatsapp://send?text='.$socialiconTitle . ' ' . $socialiconURL;
$linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$socialiconURL.'&amp;title='.$socialiconTitle;
$pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$socialiconURL.'&amp;media='.$socialiconThumbnail[0].'&amp;description='.$socialiconTitle;
?>

<div class="socialicon-social">

        <a class="socialicon-link socialicon-twitter" href="<?php echo $twitterURL; ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a>
        <a class="socialicon-link socialicon-facebook" href="<?php echo $facebookURL; ?>" target="_blank"><i class="fa fa-facebook-official" aria-hidden="true"></i> Facebook</a>
        <a class="socialicon-link socialicon-whatsapp" href="<?php echo $whatsappURL; ?>" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i> WhatsApp</a>
        <a class="socialicon-link socialicon-buffer" href="mailto:?subject=<?php _e( 'Check out this job listing at Menzies LLP', 'menziestheme'); ?>" target="_blank"><i class="fa fa-envelope" aria-hidden="true"></i> Email</a>
        <a class="socialicon-link socialicon-linkedin" href="<?php echo $linkedInURL; ?>" target="_blank"><i class="fa fa-linkedin-square" aria-hidden="true"></i> LinkedIn</a>
        <a class="socialicon-link socialicon-pinterest" href="<?php echo $pinterestURL; ?>" data-pin-custom="true" target="_blank"><i class="fa fa-pinterest-square" aria-hidden="true"></i> Pin It</a>

</div>