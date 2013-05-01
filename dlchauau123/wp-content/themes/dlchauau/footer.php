<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
<div id="footer-wrap">
	<div class="footer">
        <a rel="nofollow" href="#" id="topofpage" title="Lên trên">Lên trên</a>
		<div class="site-info">
            <div itemtype="http://schema.org/LocalBusiness" itemscope="">        
                <?php if(is_home()):?>
                    <h1><span itemprop="name">Tour Châu Âu,du lịch Châu Âu giá rẻ- Kinh Đô Travel</span></h1>
                <?php else: ?>
                    <span itemprop="name">Tour Châu Âu,du lịch Châu Âu giá rẻ- Kinh Đô Travel</span>
                <?php endif; ?>
                      
                      <div itemtype="http://schema.org/PostalAddress" itemscope="" itemprop="address">
                       <span itemprop="streetAddress">P2008 Tầng 20 - Tòa Tháp Thành Công - 57 Láng Hạ</span> - 
                      <span itemprop="addressLocality">Hà Nội</span> - 
                        <span itemprop="addressRegion">Việt Nam</span>
                      </div>
                    Phone: <span itemprop="telephone">04 3519 0717</span>
                      E-mail: <span itemprop="email">info(at)kinhdotravel.com</span>
         </div>
                    Copyright &copy; 2013 Tour Châu Âu,du lịch Châu Âu giá rẻ- Kinh Đô Travel. All Rights Reserved. <a href="http://dulichchauau123.com/feed" title="RSS" rel="nofollow" target="blank">RSS</a> | <a href="http://dulichchauau123.com/chinh-sach-dieu-khoan/" title="Chính sách - điều khoản" rel="nofollow" target="blank">Chính sách - điều khoản</a>
                    
                				

		</div><!-- .site-info -->
	</div><!-- #colophon -->
</div>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>