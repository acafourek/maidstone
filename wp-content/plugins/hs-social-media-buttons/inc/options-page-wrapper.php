<?php 
    if ( ! defined( 'ABSPATH' ) ) {
        echo "Hi there! Nice try. Come again.";
        die();
    }
?>
<div class="wrap">

    <div id="icon-options-general" class="icon32"></div>
    <h2><?php _e('HS Social Media Buttons','hs-social'); ?></h2>

    <div id="poststuff">

        <div id="post-body" class="metabox-holder columns-2">

            <!-- main content -->
            <div id="post-body-content">

                <div class="meta-box-sortables ui-sortable">

                    <?php if (!isset($pos_lr) || $pos_lr == ''): ?>

                        <div class="postbox">

                            <h3><span><?php _e("Add Your Social Media URL's","hs-social"); ?></span></h3>
                            <div class="inside">

                                <form name="hssocial_form" method="post" action="">							

                                    <input type="hidden" name="hssocial_form_submitted" value="Y">

                                    <table class="form-table" cellpadding="5" cellspacing="5">
                                        <tr>
                                            <td>
                                                <label for="hssocial_facebook"><?php _e('Facebook URL','hs-social'); ?></label>
                                            </td>
                                            <td>
                                                <input name="hssocial_facebook" id="hssocial_facebook" type="text" value="" class="regular-text" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="hssocial_linkedin"><?php _e('Linkedin URL','hs-social'); ?></label>
                                            </td>
                                            <td>
                                                <input name="hssocial_linkedin" id="hssocial_linkedin" type="text" value="" class="regular-text" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="hssocial_twitter"><?php _e('Twitter URL','hs-social'); ?></label>
                                            </td>
                                            <td>
                                                <input name="hssocial_twitter" id="hssocial_twitter" type="text" value="" class="regular-text" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="hssocial_youtube"><?php _e('Youtube URL','hs-social'); ?></label>
                                            </td>
                                            <td>
                                                <input name="hssocial_youtube" id="hssocial_youtube" type="text" value="" class="regular-text" />
                                            </td>
                                        </tr>								
                                        <tr>
                                            <td>
                                                <label for="hssocial_google"><?php _e('Google+ URL','hs-social'); ?></label>
                                            </td>
                                            <td>
                                                <input name="hssocial_google" id="hssocial_google" type="text" value="" class="regular-text" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="hssocial_pintrest"><?php _e('Pinterest URL','hs-social'); ?></label>
                                            </td>
                                            <td>
                                                <input name="hssocial_pintrest" id="hssocial_pintrest" type="text" value="" class="regular-text" />
                                            </td>
                                        </tr>
										<tr>
                                            <td>
                                                <label for="hssocial_ur_web"><?php _e('Your Website URL','hs-social'); ?></label>
                                            </td>
                                            <td>
                                                <input name="hssocial_ur_web" id="hssocial_ur_web" type="text" value="" class="regular-text" />
                                            </td>
                                        </tr>
										<tr>
                                            <td>
                                                <label for="hssocial_mail"><?php _e('Your Email Address','hs-social'); ?></label>
                                            </td>
                                            <td>
                                                <input name="hssocial_mail" id="hssocial_mail" type="text" value="" class="regular-text" />
                                            </td>
                                        </tr>
										<tr>
                                            <td>
                                                <label for="hssocial_skype"><?php _e('Skype ID','hs-social'); ?></label>
                                            </td>
                                            <td>
                                                <input name="hssocial_skype" id="hssocial_skype" type="text" value="" class="regular-text" />
                                            </td>
                                        </tr>
										<tr>
                                            <td>
                                                <label for="hssocial_instagram"><?php _e('Instagram URL','hs-social'); ?></label>
                                            </td>
                                            <td>
                                                <input name="hssocial_instagram" id="hssocial_instagram" type="text" value="" class="regular-text" />
                                            </td>
                                        </tr>
										<tr>
                                            <td>
                                                <label for="hssocial_flickr"><?php _e('Flickr URL','hs-social'); ?></label>
                                            </td>
                                            <td>
                                                <input name="hssocial_flickr" id="hssocial_flickr" type="text" value="" class="regular-text" />
                                            </td>
                                        </tr>
										<tr>
                                            <td>
                                                <label for="hssocial_xing"><?php _e('Xing URL','hs-social'); ?></label>
                                            </td>
                                            <td>
                                                <input name="hssocial_xing" id="hssocial_xing" type="text" value="" class="regular-text" />
                                            </td>
                                        </tr>
										<tr>
                                            <td>
                                                <label for="hssocial_flickr"><?php _e('Tumblr URL','hs-social'); ?></label>
                                            </td>
                                            <td>
                                                <input name="hssocial_tumblr" id="hssocial_tumblr" type="text" value="" class="regular-text" />
                                            </td>
                                        </tr>										
                                    </table>
                                    <table cellpadding="5" cellspacing="5">
                                        <tr>
                                            <td colspan="2">
                                                <strong><label ><?php _e('Social Media Setting','hs-social'); ?></label></strong>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>
                                                <label><?php _e('Select Social Media Buttons Position','hs-social'); ?></label>
                                            </td>
                                            <td>
                                                <select name="pos_lr"> 
                                                    <option value="r"><?php _e('Right ','hs-social'); ?></option>
                                                    <option value="l"><?php _e('Left ','hs-social'); ?></option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="hssocial_pintrest"><?php _e('Social Media Buttons Margin From Top','hs-social'); ?></label>
                                            </td>
                                            <td>
                                                <input name="top_px" id="top_px" type="text" value="" class="small-text" />px
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label><?php _e('Select Social Media Buttons Effect','hs-social'); ?></label>
                                            </td>
                                            <td>
                                                <select name="effect_bt"> 
                                                    <option value="easeOutQuad"><?php _e('easeOutQuad','hs-social'); ?></option>
                                                    <option value="easeOutElastic"><?php _e('easeOutElastic','hs-social'); ?> </option>
                                                    <option value="easeOutCirc"><?php _e('easeOutCirc','hs-social'); ?></option>
                                                    <option value="easeOutExpo"><?php _e('easeOutExpo','hs-social'); ?></option>
                                                </select>
                                            </td>
                                        </tr>
										<tr>
                                            <td>
                                                <label><?php _e('Hide in Mobile Devices (max-width: 640px)','hs-social'); ?></label>
                                            </td>
                                            <td>
                                                <input name="mobile" id="mobile" value="1" type="checkbox" class="hide_mobile"/>
                                            </td>											
                                        </tr>
                                        <tr>
                                            <td>

                                                <input class="button-primary" type="submit" name="hssocial_submit" value="Save" /> 
                                            </td></tr>

                                    </table>

                                </form>

                            </div> <!-- .inside -->

                        </div> <!-- .postbox -->

                    <?php else: ?>



                    <?php endif; ?>
                    <?php if (isset($pos_lr) && $pos_lr != ''): ?>

                        <div class="postbox">
                            <h3><span><?php _e("Update Your Social Media URL's","hs-social"); ?></span></h3>
                            <div class="inside">

                                <form name="hssocial_form" method="post" action="" id="hssocial_form">						

                                    <input type="hidden" name="hssocial_form_submitted" value="Y">

                                    <table class="update-social-icon" cellpadding="5" cellspacing="5">
                                        <tr><td>
                                                <label for="hssocial_facebook"><?php _e('Facebook URL','hs-social'); ?></label>
                                            </td>
                                            <td>
                                                <input name="hssocial_facebook" id="hssocial_facebook" type="text" value="<?php echo $hssocial_facebook; ?>" class="regular-text" />
                                            </td>
											<td></td>
										</tr>
                                        <tr>
                                            <td>
                                                <label for="hssocial_linkedin"><?php _e('Linkedin URL','hs-social'); ?></label>
                                            </td>
                                            <td>
                                                <input name="hssocial_linkedin" id="hssocial_linkedin" type="text" value="<?php echo $hssocial_linkedin; ?>" class="regular-text" />
                                            </td>
											<td></td>
                                        </tr>
                                        <tr><td>
                                                <label for="hssocial_twitter"><?php _e('Twitter URL','hs-social'); ?></label>
                                            </td>
                                            <td>
                                                <input name="hssocial_twitter" id="hssocial_twitter" type="text" value="<?php echo $hssocial_twitter; ?>" class="regular-text" />
                                            </td>
											<td></td>
										</tr>	
                                        <tr><td>
                                                <label for="hssocial_youtube"><?php _e('Youtube URL','hs-social'); ?></label>
                                            </td>
                                            <td>
                                                <input name="hssocial_youtube" id="hssocial_youtube" type="text" value="<?php echo $hssocial_youtube; ?>" class="regular-text" />
                                            </td>
											<td></td>
										</tr>	
                                        <tr><td>
                                                <label for="hssocial_google"><?php _e('Google+ URL','hs-social'); ?></label>
                                            </td>
                                            <td>
                                                <input name="hssocial_google" id="hssocial_google" type="text" value="<?php echo $hssocial_google; ?>" class="regular-text" />
                                            </td>
											<td></td>
										</tr>	
                                        <tr><td>
                                                <label for="hssocial_pintrest"><?php _e('Pinterest URL','hs-social'); ?></label>
                                            </td>
                                            <td>
                                                <input name="hssocial_pintrest" id="hssocial_pintrest" type="text" value="<?php echo $hssocial_pintrest; ?>" class="regular-text" />
                                            </td>
											<td></td>
                                        </tr>
										<tr>
                                            <td>
                                                <label for="hssocial_ur_web"><?php _e('Your Website URL','hs-social'); ?></label>
                                            </td>
                                            <td>
                                                <input name="hssocial_ur_web" id="hssocial_ur_web" type="text" value="<?php echo $hssocial_ur_web; ?>" class="regular-text" />
                                            </td>
											<td></td>
                                        </tr>
										<tr>
                                            <td>
                                                <label for="hssocial_mail"><?php _e('Your Email Address','hs-social'); ?></label>
                                            </td>
                                            <td>
                                                <input name="hssocial_mail" id="hssocial_mail" type="text" value="<?php echo $hssocial_mail; ?>" class="regular-text" />
                                            </td>
											<td></td>
                                        </tr>
										<tr>
                                            <td>
                                                <label for="hssocial_skype"><?php _e('Skype ID','hs-social'); ?></label>
                                            </td>
                                            <td>
                                                <input name="hssocial_skype" id="hssocial_skype" type="text" value="<?php echo $hssocial_skype; ?>" class="regular-text" />
                                            </td>
											<td></td>
                                        </tr>
										<tr>
                                            <td>
                                                <label for="hssocial_instagram"><?php _e('Instagram URL','hs-social'); ?></label>
                                            </td>
                                            <td>
                                                <input name="hssocial_instagram" id="hssocial_instagram" type="text" value="<?php echo $hssocial_instagram; ?>" class="regular-text" />
                                            </td>
											<td></td>
                                        </tr>
										<tr>
                                            <td>
                                                <label for="hssocial_flickr"><?php _e('Flickr URL','hs-social'); ?></label>
                                            </td>
                                            <td>
                                                <input name="hssocial_flickr" id="hssocial_flickr" type="text" value="<?php echo $hssocial_flickr; ?>" class="regular-text" />
                                            </td>
											<td></td>
                                        </tr>
										<tr>
                                            <td>
                                                <label for="hssocial_xing"><?php _e('Xing URL','hs-social'); ?></label>
                                            </td>
                                            <td>
                                                <input name="hssocial_xing" id="hssocial_xing" type="text" value="<?php echo $hssocial_xing; ?>" class="regular-text" />
                                            </td>
											<td></td>
                                        </tr>
										<tr>
                                            <td>
                                                <label for="hssocial_flickr"><?php _e('Tumblr URL','hs-social'); ?></label>
                                            </td>
                                            <td>
                                                <input name="hssocial_tumblr" id="hssocial_tumblr" type="text" value="<?php echo $hssocial_tumblr; ?>" class="regular-text" />
                                            </td>
											<td></td>
                                        </tr>
                                    </table>
                                    <table cellspacing="5" cellpadding="5" class="setting-social-button">
                                        <tr><td colspan="100%">
                                                <strong><label ><?php _e('Social Media Setting','hs-social'); ?></label></strong>
                                            </td>
                                        <tr><td>
                                                <label><?php _e('Select Social Media Buttons Position','hs-social'); ?></label>
                                            </td>
                                            <td>
                                                <select name="pos_lr"> 
                                                    <option value="r" <?php selected($pos_lr, 'r'); ?>><?php _e('Right','hs-social'); ?> </option>
                                                    <option value="l" <?php selected($pos_lr, 'l'); ?>><?php _e('Left','hs-social'); ?> </option>
                                                </select>
                                            </td>
                                        <tr><td>
                                                <label><?php _e('Social Media Buttons Margin From Top','hs-social'); ?></label>
                                            </td>
                                            <td>
                                                <input name="top_px" id="top_px" type="text" value="<?php echo $top_px; ?>" class="small-text" />px
                                            </td>											
                                        </tr>
                                        <tr>
                                            <td>
                                                <label><?php _e('Select Social Media Buttons Effect','hs-social'); ?></label>
                                            </td>
                                            <td>
                                                <select name="effect_bt"> 
                                                    <option value="easeOutQuad" <?php selected($effect_bt, 'easeOutQuad'); ?>><?php _e('easeOutQuad','hs-social'); ?></option>
                                                    <option value="easeOutElastic" <?php selected($effect_bt, 'easeOutElastic'); ?>><?php _e('easeOutElastic','hs-social'); ?> </option>
                                                    <option value="easeOutCirc" <?php selected($effect_bt, 'easeOutCirc'); ?>><?php _e('easeOutCirc','hs-social'); ?></option>
                                                    <option value="easeOutExpo" <?php selected($effect_bt, 'easeOutExpo'); ?>><?php _e('easeOutExpo','hs-social'); ?></option>
                                                </select>
                                            </td>											
                                        </tr>										
                                        <tr>
                                            <td>
                                                <label><?php _e('Hide in Mobile Devices (max-width: 640px)','hs-social'); ?></label>
                                            </td>
                                            <td>
                                                <input name="mobile" id="mobile" value="1" type="checkbox" class="hide_mobile" <?php if($mobile == 1){echo 'checked';} ?> />
                                            </td>											
                                        </tr>
                                        <tr>
                                            <td> <input class="button-primary" type="submit" name="hssocial_facebook_submit" value="Update" />  </td></tr></table>
                                </form>
								
                            </div> <!-- .inside -->

                        </div> <!-- .postbox -->
                    <?php endif; ?>
                </div> <!-- .meta-box-sortables .ui-sortable -->

            </div> <!-- post-body-content -->

            <!-- sidebar -->
            <div id="postbox-container-1" class="postbox-container">

                <div class="meta-box-sortables">

                    <div class="postbox">

                        <h3><span><?php _e('About Company','hs-social'); ?></span></h3>
                        <div class="inside">
                            <a href="http://heliossolutions.in/" target="_blank"><img src="<?php echo plugins_url( 'images/cmp_logo.png', dirname(__FILE__) ); ?>"></a>
                            <p ><?php _e('Helios Solution is an Indian IT outsourcing company who works on many IT technologies such as wordpress, magento, joomla, drupal, opencart, cakephp, .NET etc ','hs-social'); ?></p>
                        </div> <!-- .inside -->

                    </div> <!-- .postbox -->

                </div> <!-- .meta-box-sortables -->

            </div> <!-- #postbox-container-1 .postbox-container -->

        </div> <!-- #post-body .metabox-holder .columns-2 -->

        <br class="clear">
    </div> <!-- #poststuff -->

</div> <!-- .wrap -->