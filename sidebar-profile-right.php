<<<<<<< HEAD
<aside class="fivecol column last">
	<?php 
	$courses=ThemexCourse::getCourses(ThemexUser::$data['active_user']['ID']);
	$plan=ThemexCourse::getPlan(ThemexUser::$data['active_user']['ID']);

	if(ThemexUser::isProfile() && !empty($plan)) {
	?>
	<h2 class="secondary">
		<?php
		if($plan['period']==0) {
			printf(__('"%s" subscription is active.', 'academy'), '<a href="'.$plan['url'].'">'.get_the_title($plan['ID']).'</a>');
		} else {
			printf(__('"%s" subscription expires in %s.', 'academy'), '<a href="'.$plan['url'].'">'.get_the_title($plan['ID']).'</a>', themex_time($plan['time'])); 
		}
		?>
	</h2>
	<?php } ?>
	<?php if(empty($courses)) { ?>
	<h2 class="secondary"><?php _e('No courses yet.', 'academy'); ?></h2>
	<?php } else { ?>
	<div class="user-courses-listing">
	<?php foreach($courses as $ID) { ?>
		<?php ThemexCourse::refresh($ID); ?>
		<div class="course-item <?php if(ThemexCourse::$data['progress']!=100){ ?>started<?php } ?>">
			<div class="course-title">
				<?php if(ThemexCourse::$data['author']['ID']==ThemexUser::$data['active_user']['ID']) { ?>
				<div class="course-status"><?php _e('Author', 'academy'); ?></div>
				<?php } ?>
				<h4 class="nomargin"><a href="<?php echo get_permalink($ID); ?>"><?php echo get_the_title($ID); ?></a></h4>
				<?php if(!in_array(ThemexCourse::$data['progress'], array(0, 100))) { ?>
				<div class="course-progress">
					<span style="width:<?php echo ThemexCourse::$data['progress']; ?>%;"></span>
				</div>
				<?php } ?>
			</div>
			<?php if(!ThemexCore::checkOption('course_rating')) { ?>
			<div class="course-meta">
				<?php get_template_part('module', 'rating'); ?>
			</div>
			<?php } ?>
		</div>
	<?php } ?>
	</div>
	<?php } ?>
