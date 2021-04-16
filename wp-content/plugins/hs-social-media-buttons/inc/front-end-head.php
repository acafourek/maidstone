<?php
if ( ! defined( 'ABSPATH' ) ) {
    echo "Hi there! Nice try. Come again.";
    die();
}
$options = get_option('hssocial_badges');
$hide_mobile = 0;
if ($options != '' && isset($options['mobile'])){
	$hide_mobile = $options['mobile'];
}
?>
<!--[if IE]>
<style>
   .social-icon {
    background-color: #33353B;
    background-image: url('<?php echo plugins_url( 'images/social-icons.png', dirname(__FILE__) ); ?>'); 
}

</style>
<![endif]-->
<?php global $is_opera;
if ($is_opera == "yes") : ?>
    <style>
        .social-icon {
            background-color: #33353B;
            background-image: url('<?php echo plugins_url( 'images/social-icons.png', dirname(__FILE__) ); ?>'); 
        }
    </style>    
<?php endif; ?>
<?php 
if($hide_mobile == 1):
?> 
    <style>
        @media (max-width:640px){
            .social-icon {
                display: none;
            }
        }
    </style>  
<?php endif; ?>