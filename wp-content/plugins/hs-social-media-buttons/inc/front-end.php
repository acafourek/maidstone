<?php
if ( ! defined( 'ABSPATH' ) ) {
    echo "Hi there! Nice try. Come again.";
    die();
}

$options = get_option('hssocial_badges');

$hssocial_facebook = '';
$hssocial_linkedin = '';
$hssocial_twitter = '';
$hssocial_google = '';
$hssocial_pintrest = '';
$hssocial_youtube = '';
$hssocial_ur_web = '';
$hssocial_mail = '';
$hssocial_skype = '';
$hssocial_instagram = '';
$hssocial_flickr = '';
$hssocial_xing = '';
$hssocial_tumblr = '';
$pos_lr = '';
$top_px = '';
$effect_bt = '';

if ($options != '') {
		
	if(isset($options['hssocial_facebook'])){
		$hssocial_facebook = $options['hssocial_facebook'];
	}
	if(isset($options['hssocial_linkedin'])){
		$hssocial_linkedin = $options['hssocial_linkedin'];
	}
	if(isset($options['hssocial_twitter'])){
		$hssocial_twitter = $options['hssocial_twitter'];
	}
	if(isset($options['hssocial_google'])){
		$hssocial_google = $options['hssocial_google'];
	}
	if(isset($options['hssocial_pintrest'])){
		$hssocial_pintrest = $options['hssocial_pintrest'];
	}
	if(isset($options['hssocial_youtube'])){
		$hssocial_youtube = $options['hssocial_youtube'];
	}
	if(isset($options['hssocial_ur_web'])){
		$hssocial_ur_web = $options['hssocial_ur_web'];
	}
	if(isset($options['hssocial_mail'])){
		$hssocial_mail = $options['hssocial_mail'];
	}
	if(isset($options['hssocial_skype'])){
		$hssocial_skype = $options['hssocial_skype'];
	}
	if(isset($options['hssocial_instagram'])){
		$hssocial_instagram = $options['hssocial_instagram'];
	}
	if(isset($options['hssocial_flickr'])){
		$hssocial_flickr = $options['hssocial_flickr'];
	}
	if(isset($options['hssocial_xing'])){
		$hssocial_xing = $options['hssocial_xing'];
	}
	if(isset($options['hssocial_tumblr'])){
		$hssocial_tumblr = $options['hssocial_tumblr'];
	}	
	if(isset($options['pos_lr'])){
		$pos_lr = $options['pos_lr'];
	}
	if(isset($options['top_px'])){
		$top_px = $options['top_px'];
	}
	if(isset($options['effect_bt'])){
		$effect_bt = $options['effect_bt'];
	}
}
?>
<div class="social-icons" style="top:<?php echo $top_px; ?>px;">
    <?php if ($hssocial_facebook): ?>
        <a class="socialitems" target="_blank" href="<?php echo esc_url($hssocial_facebook); ?>" id="facebook-btn">
            <span  class="social-icon">
                <span class="social-text"><?php _e('Follow via Facebook','hs-social'); ?></span>
            </span>
        </a>
    <?php endif; ?>
    <?php if ($hssocial_linkedin): ?>
        <a class="socialitems" target="_blank" href="<?php echo esc_url($hssocial_linkedin); ?>" id="linkedin-btn">
            <span  class="social-icon">
                <span class="social-text"><?php _e('Follow via Linkedin','hs-social'); ?></span>
            </span>
        </a>
    <?php endif; ?>
    <?php if ($hssocial_twitter): ?>
        <a class="socialitems" target="_blank" href="<?php echo esc_url($hssocial_twitter); ?>" id="twitter-btn">
            <span  class="social-icon">
                <span class="social-text"><?php _e('Follow via Twitter','hs-social'); ?></span>
            </span>
        </a>
    <?php endif; ?>
    <?php if ($hssocial_youtube): ?>
        <a class="socialitems" target="_blank" href="<?php echo esc_url($hssocial_youtube); ?>" id="youtube-btn">
            <span  class="social-icon">
                <span class="social-text"><?php _e('Follow via Youtube','hs-social'); ?></span>
            </span>
        </a>
    <?php endif; ?>
    <?php if ($hssocial_google): ?>
        <a class="socialitems" target="_blank" href="<?php echo esc_url($hssocial_google); ?>" id="google-btn">
            <span  class="social-icon">
                <span class="social-text"><?php _e('Follow via Google','hs-social'); ?></span>
            </span>
        </a>
    <?php endif; ?>
    <?php if ($hssocial_pintrest): ?>
        <a class="socialitems" target="_blank" href="<?php echo esc_url($hssocial_pintrest); ?>" id="pintrest-btn">
            <span  class="social-icon">
                <span class="social-text"><?php _e('Follow via Pinterest','hs-social'); ?></span>
            </span>
        </a>
    <?php endif; ?>
	<?php if ($hssocial_instagram): ?>
        <a class="socialitems" target="_blank" href="<?php echo esc_url($hssocial_instagram); ?>" id="instagram-btn">
            <span  class="social-icon">
                <span class="social-text"><?php _e('Follow via Instagram','hs-social'); ?></span>
            </span>
        </a>
    <?php endif; ?>
	<?php if ($hssocial_flickr): ?>
        <a class="socialitems" target="_blank" href="<?php echo esc_url($hssocial_flickr); ?>" id="flickr-btn">
            <span  class="social-icon">
                <span class="social-text"><?php _e('Follow via Flickr','hs-social'); ?></span>
            </span>
        </a>
    <?php endif; ?>
	<?php if ($hssocial_xing): ?>
        <a class="socialitems" target="_blank" href="<?php echo esc_url($hssocial_xing); ?>" id="xing-btn">
            <span  class="social-icon">
                <span class="social-text"><?php _e('Follow via Xing','hs-social'); ?></span>
            </span>
        </a>
    <?php endif; ?>
	<?php if ($hssocial_tumblr): ?>
        <a class="socialitems" target="_blank" href="<?php echo esc_url($hssocial_tumblr); ?>" id="tumblr-btn">
            <span  class="social-icon">
                <span class="social-text"><?php _e('Follow via Tumblr','hs-social'); ?></span>
            </span>
        </a>
    <?php endif; ?>
	<?php if ($hssocial_ur_web): ?>
        <a class="socialitems" target="_blank" href="<?php echo esc_url($hssocial_ur_web); ?>" id="web-btn">
            <span  class="social-icon">
                <span class="social-text"><?php _e('Go to','hs-social'); ?></span>
            </span>
        </a>
    <?php endif; ?>
	<?php if ($hssocial_mail): ?>
        <a class="socialitems" href="mailto:<?php echo $hssocial_mail; ?>" id="mail-btn">
            <span  class="social-icon">
                <span class="social-text"><?php _e('Mail to','hs-social'); ?></span>
            </span>
        </a>
    <?php endif; ?> 

	<?php if ($hssocial_skype): ?>
        <a class="socialitems" href="skype:<?php echo $hssocial_skype; ?>?call" id="skype-btn">		
            <span  class="social-icon">
                <span class="social-text"><?php _e('Skype Call','hs-social'); ?></span>
            </span>
        </a>		
    <?php endif; ?>

</div>

<script>
    $mtkb(window).load(function(){
        $mtkb('.social-icons .social-icon').mouseenter(function(){
            $mtkb(this).stop();
            $mtkb(this).animate({width:'160'}, 500, '<?php echo $effect_bt; ?>',function(){});
        });
        $mtkb('.social-icons .social-icon').mouseleave(function(){
            $mtkb(this).stop();
            $mtkb(this).animate({width:'43'}, 500, '<?php echo $effect_bt; ?>',function(){});
        });
    });
</script>