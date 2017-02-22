<?php
/*
 * Template Name: BHM Radio
 */
get_header(); ?>
<div id="content" class="full-width">
    <?php while (have_posts()): the_post(); ?>
        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <span class="entry-title" style="display: none;"><?php the_title(); ?></span>
            <span class="vcard" style="display: none;"><span class="fn"><?php the_author_posts_link(); ?></span></span>
            <span class="updated" style="display: none;"><?php the_time('c'); ?></span>
            <div class="post-content">
                <div class="bhm-radio">
                    <div class="radio-header">
                        <!-- <h1 class="bhm-title">benny hinn ministries</h1><h2 class="radio-title">internet radio</h2> -->
                        <img src="<?php echo site_url(); ?>/wp-content/themes/bhmsom/images/radio_logo.png" alt="Radio Logo">
                    </div>
                    <div class="radio-nav-wrapper">
                        <div class="radio-nav clearfix">
                            <ul>
                                <li class="radio-music button-wrap"><a href="<?php echo site_url(); ?>/radio-music/" class="element-button dark"><i class="fa fa-music"></i> Music</a></li>
                                <li class="radio-espanol button-wrap"><a href="<?php echo site_url(); ?>/radio-espanol/" class="element-button dark"><i class="fa fa-comment"></i> Espanol</a></li>
                                <li class="radio-teaching button-wrap"><a href="<?php echo site_url(); ?>/radio-teaching/" class="element-button dark"><i class="fa fa-check-square-o"></i> Teaching</a></li>
                                <li class="radio-fresh-manna button-wrap"><a href="<?php echo site_url(); ?>/radio-fresh-manna/" class="element-button dark"><i class="fa fa-book"></i> Fresh Manna</a></li>
                                <li class="donate-link button-wrap"><a href="http://www.bennyhinnbiblestudy.org/donate-now/" target="_blank" class="element-button">Donate</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="radio-content">
                        <?php the_content(); ?>
                    </div>
                    <div class="radio-footer">
                        <!-- <div class="footer-text"><a href="http://www.bennyhinn.org/schoolofministry/" target="_blank">Learn more about School of Ministry</a></div> -->
                        <!-- <ul class="social-networks social-networks-light" style="width: 181px;">
                            <li class="rss"><a target="_blank" href="http://www.bennyhinn.org/feed/">RSS</a>
                                <div class="popup">
                                    <div class="holder">
                                        <p>RSS</p>
                                    </div>
                                </div>
                            </li>
                            <li class="tf-pinterest"><a target="_blank" href="http://pinterest.com/bennyhinnorg/" class="pinterest">Pinterest</a>
                                <div class="popup">
                                    <div class="holder">
                                        <p>Pinterest</p>
                                    </div>
                                </div>
                            </li>
                            <li class="twitter"><a target="_blank" href="https://twitter.com/BennyHinn_Org">Twitter</a>
                                <div class="popup">
                                    <div class="holder">
                                        <p>Twitter</p>
                                    </div>
                                </div>
                            </li>
                            <li class="facebook"><a target="_blank" href="http://www.facebook.com/BennyHinnMinistries">Facebook</a>
                                <div class="popup">
                                    <div class="holder">
                                        <p>Facebook</p>
                                    </div>
                                </div>
                            </li>
                            <li class="email"><a target="_blank" href="http://www.bennyhinn.org/newsletter/">E-Newsletter</a>
                                <div class="popup">
                                    <div class="holder">
                                        <p>E-Newsletter</p>
                                    </div>
                                </div>
                            </li>
                        </ul> -->
                    </div>
                </div>                            
            </div>
        </div>
    <?php endwhile; ?>
</div>
<?php /* 5.7.15 get_footer(); */ ?>