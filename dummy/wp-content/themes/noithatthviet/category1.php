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
								<?php endwhile;?>
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
                   	<div class="slide_show">
                       <ul id="myGallery">
                            <li><img src="http://www.spaceforaname.com/galleryview/img/photos/bp1.jpg" alt="Lone Tree Yellowstone" />
                            <li><img src="http://www.spaceforaname.com/galleryview/img/photos/bp2.jpg" alt="Is He Still There?!" />
                            <li><img src="http://www.spaceforaname.com/galleryview/img/photos/bp4.jpg" alt="Noni Nectar For Green Gecko" />
                            <li><img src="http://www.spaceforaname.com/galleryview/img/photos/bp7.jpg" alt="Flight of an Eagle Owl" />
                            <li><img src="http://www.spaceforaname.com/galleryview/img/photos/bp14.jpg" alt="Winter Lollipops" />
                            <li><img src="http://www.spaceforaname.com/galleryview/img/photos/bp26.jpg" alt="Day of Youth" />
                            <li><img src="http://www.spaceforaname.com/galleryview/img/photos/bp27.jpg" alt="Sunbathing Underwater" />
                        </ul> 

                	</div>    
                   <?php if ( have_posts() ) : ?>
                   <div class="category_products">
							<ul>
								<?php
									while(have_posts()):the_post();?>
								<li>
									<a href="<?php the_permalink();?>"><?php the_post_thumbnail('smallsize');?></a>
										<h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
								</li>
								<?php endwhile?>
							</ul>
                        </div>  
						<div class="cleaner"></div>
                        <div class="break_page" align="right">
							<?php wp_pagenavi();?>
					<?php endif; ?>
                    </div>
                    <div class="products_other">
                    	<div class="title_artical_left">Nội thất phòng khách</div>
                        <div class="inner_products_other">
                        	 <div>
                            <div class="pro_list_sub_page">
                                <div class="img_thumb"><a href="#"><img src="images/3.jpg" /></a></div>
                                <div class="name_cate_product"><a href="#" title="#" rel="">Nội thất phòng ở</a></div>
                            </div>
                            <div class="pro_list_sub_page">
                                <div class="img_thumb"><a href="#"><img src="images/1.jpg" /></a></div>
                                <div class="name_cate_product"><a href="#" title="#" rel="">Nội thất phòng ở</a></div>
                            </div>
                            <div class="pro_list_sub_page">
                                <div class="img_thumb"><a href="#"><img src="images/2.jpg" /></a></div>
                                <div class="name_cate_product"><a href="#" title="#" rel="">Nội thất phòng ở</a></div>
                            </div>
                            
                            <div class="pro_list_sub_page" style="padding:0px;">
                                <div class="img_thumb"><a href="#" title="#" rel=""><img src="images/4.jpg" /></a></div>
                                <div class="name_cate_product"><a href="#" title="#" rel="">Nội thất phòng ở</a></div>
                            </div>               
                            <div class="cleaner"></div>
                        </div>
                        </div>
                    </div>
                     <div class="products_other">
                    	<div class="title_artical_left">Nội thất phòng khách</div>
                        <div class="inner_products_other">
                        	 <div>
                            <div class="pro_list_sub_page">
                                <div class="img_thumb"><a href="#"><img src="images/3.jpg" /></a></div>
                                <div class="name_cate_product"><a href="#" title="#" rel="">Nội thất phòng ở</a></div>
                            </div>
                            <div class="pro_list_sub_page">
                                <div class="img_thumb"><a href="#"><img src="images/1.jpg" /></a></div>
                                <div class="name_cate_product"><a href="#" title="#" rel="">Nội thất phòng ở</a></div>
                            </div>
                            <div class="pro_list_sub_page">
                                <div class="img_thumb"><a href="#"><img src="images/2.jpg" /></a></div>
                                <div class="name_cate_product"><a href="#" title="#" rel="">Nội thất phòng ở</a></div>
                            </div>
                            
                            <div class="pro_list_sub_page" style="padding:0px;">
                                <div class="img_thumb"><a href="#" title="#" rel=""><img src="images/4.jpg" /></a></div>
                                <div class="name_cate_product"><a href="#" title="#" rel="">Nội thất phòng ở</a></div>
                            </div>               
                            <div class="cleaner"></div>
                        </div>
                        </div>
                    </div>
                </div>
                
                <div class="cleaner"></div>
            </div>
           
<?php get_footer(); ?>