=======
<aside class="fivecol column last">
	<?php 
	$courses=ThemexCourse::getCourses(ThemexUser::$data['active_user']['ID']);
	$plan=ThemexCourse::getPlan(ThemexUser::$data['active_user']['ID']);

	if(ThemexUser::isProfile() && !empty($plan)) {
	?>
	<h2 class="secondary">
		<?php
		if($plan['period']==0) {
			printf(__('"%s" subscription is active.', 'academy'), '<a href="'.$plan['url'].'">'.get_the_title($plan['ID']).'</a>');
		} else {
			printf(__('"%s" subscription expires in %s.', 'academy'), '<a href="'.$plan['url'].'">'.get_the_title($plan['ID']).'</a>', themex_time($plan['time'])); 
		}
		?>
	</h2>
	<?php } ?>
	<?php if(empty($courses)) { ?>
	<h2 class="secondary"><?php _e('No courses yet.', 'academy'); ?></h2>
	<?php } else { ?>
	<div class="user-courses-listing">
	<?php foreach($courses as $ID) { ?>
		<?php ThemexCourse::refresh($ID); ?>
		<div class="course-item<?php if(ThemexCourse::$data['progress']!=100){ ?> started<?php } ?><?php if(ThemexCourse::$data['progress']==0){ ?> new-course<?php } ?>">
			<div class="course-title">
				<?php if(ThemexCourse::$data['author']['ID']==ThemexUser::$data['active_user']['ID']) { ?>
				<div class="course-status"><?php _e('Author', 'academy'); ?></div>
				<?php } ?>
				<?php // START OF LESSON LINKS ON PROFILE PAGE -AL 7-15-2016 ?>
				<h4 class="nomargin"><a href="<?php 
					if($ID == 5898) { ?><?php echo site_url(); ?>/lesson/introduction-to-the-foundations-of-the-doctrine-of-scripture/
					<?php } elseif($ID == 5263) { ?><?php echo site_url(); ?>/lesson/introduction-to-the-names-and-nature-of-god/
					<?php } elseif($ID == 4452) { ?><?php echo site_url(); ?>/lesson/introduction-to-how-to-pray-for-the-sick/
					<?php } elseif($ID == 1292) { ?><?php echo site_url(); ?>/lesson/introduction-to-jesus-revealed-in-the-tabernacle/
					<?php } elseif($ID == 108) { ?><?php echo site_url(); ?>/lesson/introduction-to-the-spirit-of-elijah/
					<?php } elseif($ID == 106) { ?><?php echo site_url(); ?>/lesson/introduction-to-intimacy-with-god/
					<?php } elseif($ID == 104) { ?><?php echo site_url(); ?>/lesson/introduction-to-the-hiding-god/
					<?php } elseif($ID == 102) { ?><?php echo site_url(); ?>/lesson/introduction-to-gods-agenda-for-the-ages-part-2/
					<?php } elseif($ID == 100) { ?><?php echo site_url(); ?>/lesson/introduction-to-gods-agenda-for-the-ages-part-1/
					<?php } elseif($ID == 98) { ?><?php echo site_url(); ?>/lesson/introduction-to-deliverance-from-demons/
					<?php } elseif($ID == 96) { ?><?php echo site_url(); ?>/lesson/introduction-to-operating-in-the-anointing/
					<?php } elseif($ID == 94) { ?><?php echo site_url(); ?>/lesson/introduction-to-divine-healing/
					<?php } elseif($ID == 6877) { ?><?php echo site_url(); ?>/lesson/introduction-to-life-in-the-son/
					<?php } elseif($ID == 7251) { ?><?php echo site_url(); ?>/lesson/introduction-to-the-man-in-christthe-mind-of-christ/
					<?php } elseif($ID == 7984) { ?><?php echo site_url(); ?>/lesson/introduction-to-the-feasts-of-israel/
					<?php } elseif($ID == 8140) { ?><?php echo site_url(); ?>/lesson/introduction-to-the-anointed-empowered-life/
					<?php } elseif($ID == 8572) { ?><?php echo site_url(); ?>/lesson/introduction-to-practicing-the-presence-of-god/
					<?php } elseif($ID == 8913) { ?><?php echo site_url(); ?>/lesson/introduction-to-gods-7-covenants/
					<?php } else { ?><?php echo get_permalink($ID); ?>
					<?php } ?>"><?php echo get_the_title($ID); ?></a>
				</h4>
				<?php // END OF LESSON LINKS ON PROFILE PAGE -AL 7-15-2016 ?>
				<?php // START title to progress bar -AL ?>
				<?php if(!in_array(ThemexCourse::$data['progress'], array(0, 100))) { ?>
				<div class="course-progress" title="Course Progress <?php echo ThemexCourse::$data['progress']; ?>%">
					<span style="width:<?php echo ThemexCourse::$data['progress']; ?>%;"></span>
				</div>
				<?php } ?>
				<?php // END title to progress bar -AL ?>
				<?php // START Start Course -AL ?>
				<?php if(ThemexCourse::$data['progress']==0){ ?><!-- <a href="<?php //echo get_permalink($ID); ?>#course-content" class="start-now-link">Start Now</a> -->
					<a href="<?php 
					if($ID == 5898) { ?><?php echo site_url(); ?>/lesson/introduction-to-the-foundations-of-the-doctrine-of-scripture/
					<?php } elseif($ID == 5263) { ?><?php echo site_url(); ?>/lesson/introduction-to-the-names-and-nature-of-god/
					<?php } elseif($ID == 4452) { ?><?php echo site_url(); ?>/lesson/introduction-to-how-to-pray-for-the-sick/
					<?php } elseif($ID == 1292) { ?><?php echo site_url(); ?>/lesson/introduction-to-jesus-revealed-in-the-tabernacle/
					<?php } elseif($ID == 108) { ?><?php echo site_url(); ?>/lesson/introduction-to-the-spirit-of-elijah/
					<?php } elseif($ID == 106) { ?><?php echo site_url(); ?>/lesson/introduction-to-intimacy-with-god/
					<?php } elseif($ID == 104) { ?><?php echo site_url(); ?>/lesson/introduction-to-the-hiding-god/
					<?php } elseif($ID == 102) { ?><?php echo site_url(); ?>/lesson/introduction-to-gods-agenda-for-the-ages-part-2/
					<?php } elseif($ID == 100) { ?><?php echo site_url(); ?>/lesson/introduction-to-gods-agenda-for-the-ages-part-1/
					<?php } elseif($ID == 98) { ?><?php echo site_url(); ?>/lesson/introduction-to-deliverance-from-demons/
					<?php } elseif($ID == 96) { ?><?php echo site_url(); ?>/lesson/introduction-to-operating-in-the-anointing/
					<?php } elseif($ID == 94) { ?><?php echo site_url(); ?>/lesson/introduction-to-divine-healing/
					<?php } elseif($ID == 6877) { ?><?php echo site_url(); ?>/lesson/introduction-to-life-in-the-son/
					<?php } elseif($ID == 7251) { ?><?php echo site_url(); ?>/lesson/introduction-to-the-man-in-christthe-mind-of-christ/
					<?php } elseif($ID == 7984) { ?><?php echo site_url(); ?>/lesson/introduction-to-the-feasts-of-israel/
					<?php } elseif($ID == 8140) { ?><?php echo site_url(); ?>/lesson/introduction-to-the-anointed-empowered-life/
					<?php } elseif($ID == 8913) { ?><?php echo site_url(); ?>/lesson/introduction-to-gods-7-covenants/
					<?php } else { ?><?php echo get_permalink($ID); ?>
					<?php } ?>" class="start-now-link">Start Now</a>
				<?php } ?>
				<?php // END Start Course -AL ?>
				<!-- COURSE BADGE SHOWN HERE -AL -->
				<?php if(ThemexCourse::$data['progress']==100){ ?>
					<i class="fa fa-check" aria-hidden="true" style="right: 36px;"></i>
					<div href="#" class="has-tooltip" id="link">
					  <span class="tooltip">
					    <span>Print Certificate</span>
					  </span>
					  <a href="<?php //echo ThemexCore::getURL('certificate', themex_encode(ThemexCourse::$data['ID'], ThemexUser::$data['user']['ID'])); ?><?php echo site_url(); ?>/wp-content/uploads/fpdfcert.php?Course=<?php echo get_the_title($ID); ?>&Name=<?php $current_user = wp_get_current_user(); echo $current_user->user_firstname . ' ' . $current_user->user_lastname ?>" target="_blank"><img src="http://bennyhinnbiblestudy.org/wp-content/themes/bhmsom/images/icons/certificate_icon.png" alt=""><!-- <img src="<?php //echo get_field('course_badge', $ID); ?>" alt="Course Badge" title="Click to view Course Certificate"> --></a>
					</div>
				<?php } ?>
			</div>
			<?php if(!ThemexCore::checkOption('course_rating')) { ?>
			<div class="course-meta">
				<?php get_template_part('module', 'rating'); ?>
			</div>
			<?php } ?>
		</div>
	<?php } ?>
	</div>
	<?php } ?>
>>>>>>> master
</aside>