<!-- SEARCH PAGE CREATED BY AL 2.9.16 CONTENT GRABBED FROM index AND PULLED CONTENT FILES ELSE STATEMENT MODIFIED TO RID SIDEBAR -->
<?php 
if(get_query_var('course_category')) { ?>
	<?php

get_header();

$layout=ThemexCore::getOption('courses_layout', 'fullwidth');
$view=ThemexCore::getOption('courses_view', 'grid');
$columns=intval(ThemexCore::getOption('courses_columns', '4'));

if($layout=='left') {
?>
<aside class="sidebar fourcol column">
	<?php get_sidebar(); ?>
</aside>
<div class="eightcol column last">
<?php } else if($layout=='right') { ?>
<div class="eightcol column">
<?php } else { ?>
<div class="fullwidth-section">
<?php } ?>
	<?php echo category_description(); ?>
	<?php ThemexCourse::queryCourses(); ?>
	<?php if($view=='list') { ?>
	<div class="posts-listing clearfix">
	<?php
	while (have_posts()) {
		the_post();
		get_template_part('content', 'course-list');
	}
	?>
	</div>
	<?php } else { ?>
	<div class="courses-listing clearfix">
	<?php
	$counter=0;
	if(in_array($layout, array('left', 'right'))) {
		$columns=$columns-1;
	}
	
	if($columns==4) {
		$width='three';
	} else if($columns==3) {
		$width='four';
	} else {
		$width='six';
	}
		
	while (have_posts()) {
		the_post();
		$counter++;
		?>
		<div class="column <?php echo $width; ?>col <?php echo $counter==$columns ? 'last':''; ?>">
		<?php get_template_part('content', 'course-grid'); ?>
		</div>
		<?php
		if($counter==$columns) {
			$counter=0;
			echo '<div class="clear"></div>';
		}
	}
	?>
	</div>
	<?php } ?>
	<?php ThemexInterface::renderPagination(); ?>
</div>
<?php if($layout=='right') { ?>
<aside class="sidebar fourcol column test last">
	<?php get_sidebar(); ?>
</aside>
<?php } ?>
<?php get_footer(); ?>
<?php } else { ?>
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
<div class="fullwidth-section">
<?php } else { ?>
<div class="fullwidth-section">
<?php } ?>
	<?php echo category_description(); ?>
	<div class="posts-listing">
		<?php
		if(is_page()) {
			query_posts(array(
				'post_type' =>'post',
				'paged' => themex_paged(),
			));
		}
		
		if(have_posts()) {
			while(have_posts()) {
				the_post(); 
				get_template_part('content', 'post');
			} 
		} else {
		?>
		<h3><?php _e('No posts found. Try a different search?','academy'); ?></h3>
		<p><?php _e('Sorry, no posts matched your search. Try again with some different keywords.','academy'); ?></p>
		<?php } ?>		
	</div>
	<?php ThemexInterface::renderPagination(); ?>
</div>
<?php if($layout=='right') { ?>
<!-- <aside class="sidebar column test2 fourcol last">
	<?php //get_sidebar(); ?>
</aside> -->
<?php } ?>
<?php get_footer(); ?>
<?php }
?>
