<?php 
get_header(); 

$layout=ThemexCore::getOption('posts_layout', 'right');
if($layout=='left') {
?>
<aside class="sidebar column fourcol">
<?php get_sidebar(); ?>
</aside>
<div class="column eightcol last">
<?php } else if($layout=='right') { ?>
<div class="column eightcol">
<?php } else { ?>
<div class="fullwidth-section">
<?php } ?>
	<?php the_post(); ?>
	<!-- THIS CHECKS IF THE USER IS LOGGED IN - AKL -->
	<?php if ( is_user_logged_in() ) { ?>
		<article class="single-post">
			<?php if(has_post_thumbnail() && !ThemexCore::checkOption('post_image')) { ?>
			<div class="post-image">
				<div class="bordered-image thick-border">
					<?php the_post_thumbnail('extended'); ?>
				</div>
			</div>
			<?php } ?>
			<div class="post-content">
				
				<h1><?php the_title(); ?></h1>
				<?php the_content(); ?>
				<footer class="post-footer">
					<div class="sixcol column">
						<?php if(comments_open()) { ?>
						<div class="post-comment-count"><?php comments_number('0','1','%'); ?></div>
						<?php } ?>
						<?php if(!ThemexCore::checkOption('post_date')) { ?>
						<time class="post-date nomargin" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time(get_option('date_format')); ?></time>
						<?php } ?>
						<?php if(!ThemexCore::checkOption('post_author')) { ?>
						<div class="post-author nomargin">&nbsp;<?php _e('by', 'academy'); ?> <?php the_author_posts_link(); ?>&nbsp;<?php _e('in', 'academy'); ?>&nbsp;</div>
						<?php } ?>
						<div class="post-categories"><?php the_category(', '); ?></div>
					</div>
					<div class="sixcol column last">
						<div class="tagcloud"><?php the_tags('','',''); ?></div>
					</div>
				</footer>
			</div>
		</article>
		<?php comments_template(); ?>
	<?php } else { ?>
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
		</div>
		<div class="column sixcol last">
			<h1>Sign Up</h1>
			<p>sign up by purchasing a <a href="/all-courses/">course.</a></p>
		</div>
		<div class="clear"></div>
	<?php } ?>	
</div>
<?php if($layout=='right') { ?>
<aside class="sidebar column fourcol last">
<?php get_sidebar(); ?>
</aside>
<?php } ?>
<?php get_footer(); ?>