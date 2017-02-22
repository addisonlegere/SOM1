<<<<<<< HEAD
<?php 
get_header(); 


the_post();
ThemexLesson::refresh(ThemexCore::getPostRelations($post->ID, 0, 'quiz_lesson', true), true);
ThemexCourse::refresh(ThemexLesson::$data['course'], true);
$layout=ThemexCore::getOption('lessons_layout', 'right');

if($layout=='left') {
?>
<aside class="sidebar column fourcol">
	<?php get_sidebar('lesson'); ?>
</aside>
<div class="column eightcol last">
<?php } else { ?>
<div class="eightcol column">
<?php } ?>
	<h1><?php the_title(); ?></h1>
	<?php the_content(); ?>
	<div class="quiz-listing">
		<form id="quiz_form" action="<?php the_permalink(); ?>" method="POST">
			<div class="message">
				<?php ThemexInterface::renderMessages(ThemexLesson::$data['progress']); ?>
			</div>
			<?php 
			$counter=0;
			foreach(ThemexLesson::$data['quiz']['questions'] as $key => $question) {
			$counter++;
			?>
			<div class="quiz-question <?php echo $question['type']; ?>">
				<div class="question-title">
					<div class="question-number"><?php echo $counter; ?></div>
					<h4 class="nomargin"><?php echo themex_format($question['title']); ?></h4>
				</div>
				<?php ThemexLesson::renderAnswers($key, $question); ?>
			</div>
			<?php } ?>
			<input type="hidden" name="course_action" value="complete_course" />
			<input type="hidden" name="lesson_action" value="complete_quiz" />
			<input type="hidden" name="course_id" value="<?php echo ThemexCourse::$data['ID']; ?>" />
			<input type="hidden" name="lesson_id" value="<?php echo ThemexLesson::$data['ID']; ?>" />
			<input type="hidden" name="nonce" class="nonce" value="<?php echo wp_create_nonce(THEMEX_PREFIX.'nonce'); ?>" />
			<input type="hidden" name="action" class="action" value="<?php echo THEMEX_PREFIX; ?>update_lesson" />
		</form>
	</div>
</div>
<?php if($layout=='right') { ?>
<aside class="sidebar fourcol column last">
	<?php get_template_part('sidebar', 'lesson'); ?>
</aside>
<?php } ?>
<?php get_footer(); ?>
=======
<?php 
get_header(); 


the_post();
ThemexLesson::refresh(ThemexCore::getPostRelations($post->ID, 0, 'quiz_lesson', true), true);
ThemexCourse::refresh(ThemexLesson::$data['course'], true);
$layout=ThemexCore::getOption('lessons_layout', 'right');

