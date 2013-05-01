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
                    <h1><span itemprop="name">Thiết kế Website &amp; Dịch vụ SEO - LAT</span></h1>
                <?php else: ?>
                    <span itemprop="name">Thiết kế Website &amp; Dịch vụ SEO - LAT</span>
                <?php endif; ?>
                      
                      <div itemtype="http://schema.org/PostalAddress" itemscope="" itemprop="address">
                       <span itemprop="streetAddress">Số 89 ngõ 12 Bồ Đề, phường Bồ Đề</span>
                      <span itemprop="addressLocality">Quận Long Biên, Hà Nội</span>
                        <span itemprop="addressRegion">Việt Nam</span>
                      </div>
                    Phone: <span itemprop="telephone">09678.6.2345</span>
                      E-mail: <span itemprop="email">doiseo.com(at)gmaill.com</span>
         </div>
                    Copyright &copy; 2013 Thiết kế Website chuyên nghiệp, uy tín, chuẩn SEO - LaT. All Rights Reserved. <a href="http://www.lat.vn/feed" title="RSS" rel="nofollow" target="blank">RSS</a> | <a href="http://www.lat.vn/chinh-sach-dieu-khoan/" title="Chính sách - điều khoản" rel="nofollow" target="blank">Chính sách - điều khoản</a>
                    
                				

		</div><!-- .site-info -->
	</div><!-- #colophon -->
</div>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>