<?php ?>

<div class="footer">
            	<aside class="news_content_footer">
                	<div class="pos_artical">
						<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-giadinh') ) : ?>
							<h3 class="name_sub_products">Nội thất Gia Đình </h3>
						<?php
						endif; ?>
                    </div>
                    <div class="pos_artical">
                        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-vanphong') ) : ?>
							<h3 class="name_sub_products">Nội thất văn phòng </h3>	
						<?php
						endif; ?>
                    </div>
                    <div class="pos_artical">
                    	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-tohop') ) : ?>
							<h3 class="name_sub_products">Nội thất Tổ hợp </h3>
						<?php
						endif; ?>
                    </div>
                    <div class="pos_artical">
                        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-spa') ) : ?>
							<h3 class="name_sub_products">Nội thất spa - massage </h3>
						<?php
						endif; ?>
                    </div>
                    <div class="pos_artical">
                    	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-duan') ) : ?>
							<h3 class="name_sub_products">DỰ ÁN ĐÃ THỰC HIỆN</h3>
						<?php
						endif; ?>
                    </div>
                    <div class="cleaner"></div>
                </aside>
                <div class="menu_bottom">
                	<ul>
                    	<li><a href="#" title="" rel="">Trang chủ</a></li>
                        <li><a href="#" title="" rel="">Giới thiệu</a></li>
                        <li><a href="#" title="" rel="">Sản phẩm</a></li>
                        <li><a href="#" title="" rel="">Tin tức</a></li>
                        <li><a href="#" title="" rel="">Liên hệ</a></li>
                    </ul>
                </div>
                <div class="info_website">
                	<div class="information_detail">
                    	Số 89 Ngõ 12 Bồ Đề, Long Biên - Hà Nội, Việt Nam<br />s
Email: contact@thviet.vn  *  Tel: 0438 729 375 - Hotline: 09678.6.2345
                    </div>
                    <div class="copyright"> © 2009 - 2013 TH Việt |Thiết kế Website bởi LAT

</div>
					<div class="cleaner"></div>
                </div>
            </div>
        </div>
    </div>

<?php wp_footer(); ?>

</body>
</html>