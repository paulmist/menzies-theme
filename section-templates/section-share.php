<?php 
// Get current page URL 
$socialiconURL = urlencode(get_permalink());

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

<a class="socialicon-link socialicon-linkedin" href="<?php echo $linkedInURL; ?>" target="_blank"></a>
<a class="socialicon-link socialicon-facebook" href="<?php echo $facebookURL; ?>" target="_blank"></a>


</div>