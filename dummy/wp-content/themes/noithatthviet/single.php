<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>
 <div class="main_content">            	
                <div class="left_content_subpage">
                	<div class="news_hot">
                    	<div class="title_artical_left">Tin mới</div>
                        <div class="list_news">
                        	<ul>
                            	<?php query_posts('showposts=4'); while (have_posts()) : the_post(); ?>
									<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
								<?php endwhile;
								// Reset Query
								wp_reset_query();
								?>
                            </ul>
                        </div>
                    </div>
                    <div class="support_contact">
                    	<div class="title_artical_left">Hỗ trợ trực tuyến</div>
                        <div class="inner_content">
                                <p>
                                    <a href="ymsgr:sendIM?bodohoto">
                                      <img border="0" src="http://opi.yahoo.com/online?u=bodohoto&amp;m=g&amp;t=1">
                                      
                                      </a>
                                      <!--img src="images/ym.gif" alt="YM" width="93" height="20" border="0" /-->                                
                                      
                                      <a title="Skype Me™!" href="skype:dangnb?chat"><img width="67" height="16" border="0" title="YM!" alt="Skype Me" src="images/skypeme.gif"></a>                              
                                  </p>
                              <p>
                                  <a href="ymsgr:sendIM?bodohoto">
                                  <img border="0" src="http://opi.yahoo.com/online?u=bodohoto&amp;m=g&amp;t=1">
                                  
                                  </a>
                                  <!--img src="images/ym.gif" alt="YM" width="93" height="20" border="0" /-->                                
                                  
                                  <a title="Skype Me™!" href="skype:dangnb?chat"><img width="67" height="16" border="0" title="YM!" alt="Skype Me" src="images/skypeme.gif"></a>                              
                              </p>
                              <p><a href="ymsgr:sendIM?bodohoto">
                              <img border="0" src="http://opi.yahoo.com/online?u=bodohoto&amp;m=g&amp;t=1">
                              
                              </a>
                              <!--img src="images/ym.gif" alt="YM" width="93" height="20" border="0" /-->                                
                              
                              <a title="Skype Me™!" href="skype:dangnb?chat"><img width="67" height="16" border="0" title="YM!" alt="Skype Me" src="images/skypeme.gif"></a>                              
                              </p>
                              <div class="phone_number">
                              	0936 997 628
                              </div>
                        </div>
                    </div>
                    <div class="banner_adv">
                    	<img src="images/yo_474754991_05092012.jpg" />
                    </div>
                </div>
                <div class="right_content">
                	<div class="breakcruum"><a href="#" title="#" rel="introduction">Trang chủ</a>&raquo; <a href="#" title="#" rel="introduction">Sản phẩm</a></div>
                  
				  <?php 
				  //Get the current post of category
				  if ( have_posts() ): ?>	
					<?php while(have_posts()):the_post();?>
						<h1 class="entry-title"><?php the_title(); ?></h1>
						   <div class="post-content">
								<?php the_content();?>
							</div>
					<?php endwhile;?>	
						<div class="cleaner"></div>
						
						<!--Bài Viết Liên Quan-->
					<?php
						$categories = get_the_category($post->ID);
						if ($categories) {
							$category_ids = array();
							foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
							
							$args=array(
								'category__in' => $category_ids,
								'post__not_in' => array($post->ID),
								'showposts'=>4, // Số lượng bài sẽ lấy
								'caller_get_posts'=>1
							);
							$my_query = new wp_query($args);
							
							if( $my_query->have_posts() ) {
								echo '<h2 class="related-product">Sản Phẩm Liên Quan</h3><ul>';
								while ($my_query->have_posts()) {
									$my_query->the_post();
								?>
								<div class="category_products">
									<ul>
										<li>
									<a href="<?php the_permalink();?>"><?php the_post_thumbnail('smallsize');?></a>
										<h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
										</li>
									</ul>
								</div>  
								<?php
								}
							}
						}
						?>
						<!---hết Bài Viết Liên Quan-->
					<?php endif; ?>
                            <div class="cleaner"></div>
                        </div>
                        </div>
                
                <div class="cleaner"></div>
            </div>
           
<?php get_footer(); ?>
