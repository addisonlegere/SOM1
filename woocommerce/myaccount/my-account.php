<?php
/*
@version 3.0.0
*/

if(!defined('ABSPATH')) {
    exit;
}
<<<<<<< HEAD

do_action('woocommerce_account_content');
=======
?>
<div class="user-profile">
	<?php get_sidebar('profile-left'); ?>
	<div class="column fivecol">
		<?php wc_print_notices(); ?>
		<?php do_action( 'woocommerce_before_my_account' ); ?>
		<?php wc_get_template( 'myaccount/my-downloads.php' ); ?>
		<?php wc_get_template( 'myaccount/my-orders.php', array('order_count' => $order_count)); ?>
		<?php do_action( 'woocommerce_after_my_account' ); ?>
	</div>
	<?php get_sidebar('profile-right'); ?>
</div>
<?php // BELOW IS ON FILES template-profile-settings.php, template-profile-links.php, author.php, woocommerce/myaccount/my-account.php, and woocommerce/myaccount/view-order.php ?>
<hr>
<div class="checkout-cert"><a href="/all-courses/" class="element-button secondary">Enroll in an Additional Course! | Click Here</a><a href="/donate-now/" class="element-button">Donate Now</a></div>
>>>>>>> master
