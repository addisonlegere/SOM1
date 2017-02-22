<article <?php post_class('post clearfix'); ?>>
<<<<<<< HEAD
	<?php if(has_post_thumbnail()) { ?>
	<div class="column fivecol post-image">
		<div class="bordered-image thick-border">
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('normal'); ?></a>
		</div>
	</div>
	<div class="post-content column sevencol last">
	<?php } else { ?>
	<div class="post-content">
	<?php } ?>
=======
	<!-- CHECKS IF IS SEARCH PAGE TO KEEP THUMBNAIL SIZE SMALLER 2.9.16 AL -->
		<?php if( is_search() ) { ?>
			<?php if(has_post_thumbnail()) { ?>
				
			<div class="column fourcol post-image">
				<div class="bordered-image thick-border">
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('normal'); ?></a>
				</div>
			</div>
			<div class="post-content column eightcol last">
			<?php } else { ?>
			<div class="post-content">
			<?php } ?>
		<?php } else { ?>
			<?php if(has_post_thumbnail()) { ?>
				
			<div class="column fivecol post-image">
				<div class="bordered-image thick-border">
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('normal'); ?></a>
				</div>
			</div>
			<div class="post-content column sevencol last">
			<?php } else { ?>
			<div class="post-content">
			<?php } ?>
		<?php } ?>
		<!-- END SEARCH PAGE CHECK -->
>>>>>>> master
		<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		<?php 
		if(isset($GLOBALS['content'])) {
			echo $GLOBALS['content'];
		} else {
			the_excerpt();
		}
		?>
		<footer class="post-footer">
			<a href="<?php the_permalink(); ?>" class="element-button small"><?php _e('Read More','academy'); ?></a>
			<?php if(comments_open()) { ?>
			<div class="post-comment-count"><?php comments_number('0','1','%'); ?></div>
			<?php } ?>
			<?php if(!ThemexCore::checkOption('post_date')) { ?>
			<time class="post-date nomargin" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time(get_option('date_format')); ?></time>
			<?php } ?>
			<?php if(!ThemexCore::checkOption('post_author')) { ?>
			<div class="post-author">&nbsp;<?php _e('by', 'academy'); ?> <?php the_author_posts_link(); ?></div>
			<?php } ?>
		</footer>
	</div>
</article>