<?php
/*
Template Name: Profile Details
*/
?>
<?php get_header(); ?>
<<<<<<< HEAD
<div class="user-profile">
	<?php if(ThemexUser::isProfile()) { ?>
	<?php get_template_part('template', 'profile'); ?>
	<?php } else { ?>
	<div class="column twocol">
		<div class="bordered-image thick-border">
			<?php echo get_avatar(ThemexUser::$data['active_user']['ID'], 200); ?>
		</div>
		<?php get_template_part('module', 'links'); ?>
	</div>
	<div class="column fivecol">
		<h1><?php echo ThemexUser::$data['active_user']['profile']['full_name']; ?></h1>
		<div class="signature"><?php echo ThemexUser::$data['active_user']['profile']['signature']; ?></div>
		<?php if(ThemexForm::isActive('profile')) { ?>
		<table class="user-fields">
			<?php 
			ThemexForm::renderData('profile', array(
				'edit' => false,
				'before_title' => '<tr><th>',
				'after_title' => '</th>',
				'before_content' => '<td>',
				'after_content' => '</td></tr>',
			), ThemexUser::$data['active_user']['profile']);
			?>
		</table>
		<?php } ?>
		<?php echo ThemexUser::$data['active_user']['profile']['description']; ?>
	</div>
	<?php } ?>
	<?php if(!ThemexCore::checkOption('profile_courses') || ThemexUser::isProfile()) { ?>
	<?php get_sidebar('profile-right'); ?>
	<?php } ?>
</div>
=======

<?php if(is_user_logged_in()) { ?>
	<div class="user-profile">
		<?php if(ThemexUser::isProfile()) { ?>
			<?php get_template_part('template', 'profile'); ?>
		<?php } else { ?>
		<div class="column twocol">
			<div class="bordered-image thick-border">
				<?php echo get_avatar(ThemexUser::$data['active_user']['ID'], 200); ?>
			</div>
			<?php get_template_part('module', 'links'); ?>
		</div>
		<div class="column fivecol viewer-profile">
			<h1><?php echo ThemexUser::$data['active_user']['profile']['full_name']; ?></h1>
			<div class="signature"><?php echo ThemexUser::$data['active_user']['profile']['signature']; ?></div>
			<?php if(ThemexForm::isActive('profile')) { ?>
			<table class="user-fields">
				<?php 
				ThemexForm::renderData('profile', array(
					'edit' => false,
					'before_title' => '<tr><th>',
					'after_title' => '</th>',
					'before_content' => '<td>',
					'after_content' => '</td></tr>',
				), ThemexUser::$data['active_user']['profile']);
				?>
			</table>
			<?php } ?>
			<?php echo ThemexUser::$data['active_user']['profile']['description']; ?>
		</div>
		<?php } ?>
		<?php if(!ThemexCore::checkOption('profile_courses') || ThemexUser::isProfile()) { ?>
		<?php get_sidebar('profile-right'); ?>
		<?php } ?>
	</div>
	<?php // BELOW IS ON FILES template-profile-settings.php, template-profile-links.php, author.php, woocommerce/myaccount/my-account.php, and woocommerce/myaccount/view-order.php ?>
	<hr>
	<div class="checkout-cert"><a href="/all-courses/" class="element-button secondary">Enroll in an Additional Course! | Click Here</a><a href="/donate-now/" class="element-button">Donate Now</a></div>
<?php } else { ?>
	<div class="user-profile test7">
		<p>Log in  or sign up for a course to view this content.</p>
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
					<a href="#" class="element-button submit-button left"><span class="button-icon login"></span><?php _e('Sign In','academy'); ?></a>
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
		<div class="column sixcol last">
			<h1>Sign Up</h1>
			<p>sign up by purchasing a <a href="/all-courses/">course.</a></p>
		</div>
		<div class="clear"></div>
	</div>
	<hr>
	<div class="checkout-cert"><a href="/all-courses/" class="element-button secondary">Enroll In A Course | Click Here</a><a href="/donate-now/" class="element-button">Donate Now</a></div>
<?php } ?>

>>>>>>> master
<?php get_footer(); ?>