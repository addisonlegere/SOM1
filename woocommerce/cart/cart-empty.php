<?php
/**
 * Empty cart page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-empty.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

wc_print_notices();

?>

<p class="cart-empty">
	<?php _e( 'Your cart is currently empty.', 'woocommerce' ) ?>
</p>

<?php do_action( 'woocommerce_cart_is_empty' ); ?>

<p class="return-to-shop">
	<a class="button wc-backward" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
		<?php _e( 'Return To Shop', 'woocommerce' ) ?>
	</a>
</p>
<?php if(!is_user_logged_in()) { ?>
	<div class="user-profile">
		<hr/>
		<p>Already a member?</p>
		<div class="column sixcol">
			<h1>Sign In</h1>
			<div class="woocommerce">
				<form class="ajax-form formatted-form" action="<?php echo AJAX_URL; ?>" method="POST">
					<div class="message"></div>
					<div class="field-wrapper">
						<input type="text" name="user_login" placeholder="<?php _e('Username','academy'); ?>" />
					</div>
					<div class="field-wrapper">
						<input type="password" name="user_password" placeholder="<?php _e('Password','academy'); ?>" />
					</div>			
					<a href="#" class="element-button submit-button left" style="margin-left:10px;"><span class="button-icon login"></span><?php _e('Sign In','academy'); ?></a>
					<?php if(ThemexFacebook::isActive()) { ?>
					<a href="<?php echo ThemexFacebook::getURL(); ?>" title="<?php _e('Sign in with Facebook','academy'); ?>" class="element-button facebook-button left">
						<span class="button-icon facebook"></span>
					</a>
					<?php } ?>
					<div class="form-loader"></div>
					<input type="hidden" name="user_action" value="login_user" />
					<input type="hidden" name="user_redirect" value="<?php echo esc_attr(themex_value($_POST, 'user_redirect')); ?>" />
					<input type="hidden" name="nonce" class="nonce" value="<?php echo wp_create_nonce(THEMEX_PREFIX.'nonce'); ?>" />
					<input type="hidden" name="action" class="action" value="<?php echo THEMEX_PREFIX; ?>update_user" />
				</form>			
			</div>
			<br />
		</div> 
		<!-- <div class="column sixcol last">
			<h1>Sign Up</h1>
			<p>Sign up by purchasing a <a href="/all-courses/">course.</a></p>
		</div> -->
		<div class="clear"></div>
	</div>
<?php } ?>
