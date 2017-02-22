<?php ThemexCourse::refresh($post->ID); ?>
<div class="course-preview <?php echo ThemexCourse::$data['status']; ?>-course">
	<div class="course-image">
		<a href="<?php the_permalink(); ?>"><?php if ( WC()->cart->get_cart_contents_count() > 1 && is_page(204) ) { ?> 
      <?php // START OF MULTI PURCHASE -AKL ?> 
      <?php
					foreach(WC()->cart->get_cart() as $cart_item_key => $cart_item){
						$_product=apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
						$product_id=apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);

						if($_product && $_product->exists()&& $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)){
						?>
						<div class="<?php echo esc_attr(apply_filters('woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key)); ?> course-header">
							<div class="product-thumbnail">
								<?php
								$thumbnail=apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image('normal'), $cart_item, $cart_item_key);

								if(! $_product->is_visible())
									echo $thumbnail;
								else
									printf('<a href="%s">%s</a>', $_product->get_permalink(), $thumbnail);
								?>
								<?php //the_post_thumbnail('normal'); ?>
							</div>
							<div class="product-name">
								<?php
								if(! $_product->is_visible())
									echo apply_filters('woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key);
								else
									echo apply_filters('woocommerce_cart_item_name', sprintf('<h5 class="nomargin"><a href="%s">%s</a></h5>', $_product->get_permalink(), $_product->get_title()), $cart_item, $cart_item_key);

								echo WC()->cart->get_item_data($cart_item);

								if($_product->backorders_require_notification()&& $_product->is_on_backorder($cart_item['quantity']))
									echo '<p class="backorder_notification">'.__('Available on backorder', 'woocommerce').'</p>';
								?>
							</div>
							<span class="product-prices">
								<?php
								echo apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key);
								?>
							</span>
							<!-- <td class="product-quantity">
								<?php
								if($_product->is_sold_individually()){
									$product_quantity=sprintf('1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key);
								} else {
									$product_quantity=woocommerce_quantity_input(array(
										'input_name'  => "cart[{$cart_item_key}][qty]",
										'input_value' => $cart_item['quantity'],
										'max_value'   => $_product->backorders_allowed()? '' : $_product->get_stock_quantity(),
										'min_value'   => '0'
									), $_product, false);
								}

								echo apply_filters('woocommerce_cart_item_quantity', $product_quantity, $cart_item_key);
								?>
							</td> -->
							<!-- <td class="product-subtotal">
								<?php
								echo apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key);
								?>
							</td> -->
							<!-- <td class="product-remove">
								<?php echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf( '<a href="%s" class="remove" title="%s">&times;</a>', esc_url( WC()->cart->get_remove_url( $cart_item_key ) ), __( 'Remove this item', 'woocommerce' ) ), $cart_item_key ); ?>
							</td> -->
						</div>
						<?php
						}
					}

					do_action('woocommerce_cart_contents');
					?>
					<?php // END OF MULTI PURCHASE -AKL ?> 
<?php } else { ?><?php the_post_thumbnail('normal'); ?><?php } ?></a>
		<?php if(empty(ThemexCourse::$data['plans']) && ThemexCourse::$data['status']!='private') { ?>
		<div class="course-price product-price" style="z-index: 99;">
			<div class="price-text"><?php echo ThemexCourse::$data['price']['text']; ?></div>
			<div class="corner-wrap">
				<div class="corner"></div>
				<div class="corner-background"></div>
			</div>			
		</div>
		<?php } ?>
	</div>
	<?php // START IF STATEMENT TO SHOW OR HIDE IN CART PAGE -AKL ?>
	<?php if ( WC()->cart->get_cart_contents_count() > 1 && is_page(204) ) { ?> 
	<?php } else { ?>
	<div class="course-meta">
		<header class="course-header">
			<h5 class="nomargin"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
			<?php if(!ThemexCore::checkOption('course_author')) { ?>
			<a href="<?php echo ThemexCourse::$data['author']['profile_url']; ?>" class="author"><?php echo ThemexCourse::$data['author']['profile']['full_name']; ?></a>
			<?php } ?>
		</header>
		<?php if(!ThemexCore::checkOption('course_popularity') || !ThemexCore::checkOption('course_rating')) { ?>
		<footer class="course-footer clearfix">
			<?php if(!ThemexCore::checkOption('course_popularity')) { ?>
			<div class="course-users left">
				<?php echo ThemexCore::getPostMeta($post->ID, 'course_popularity', '0'); ?>
			</div>
			<?php } ?>
			<?php if(!ThemexCore::checkOption('course_rating')) { ?>
			<?php get_template_part('module', 'rating'); ?>
			<?php } ?>
		</footer>
		<?php } ?>
		<?php if(is_singular('course')) { ?>
			<div class="extra-course-button<?php if ( WC()->cart->get_cart_contents_count() != 0 ) { ?> multi-checkout<?php } ?>">
				<?php get_template_part('module', 'form'); ?>
			</div>
		<?php } ?>
		<?php // END IF STATEMENT TO SHOW OR HIDE IN CART PAGE -AKL ?>
	</div>
	<?php } ?>
</div>