<?php
/**
 * Email Footer
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/email-footer.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates/Emails
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) 
	exit; // Exit if accessed directly

global $data;

// Load colours
// $base = get_option( 'woocommerce_email_base_color' );

// $text_lighter_20 = wc_hex_lighter($text, 20);
// $base_lighter_40 = wc_hex_lighter( $base, 40 );


$benny_hinn_bible_study_email_footer = get_stylesheet_directory_uri() . "/images/benny_hinn_bible_study_email_footer.jpg";




// For gmail compatibility, including CSS styles in head/body are stripped out therefore styles need to be inline. These variables contain rules which are added to the template inline.
// $template_footer = "
//     border-top:0;
//     -webkit-border-radius:6px;
//         -webkit-border-top-left-radius:0px !important;
//     -webkit-border-top-right-radius:0px !important;
//         background-color: $text_lighter_20;
// ";

// $social_footer = "
//     border:0;
//     color: #ffffff;
//     background-color: #455564;
//     padding-bottom: 0px;
//     font-family: Arial;
//     font-size:12px;
//     line-height:125%;
//     text-align:right;
//         background-image: url('$benny_hinn_bible_study_email_footer');
// }
// ";

// $credit = "
//     border:0;
//     color: $base_lighter_40;
//     font-family: Arial;
//     font-size:12px;
//     line-height:125%;
//     text-align:center;
// ";


?>
															</div>
														</td>
                                                    </tr>
                                                </table>
                                                <!-- End Content -->
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- End Body -->
                                </td>
                            </tr>
                        	<tr>
                            	<td align="center" valign="top">
                                    <!-- Footer -->
                                	<table border="0" cellpadding="10" cellspacing="0" width="600" id="template_footer">
                                    	<tr>
                                        	<td valign="top">
                                                <table border="0" cellpadding="10" cellspacing="0" width="100%">
                                                   <td style="height: 145px;">
                                                    <a href="https://give.church/dw7i42j"><img style="display: block;" src="<?php echo esc_url($benny_hinn_bible_study_email_footer); ?>" alt="<?php echo get_bloginfo('name'); ?>" /></a>
                                                     </td>
                                                     </tr>
                                                    <tr>
                                                        <td colspan="2" valign="middle" id="credit" style="padding: 10px 48px 10px 48px;border: 0;color: #fff;font-family: Arial;font-size: 12px;line-height: 125%;text-align: center;background-color: #455564;">
                                                        	<?php echo wpautop( wp_kses_post( wptexturize( apply_filters( 'woocommerce_email_footer_text', get_option( 'woocommerce_email_footer_text' ) ) ) ) ); ?>
                                                        </td>
                                                    </tr>
                                                     <tr>
                                                  
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- End Footer -->
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </body>
</html>
