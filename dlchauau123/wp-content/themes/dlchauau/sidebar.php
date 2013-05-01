<?php
/**
 * The sidebar containing the main widget area.
 *
 * If no active widgets in sidebar, let's hide it completely.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
<div id="secondary" class="widget-area" role="complementary">
			<h3 class="tuvan">Tư vấn trực truyến</h3>		<ul>
					<li class="hotline">
<img class="avatar" border="0" alt="Tư vấn trực tuyến Tour du lịch Châu Âu" title="Tư vấn trực tuyến Tour du lịch Châu Âu" src="http://dulichchauau123.com/images/ho-tro-truc-tuyen.png">
<span class="ten">Hỗ trợ 1</span>
<span class="sdt"><a href="tel:+84435190717" rel="nofollow" title="Call">043.519.0717</a></span>
<a target="_blank" href="ymsgr:sendim?Huong_kinhdotravel" rel="nofollow" title="Tư vấn trực tuyến Tour du lịch Châu Âu">
<img src="http://opi.yahoo.com/online?u=Huong_kinhdotravel&m=g&t=1">
</a>
</li>
					<li class="hotline">
<img class="avatar" border="0" alt="Tư vấn trực tuyến Tour du lịch Châu Âu" title="Tư vấn trực tuyến Tour du lịch Châu Âu" src="http://dulichchauau123.com/images/ho-tro-truc-tuyen.png">
<span class="ten">Hỗ trợ 2</span>
<span class="sdt"><a href="tel:+84435190727" rel="nofollow" title="Call">043.519.0727</a></span>
<a target="_blank" href="ymsgr:sendim?Outbound02travel" rel="nofollow" title="Tư vấn trực tuyến Tour du lịch Châu Âu">
<img src="http://opi.yahoo.com/online?u=Outbound02travel&m=g&t=1">
</a>
</li>
					


				</ul>
	</div><!-- #secondary -->
		<div id="secondary" class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</div><!-- #secondary -->
	<?php endif; ?>
