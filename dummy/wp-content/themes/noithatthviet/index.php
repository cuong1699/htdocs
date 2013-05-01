<?php get_header(); ?>

            <div class="main_content">
            	<div class="right_content">
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
                </div>
                <div class="left_content">
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
                    <div class="support_online">
                    	<div class="icon_chat">
                        	<a href="#"><img src="images/ico_yahoo.png" /></a>
                            <a href="#"><img src="images/ico_skype.png" /></a>
                        </div>
                        <div class="hotline">
                        	0936 997 628
                        </div>
                    </div>
                </div>
                <div class="cleaner"></div>
            </div>
            <div class="category_products">
            	<div class="pro_list">
                	<div class="img_thumb"><a href="#"><img src="images/1.jpg" /></a></div>
                    <div class="name_cate_product"><a href="#" title="#" rel="">Nội thất phòng ở</a></div>
                </div>
                <div class="pro_list">
                	<div class="img_thumb"><a href="#"><img src="images/2.jpg" /></a></div>
                    <div class="name_cate_product"><a href="#" title="#" rel="">Nội thất phòng ở</a></div>
                </div>
                <div class="pro_list">
                	<div class="img_thumb"><a href="#"><img src="images/3.jpg" /></a></div>
                    <div class="name_cate_product"><a href="#" title="#" rel="">Nội thất phòng ở</a></div>
                </div>
                <div class="pro_list">
                	<div class="img_thumb"><a href="#"><img src="images/4.jpg" /></a></div>
                    <div class="name_cate_product"><a href="#" title="#" rel="">Nội thất phòng ở</a></div>
                </div>
                <div class="pro_list" style="padding:0px;">
                	<div class="img_thumb"><a href="#" title="#" rel=""><img src="images/3.jpg" /></a></div>
                    <div class="name_cate_product"><a href="#" title="#" rel="">Nội thất phòng ở</a></div>
                </div>               
                <div class="cleaner"></div>
            </div>
<?php get_footer(); ?>