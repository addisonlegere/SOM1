<div class="widget">
	<div class="widget-title">
		<h4 class="nomargin"><?php _e('Lessons', 'academy'); ?></h4>
	</div>
	<div class="widget-content">
		<ul class="styled-list style-3">
			<?php foreach(ThemexCourse::$data['lessons'] as $lesson) { ?>
<<<<<<< HEAD
			<li class="<?php if($lesson->post_parent!=0) { ?>child<?php } ?> <?php if(ThemexLesson::getProgress($lesson->ID)==100) { ?>completed<?php } ?> <?php if($lesson->ID==ThemexLesson::$data['ID']) { ?>current<?php } ?>">
				<a href="<?php echo get_permalink($lesson->ID); ?>"><?php echo get_the_title($lesson->ID); ?></a>
			</li>
=======
			<?php // START Lesson completed shows when completed above 50 percent -AKL ?>
			<li class="<?php if($lesson->post_parent!=0) { ?>child <?php } ?><?php if(ThemexLesson::getProgress($lesson->ID)>=50) { ?>completed<?php } else { ?>not-completed<?php } ?><?php if($lesson->ID==ThemexLesson::$data['ID']) { ?> current<?php } ?>">
				<a href="<?php echo get_permalink($lesson->ID); ?>"><?php echo get_the_title($lesson->ID); ?></a>
			</li>
			<?php // END Lesson completed shows when completed above 50 percent -AKL ?>
>>>>>>> master
			<?php } ?>
		</ul>
	</div>
</div>