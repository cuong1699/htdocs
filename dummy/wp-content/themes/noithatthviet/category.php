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
                            	<?php query_posts('showposts=4'); if(have_posts()):while (have_posts()) : the_post(); ?>
									<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
								<?php endwhile;
									  endif;
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
				  if ( have_posts() ): 
				  //Lấy category of cat hiện tại
					$category = get_category($cat);
					//check xem id hien tai co phai tin tuc khong
					if($category->cat_ID==1):?>
						<div class="cat_news">
								<ul>
									<?php while(have_posts()):the_post();?>
									<li>
										<a href="<?php the_permalink();?>"><?php the_post_thumbnail('product');?></a>
											<h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
												<?php twentyeleven_posted_on(); ?>
											<span><?php the_excerpt(); ?></span>
									</li>	
									<?php endwhile; ?>
								</ul>
						</div>
				<?php
					else:
				  ?>	
					<div class="slide_show">
                       <ul id="myGallery">
							<?php while(have_posts()):the_post();?>
                            <li><?php the_post_thumbnail('slideshow');?></li>
							<?php endwhile; ?>
                        </ul> 

                	</div>    
                   <div class="category_products">
							<ul>
									<?php while(have_posts()):the_post();?>
								<li>
									<a href="<?php the_permalink();?>"><?php the_post_thumbnail('product');?></a>
										<h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
								</li>
								<?php endwhile;?>
								
							</ul>
                        </div>  
						<div class="cleaner"></div>
							<?php wp_pagenavi();?>
					<?php endif; ?>
					
					<?php
					// Reset Query
					wp_reset_query();
					if($category->category_parent>0){
					$parent_cat_id = get_category($category->category_parent)->cat_ID;
					foreach(get_categories('child_of='.$parent_cat_id.'&&exclude=1,'.$category->cat_ID.'hide_empty=1') as $cat_child){
						// Reset Query
						wp_reset_query();
						query_posts('showposts=4&&cat='.$cat_child->cat_ID.'');
						if(have_posts()):
						?>
							<div class="products_other">
							<div class="title_artical_left"><?php echo $cat_child->cat_name;?></div>
							<div class="category_products">
								<ul>
									<?php while(have_posts()):the_post();?>
									<li>
										<a href="<?php the_permalink();?>"><?php the_post_thumbnail('product');?></a>
											<h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
									</li>
									<?php endwhile;?>
									
								</ul>
							</div>
						</div>
						<div class="cleaner"></div>
						<?php 
						endif;
						}
						}
					endif;?>
                <div class="cleaner"></div>
            </div>
           
<?php get_footer(); ?>