if($layout=='left') {
?>
<aside class="sidebar column fourcol">
	<?php get_sidebar('lesson'); ?>
</aside>
<div class="column eightcol last">
<?php } else { ?>
<div class="eightcol column">
<?php } ?>
	<h1><?php the_title(); ?></h1>
	<?php the_content(); ?>
	<div class="quiz-listing">
		<form id="quiz_form" action="<?php the_permalink(); ?>" method="POST">
			<div class="message">
				<?php ThemexInterface::renderMessages(ThemexLesson::$data['progress']); ?>
			</div>
			<?php 
			$counter=0;
			foreach(ThemexLesson::$data['quiz']['questions'] as $key => $question) {
			$counter++;
			?>
			<div class="quiz-question <?php echo $question['type']; ?>">
				<div class="question-title">
					<div class="question-number"><?php echo $counter; ?></div>
					<h4 class="nomargin"><?php echo do_shortcode(themex_stripslashes($question['title'])); ?></h4>
				</div>
				<?php ThemexLesson::renderAnswers($key, $question); ?>
			</div>
			<?php } ?>
			<input type="hidden" name="course_action" value="complete_course" />
			<input type="hidden" name="lesson_action" value="complete_quiz" />
			<input type="hidden" name="course_id" value="<?php echo ThemexCourse::$data['ID']; ?>" />
			<input type="hidden" name="lesson_id" value="<?php echo ThemexLesson::$data['ID']; ?>" />
			<input type="hidden" name="nonce" class="nonce" value="<?php echo wp_create_nonce(THEMEX_PREFIX.'nonce'); ?>" />
			<input type="hidden" name="action" class="action" value="<?php echo THEMEX_PREFIX; ?>update_lesson" />
		</form>
	</div>
	<!-- LESSON OPTIONS -->
	<div class="lesson-options lesson-options-b <?php if(ThemexCourse::hasCertificate()) { ?>has-certificate<?php } ?>">
		<hr />
		<?php if(ThemexCourse::isMember()) { ?>
		<form action="<?php echo themex_url(); ?>" method="POST">
			<?php if(ThemexLesson::$data['progress']!=0) { ?>
				<!-- IF STATEMENT TO SHOW THE COURSE CERTIFICATE AND HIDES THE MARK INCOMPLETE BUTTON 2.17.16 AKL -->
				<?php if(ThemexCourse::hasCertificate()) { ?>
					<a href="<?php echo ThemexCore::getURL('certificate', themex_encode(ThemexCourse::$data['ID'], ThemexUser::$data['user']['ID'])); ?>" target="_blank" class="element-button small certificate-button"><?php _e('View Certificate', 'academy'); ?></a>
				<?php } else { ?>
					<?php //if(!ThemexCore::checkOption('lesson_retake')) { ?>
					<!-- <a href="#" class="element-button finish-lesson submit-button"><?php //_e('Mark Incomplete', 'academy'); ?></a>
					<input type="hidden" name="lesson_action" value="uncomplete_lesson" />
					<input type="hidden" name="course_action" value="uncomplete_course" /> -->
					<?php //} ?>
				<?php } ?>
			<?php } else if(ThemexLesson::$data['prerequisite']['progress']!=0) { ?>
				<?php if(is_singular('quiz')) { ?>
				<a href="#quiz_form" class="element-button submit-button"><span class="button-icon check"></span><?php if( get_field('final_exam')) { ?><?php _e('Complete Final', 'academy'); ?><?php } else { ?><?php _e('Complete Quiz', 'academy'); ?><?php } ?></a>		
				<?php } else if(!empty(ThemexLesson::$data['quiz'])) { ?>
				<a href="<?php echo get_permalink(ThemexLesson::$data['quiz']['ID']); ?>" class="element-button submit-button"><span class="button-icon edit"></span><?php if( get_field('final_exam')) { ?><?php _e('Final Exam', 'academy'); ?><?php } else { ?><?php _e('Lesson Quiz', 'academy'); ?><?php } ?></a>
				<?php } else { ?>
				<a href="#" class="element-button submit-button"><span class="button-icon check"></span><?php _e('Mark Complete', 'academy'); ?></a>
				<input type="hidden" name="lesson_action" value="complete_lesson" />
				<input type="hidden" name="course_action" value="complete_course" />
				<?php } ?>
			<?php } ?>
			<input type="hidden" name="lesson_id" value="<?php echo ThemexLesson::$data['ID']; ?>" />
			<input type="hidden" name="course_id" value="<?php echo ThemexCourse::$data['ID']; ?>" />
			<input type="hidden" name="nonce" class="nonce" value="<?php echo wp_create_nonce(THEMEX_PREFIX.'nonce'); ?>" />
			<input type="hidden" name="action" class="action" value="<?php echo THEMEX_PREFIX; ?>update_lesson" />
		</form>
		<?php } ?>
		<?php if(ThemexLesson::$data['ID']!=0) { ?>
		<a href="<?php echo get_permalink(ThemexCourse::$data['ID']); ?>" title="<?php _e('Close Lesson', 'academy'); ?>" class="element-button close-lesson secondary"><span class="button-icon nomargin close"></span></a>
		<?php } ?>
		<?php if(ThemexLesson::$data['progress']!=0) { ?>
			<?php if($next=ThemexCourse::getAdjacentLesson(ThemexLesson::$data['ID'])) { ?>
				<a href="<?php echo get_permalink($next->ID); ?>" title="<?php _e('Next Lesson', 'academy'); ?>" class="element-button next-lesson secondary"><span style="font-size: 15px; vertical-align: middle;">NEXT  </span><span class="button-icon nomargin next"></span></a>
			<?php } ?>
		<?php } ?>
		<?php if($prev=ThemexCourse::getAdjacentLesson(ThemexLesson::$data['ID'], false)) { ?>
		<a href="<?php echo get_permalink($prev->ID); ?>" title="<?php _e('Previous Lesson', 'academy'); ?>" class="element-button prev-lesson secondary"><span class="button-icon nomargin prev"></span><span style="font-size: 15px; vertical-align: middle;">  PREV</span></a>
		<?php } ?>
	</div>
	<!-- END LESSON OPTIONS -->
</div>
<?php if($layout=='right') { ?>
<aside class="sidebar fourcol column last">
	<?php get_template_part('sidebar', 'lesson'); ?>
</aside>
<?php } ?>
<?php get_footer(); ?>
<!-- COURSE COMPLETION MODAL    AL -->
<?php if(ThemexCourse::hasCertificate()) { ?>
	<div id="award-overlay">
		<div class="award-inner">
			<div id="award-close"><i class="fa fa-times"></i></div>
			<h4>You have successfully completed this Benny Hinn School of Ministry course!</h4>
			<p>We congratulate you for all the study and dedication this achievement represents. Click the button below to download your certificate.</p>
			<!-- <img src="http://69.195.124.122/~bennyhin/bhmsom/wp-content/themes/bhmsom/images/course-badges/Operating-In-the-Anointing-Badge.png" alt="Course Badge"> -->
			<!-- <img src="<?php //echo the_field('final_quiz_badge'); ?>" alt="Course Badge"> -->
			<img src="http://bennyhinnbiblestudy.org/wp-content/uploads/2016/02/certificate_icone_2-1.png" alt="Course Badge"><i class="fa fa-check"></i>
			<div class="button-award-wrap">
				<a href="<?php echo ThemexCore::getURL('certificate', themex_encode(ThemexCourse::$data['ID'], ThemexUser::$data['user']['ID'])); ?>" target="_blank" class="element-button small certificate-button"><?php _e('View Certificate', 'academy'); ?></a>
			</div>
			<!-- <div class="course-title"><?php //ThemexInterface::renderPageTitle(); ?></div> -->
		</div>
	</div>
	<script type="text/javascript">
		jQuery('.award-inner').on('click', function(e) {
			e.stopPropagation();
		});
		jQuery(document).on('click', function(e) {
			jQuery("#award-overlay").fadeOut();
		});

		jQuery("#award-close").click(function() {
			jQuery("#award-overlay").fadeOut();
		});
	</script>
<!-- END COURSE COMPLETION MODAL   AL -->
<?php } ?>
>>>>>>> master
