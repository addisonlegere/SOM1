<?php if(ThemexCourse::$data['status']=='premium' && ThemexCourse::$data['product']!=0) { ?>
<form action="<?php echo themex_url(); ?>" method="POST">
<?php } else { ?>
<form action="<?php echo themex_url(true, ThemexCore::getURL('register')); ?>" method="POST">
<?php } ?>
	<?php if(!ThemexCourse::isSubscriber()) { ?>
<<<<<<< HEAD
	<a href="#" class="element-button medium submit-button left"><?php _e('Subscribe Now', 'academy'); ?></a>
=======
	<a href="#" class="element-button medium submit-button left"><?php _e('Enroll Now', 'academy'); ?></a>
>>>>>>> master
	<input type="hidden" name="course_action" value="subscribe_user" />
	<input type="hidden" name="user_redirect" value="<?php echo intval(reset(ThemexCourse::$data['plans'])); ?>" />
	<?php } else if(!ThemexCourse::isMember()) { ?>
		<?php if(ThemexCourse::$data['status']!='private' && ThemexCourse::$data['capacity']>=0) { ?>
<<<<<<< HEAD
		<a href="#" class="element-button medium price-button submit-button left">		
			<?php if(ThemexCourse::$data['status']=='premium' && ThemexCourse::$data['product']!=0) { ?>
			<span class="caption"><?php _e('Take This Course', 'academy'); ?></span>
			<span class="price"><?php echo ThemexCourse::$data['price']['text']; ?></span>
			<?php } else { ?>
			<?php _e('Take This Course', 'academy'); ?>
			<?php } ?>
		</a>
=======
		<?php if ( WC()->cart->get_cart_contents_count() == 0 ) { ?>
			<a href="#" class="element-button medium price-button submit-button left">		
				<?php if(ThemexCourse::$data['status']=='premium' && ThemexCourse::$data['product']!=0) { ?>
					<span class="caption"><?php _e('Take This Course', 'academy'); ?></span>
					<span class="price"><?php echo ThemexCourse::$data['price']['text']; ?></span>	
				<?php } else { ?>
					<?php _e('Take This Course', 'academy'); ?>
				<?php } ?>
			</a>
		<?php } else { ?>
			<?php //echo do_shortcode('[add_to_cart id="6647"]'); ?>
			<?php //_e('Take This Coursex', 'academy'); ?>
				<?php $courseid=ThemexCourse::$data['ID'];
				//$courseidbutton='[add_to_cart id="' . $courseid . '"]'; ?>
				
				<?php if($courseid == 7984) { ?>
					<?php //THE FEASTS OF ISRAEL ?>
					<?php if (!woo_in_cart(6623)) { ?>
						<?php echo do_shortcode("[add_to_cart id='6623']"); ?>
					<?php } else { ?>
						<a href="/cart/" style="color:#fff;"><i class="fa fa-shopping-cart" aria-hidden="true"></i> view cart</a>
					<?php } ?>
				<?php } elseif($courseid == 6877)  { ?>
					<?php //LIFE IN THE SUN ?>
					<?php if (!woo_in_cart(6647)) { ?>
						<?php echo do_shortcode("[add_to_cart id='6647']"); ?>
					<?php } else { ?>
						<a href="/cart/" style="color:#fff;"><i class="fa fa-shopping-cart" aria-hidden="true"></i> view cart</a>
					<?php } ?>
				<?php } elseif($courseid == 5898)  { ?>
					<?php //The Foundations of The Doctrine of Scripture ?>
					<?php if (!woo_in_cart(5876)) { ?>
						<?php echo do_shortcode("[add_to_cart id='5876']"); ?>
					<?php } else { ?>
						<a href="/cart/" style="color:#fff;"><i class="fa fa-shopping-cart" aria-hidden="true"></i> view cart</a>
					<?php } ?>
				<?php } elseif($courseid == 7251)  { ?>
					<?php //The Man in Christ/The Mind of Christ ?>
					<?php if (!woo_in_cart(6734)) { ?>
						<?php echo do_shortcode("[add_to_cart id='6734']"); ?>
					<?php } else { ?>
						<a href="/cart/" style="color:#fff;"><i class="fa fa-shopping-cart" aria-hidden="true"></i> view cart</a>
					<?php } ?>
				<?php } elseif($courseid == 5263)  { ?>
					<?php //The Names and Nature of God ?>
					<?php if (!woo_in_cart(5138)) { ?>
						<?php echo do_shortcode("[add_to_cart id='5138']"); ?>
					<?php } else { ?>
						<a href="/cart/" style="color:#fff;"><i class="fa fa-shopping-cart" aria-hidden="true"></i> view cart</a>
					<?php } ?>
				<?php } elseif($courseid == 4452)  { ?>
					<?php //How to Pray for the Sick ?>
					<?php if (!woo_in_cart(4564)) { ?>
						<?php echo do_shortcode("[add_to_cart id='4564']"); ?>
					<?php } else { ?>
						<a href="/cart/" style="color:#fff;"><i class="fa fa-shopping-cart" aria-hidden="true"></i> view cart</a>
					<?php } ?>
				<?php } elseif($courseid == 1292)  { ?>
					<?php //Jesus Revealed in the Tabernacle ?>
					<?php if (!woo_in_cart(1389)) { ?>
						<?php echo do_shortcode("[add_to_cart id='1389']"); ?>
					<?php } else { ?>
						<a href="/cart/" style="color:#fff;"><i class="fa fa-shopping-cart" aria-hidden="true"></i> view cart</a>
					<?php } ?>
				<?php } elseif($courseid == 108)  { ?>
					<?php //The Spirit of Elijah ?>
					<?php if (!woo_in_cart(768)) { ?>
						<?php echo do_shortcode("[add_to_cart id='768']"); ?>
					<?php } else { ?>
						<a href="/cart/" style="color:#fff;"><i class="fa fa-shopping-cart" aria-hidden="true"></i> view cart</a>
					<?php } ?>
				<?php } elseif($courseid == 106)  { ?>
					<?php //Intimacy with God ?>
					<?php if (!woo_in_cart(758)) { ?>
						<?php echo do_shortcode("[add_to_cart id='758']"); ?>
					<?php } else { ?>
						<a href="/cart/" style="color:#fff;"><i class="fa fa-shopping-cart" aria-hidden="true"></i> view cart</a>
					<?php } ?>
				<?php } elseif($courseid == 104)  { ?>
					<?php //The Hiding God ?>
					<?php if (!woo_in_cart(379)) { ?>
						<?php echo do_shortcode("[add_to_cart id='379']"); ?>
					<?php } else { ?>
						<a href="/cart/" style="color:#fff;"><i class="fa fa-shopping-cart" aria-hidden="true"></i> view cart</a>
					<?php } ?>
				<?php } elseif($courseid == 102)  { ?>
					<?php //God’s Agenda for the Ages | The Book of Revelation ?>
					<?php if (!woo_in_cart(757)) { ?>
						<?php echo do_shortcode("[add_to_cart id='757']"); ?>
					<?php } else { ?>
						<a href="/cart/" style="color:#fff;"><i class="fa fa-shopping-cart" aria-hidden="true"></i> view cart</a>
					<?php } ?>
				<?php } elseif($courseid == 100)  { ?>
					<?php //God’s Agenda for the Ages | A Study of Prophecy ?>
					<?php if (!woo_in_cart(756)) { ?>
						<?php echo do_shortcode("[add_to_cart id='756']"); ?>
					<?php } else { ?>
						<a href="/cart/" style="color:#fff;"><i class="fa fa-shopping-cart" aria-hidden="true"></i> view cart</a>
					<?php } ?>
				<?php } elseif($courseid == 98)  { ?>
					<?php //Deliverance from Demons ?>
					<?php if (!woo_in_cart(740)) { ?>
						<?php echo do_shortcode("[add_to_cart id='740']"); ?>
					<?php } else { ?>
						<a href="/cart/" style="color:#fff;"><i class="fa fa-shopping-cart" aria-hidden="true"></i> view cart</a>
					<?php } ?>
				<?php } elseif($courseid == 96)  { ?>
					<?php //Operating in the Anointing ?>
					<?php if (!woo_in_cart(759)) { ?>
						<?php echo do_shortcode("[add_to_cart id='759']"); ?>
					<?php } else { ?>
						<a href="/cart/" style="color:#fff;"><i class="fa fa-shopping-cart" aria-hidden="true"></i> view cart</a>
					<?php } ?>
				<?php } elseif($courseid == 94)  { ?>
					<?php //Divine Healing ?>
					<?php if (!woo_in_cart(755)) { ?>
						<?php echo do_shortcode("[add_to_cart id='755']"); ?>
					<?php } else { ?>
						<a href="/cart/" style="color:#fff;"><i class="fa fa-shopping-cart" aria-hidden="true"></i> view cart</a>
					<?php } ?>
				<?php } elseif($courseid == 8140)  { ?>
					<?php //The Anointed Empowered Life ?>
					<?php if (!woo_in_cart(6654)) { ?>
						<?php echo do_shortcode("[add_to_cart id='6654']"); ?>
					<?php } else { ?>
						<a href="/cart/" style="color:#fff;"><i class="fa fa-shopping-cart" aria-hidden="true"></i> view cart</a>
					<?php } ?>
				<?php } elseif($courseid == 8572)  { ?>
					<?php //Practicing The Presence Of God ?>
					<?php if (!woo_in_cart(6732)) { ?>
						<?php echo do_shortcode("[add_to_cart id='6732']"); ?>
					<?php } else { ?>
						<a href="/cart/" style="color:#fff;"><i class="fa fa-shopping-cart" aria-hidden="true"></i> view cart</a>
					<?php } ?>
				<?php } else { ?>
					<?php //echo $courseid ?>
					<?php //echo do_shortcode("[add_to_cart id='xxxx']"); ?>
					<?php //do_action('woocommerce_simple_add_to_cart'); ?>
					<p>coming soon</p>
				<?php } ?>
		<?php } ?>		
>>>>>>> master
		<input type="hidden" name="course_action" value="add_user" />
		<input type="hidden" name="user_redirect" value="<?php echo ThemexCourse::$data['ID']; ?>" />
		<?php } ?>
	<?php } else { ?>
		<?php if(!ThemexCore::checkOption('course_retake')) { ?>
<<<<<<< HEAD
		<a href="#" class="element-button secondary medium submit-button left"><?php _e('Unsubscribe Now', 'academy'); ?></a>
=======
		<a href="#" class="element-button secondary medium submit-button left drop-button"><?php _e('Drop Now', 'academy'); ?></a>
>>>>>>> master
		<input type="hidden" name="course_action" value="remove_user" />
		<?php } ?>
		<?php if(ThemexCourse::hasCertificate()) { ?>
		<a href="<?php echo ThemexCore::getURL('certificate', themex_encode(ThemexCourse::$data['ID'], ThemexUser::$data['user']['ID'])); ?>" target="_blank" class="element-button medium certificate-button"><?php _e('View Certificate', 'academy'); ?></a>
		<?php } ?>
	<?php } ?>
	<input type="hidden" name="course_id" value="<?php echo ThemexCourse::$data['ID']; ?>" />
	<input type="hidden" name="plan_id" value="<?php echo intval(reset(ThemexCourse::$data['plans'])); ?>" />	
	<input type="hidden" name="nonce" class="nonce" value="<?php echo wp_create_nonce(THEMEX_PREFIX.'nonce'); ?>" />
	<input type="hidden" name="action" class="action" value="<?php echo THEMEX_PREFIX; ?>update_course" />
</form>