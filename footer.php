<<<<<<< HEAD
				<?php if(is_active_sidebar('footer')) { ?>
					<div class="clear"></div>
					<div class="footer-sidebar sidebar clearfix">
						<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer')); ?>
					</div>
				<?php } ?>
				</div>
			</div>
			<!-- /content -->
			<div class="footer-wrap">
				<footer class="site-footer">
					<div class="row">
						<div class="copyright left">
							<?php echo ThemexCore::getOption('copyright', 'Academy Theme &copy; '.date('Y')); ?>
						</div>
						<nav class="footer-navigation right">
							<?php wp_nav_menu( array( 'theme_location' => 'footer_menu' ) ); ?>
						</nav>
						<!-- /navigation -->				
					</div>			
				</footer>				
			</div>
			<!-- /footer -->			
		</div>
		<!-- /site wrap -->
	<?php wp_footer(); ?>
	</body>
=======
				<?php if(is_active_sidebar('footer')) { ?>
					<div class="clear"></div>
					<div class="footer-sidebar sidebar clearfix">
						<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer')); ?>
					</div>
				<?php } ?>
				</div>
			</div>
			<!-- /content -->
			
			<div class="footer-wrap">
				<div class="pre-footer">
				<div class="substrate2"<?php if( get_field('course_background_color') ): ?> style="background:<?php the_field('course_background_color'); ?>"<?php endif; ?>>
					<?php ThemexStyle::renderBackground(); ?>
				</div>
			</div>
				<footer class="site-footer">
					<div class="row">
						<div class="copyright left">
							<?php echo ThemexCore::getOption('copyright', 'Academy Theme &copy; '.date('Y')); ?>
						</div>
						<nav class="footer-navigation right">
							<?php wp_nav_menu( array( 'theme_location' => 'footer_menu' ) ); ?>
						</nav>
						<!-- /navigation -->				
					</div>			
				</footer>				
			</div> 
			<!-- /footer -->
			<script type="text/javascript">
				// SOCIAL BAR DROP DOWN 
				jQuery("#social-dropdown").click(function() {
					jQuery(".social-bar").toggleClass('drop-down');
				});
				document.getElementById('goback1').addEventListener('click', function() {
				    window.history.back();
				});
				// RADIO BUTTON
				document.getElementById('radio-button1').addEventListener('click', function() {
				    window.open("http://bennyhinnbiblestudy.org/radio-music/", "_blank", "width=565, height=368, scrollbars=0, status=1, titlebar=0, resizable=0, menubar=0, location=0, left=0, top=0");
				});
			</script>
			<?php if (is_singular('forum')) { ?>
	<!-- COURSE FORUM RULES MODAL    AL -->
	<div class="my_modal">
		<div class="modal-outer">
			
			<div class="modal-inner">
				<h3>You can be part of exclusive course groups and forums as you network with like-minded students from around the world for fellowship, caring, sharing, and connecting.</h3>
				<div class="pd-15">
					<ul style="padding-left: 1em; text-indent: -1em;">
					<li><strong>Participating in groups and forums is completely optional and has no effect on progressing through your course or receiving your certificate.</strong></li>
					<li>If you choose to participate in discussion groups or class forums, understand that they are self-administered. The goal is to provide a platform for students to engage in a respectful discussion on particular topics.</li>
					<li>Please report any inappropriate comments, language, or behavior.</li>
					<li>We have&nbsp; a zero tolerance policy on any of the following:
					<ul style="padding-left: 1em; text-indent: -1em;">
					<li>Offensive/aggressive behavior</li>
					<li>Inappropriate language</li>
					<li>Bullying or harassing messages</li>
					<li>Posting of videos or pictures in the forum.</li>
					<li>Attempting to market, sell or promote products, your particular ministry, soliciting donations, etc.</li>
					<li>Promoting personal social media profiles, and other websites not related to Benny Hinn Ministries.</li>
					<li>Anything else that our administrator deems to be inappropriate.</li>
					<li>The Benny Hinn Ministries Online administrator has the final authority in determining whether or not a comment or user should be removed.</li>
					<li>If you are removed from the school for violating a particular policy, you access will be revoked immediately and without a refund.</li>
					</ul>
					</li>
					<li>Groups/Forums are self-administered. This means Benny Hinn Ministries staff may not catch every offensive comment immediately.</li>
					<li>When posting in discussion groups and class forums, be sure to stay on topic, be respectful and learn from the opinions and experiences of others.</li>
					<li>Remember that due to the nature of the content, not everyone may not share the same opinion as you. This is good because it helps to create interesting conversation whereby one can experience spiritual growth and understand the viewpoint of others.</li>
					<li>You will be collaborating with students from all around the world.</li>
					<li>Discussion features are designed to enhance learning through community collaboration. <strong>Be kind, have fun, learn and grow!</strong></li>
					</ul>
				</div>
			</div>
			<div id="modal-close"><i class="fa fa-times"></i></div>
		</div>	
	</div>
	<script type="text/javascript">
		jQuery(".my_modal").click(function() {
			jQuery(".my_modal").fadeOut();
		});
		jQuery('.modal-inner').on('click', function(e) {
			e.stopPropagation();
		});
		// jQuery(document).on('click', function(e) {
		// 	jQuery(".my_modal").fadeOut();
		// });

		jQuery("#modal-close").click(function() {
			jQuery(".my_modal").fadeOut('slow');
			jQuery(".my_modal").addClass('block-style');
		});
		jQuery("#modal-button").click(function() {
			jQuery(".my_modal").fadeIn('slow');
		});
	</script>
	<!-- END FORUM RULES MODAL    AL -->
	<?php } elseif (is_singular('topic')) { ?>
		<!-- COURSE FORUM RULES MODAL    AL -->
		<div class="my_modal">
			<div class="modal-outer">
				
				<div class="modal-inner">
					<h3>Complete this form to report offensive comments or behavior.</h3>
					<?php echo do_shortcode('[contact-form-7 id="2743" title="Forum Abuse Form"]'); ?>
				</div>
				<div id="modal-close"><i class="fa fa-times"></i></div>
			</div>	
		</div>
		<script type="text/javascript">
			jQuery(".my_modal").click(function() {
				jQuery(".my_modal").fadeOut();
			});
			jQuery('.modal-inner').on('click', function(e) {
				e.stopPropagation();
			});
			// jQuery(document).on('click', function(e) {
			// 	jQuery(".my_modal").fadeOut();
			// });
			jQuery("#modal-close1").click(function() {
				jQuery(".my_modal").fadeOut('slow');
				jQuery(".my_modal").adClass('block-style');
			});

			jQuery("#modal-close").click(function() {
				jQuery(".my_modal").fadeOut('slow');
				jQuery(".my_modal").adClass('block-style');
			});
			jQuery("#modal-close1").click(function() {
				jQuery(".my_modal").fadeOut('slow');
				jQuery(".my_modal").adClass('block-style');
			});
			jQuery( ".wpcf7-response-output" ).append(' click here.');
			jQuery("#modal-button").click(function() {
				jQuery(".my_modal").fadeIn('slow');
			});
		</script>
		<!-- END FORUM RULES MODAL    AL -->
	<?php } elseif (is_singular('lesson')) { ?>
		<!-- LESSON FORM MODAL    AL -->
		<div class="my_modal">
			<div class="modal-outer">
				
				<div class="modal-inner">
					<h3>Contact Us</h3>
					<?php echo do_shortcode('[contact-form-7 id="4864" title="User Contact Form"]'); ?>
				</div>
				<div id="modal-close"><i class="fa fa-times"></i></div>
			</div>	
		</div>
		<script type="text/javascript">
			jQuery(".my_modal").click(function() {
				jQuery(".my_modal").fadeOut();
			});
			jQuery('.modal-inner').on('click', function(e) {
				e.stopPropagation();
			});
			// jQuery(document).on('click', function(e) {
			// 	jQuery(".my_modal").fadeOut();
			// });
			jQuery("#modal-close1").click(function() {
				jQuery(".my_modal").fadeOut('slow');
				jQuery(".my_modal").adClass('block-style');
			});

			jQuery("#modal-close").click(function() {
				jQuery(".my_modal").fadeOut('slow');
				jQuery(".my_modal").adClass('block-style');
			});
			jQuery("#modal-button").click(function() {
				jQuery(".my_modal").fadeIn('slow');
			});
		</script>
		<!-- END LESSON FORM MODAL    AL -->
	<?php } else {} ?>
		</div>
		<!-- /site wrap -->
	<?php wp_footer(); ?>
	</body>
>>>>>>> master
</html>