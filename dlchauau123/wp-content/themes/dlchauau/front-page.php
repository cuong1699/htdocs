<?php
/**
 * Template Name: Front Page Template
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The front page template
 * in Twenty Twelve consists of a page content area for adding text, images, video --
 * anything you'd like -- followed by front-page-only widgets in one or two columns.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">

    <div class="blog-featured">
    <div class="items-row cols-2 row-1 clearfix">
    <div class="item column-1">
    <div class="contentpaneopen clearfix">
    <div class="img-intro-left">
    <img width="62" height="62" border="0" title="Tiết kiệm chi phí du lịch Châu Âu" alt="Tiết kiệm chi phí du lịch Châu Âu" src="images/homesl-4.png"></div>
    <h2 class="contentheading">Tiết kiệm chi phí</h2>
    <p>Công ty Kinh Đô với kinh nghiệm nhiều năm trong lĩnh vực du lịch Châu Âu,tư vấn miễn phí, tiết kiệm chi phí.</p>
    </div>
    <div class="item-separator">&nbsp;</div>
    </div>
    <div class="item column-2">
    <div class="contentpaneopen clearfix">
    <div class="img-intro-left"><img border="0" title="Thủ tục, hợp đồng" alt="Thủ tục, hợp đồng" src="images/icon_tech.png"></div>
    <h2 class="contentheading">Thủ tục, hợp đồng</h2>
    <p>Tư vấn thủ tục, làm hợp đồng du lịch Châu Âu nhanh chóng, thuận tiện có nhiều tour để quý khách hàng lựa chọn.</p>
    </div>
    <div class="item-separator">&nbsp;</div>
    </div>
    <!--span class="row-separator"></span--></div>
    <div class="items-row cols-2 row-0 clearfix">
    <div class="item column-1">
    <div class="contentpaneopen clearfix">
    <div class="img-intro-left"><img border="0" title="Giải đáp, tư vấn" alt="Giải đáp, tư vấn" src="images/icon_faq.png"></div>
    <h2 class="contentheading">Giải đáp, tư vấn</h2>
    <p>Chúng tôi tư vấn miễn phí, giải đáp hướng dẫn mọi thắc mắc của quý khách hàng khi đi du lịch Châu Âu.</p>
    </div>
    <div class="item-separator">&nbsp;</div>
    </div>
    <div class="item column-2">
    <div class="contentpaneopen clearfix">
    <div class="img-intro-left"><img border="0" title="Chính sách riêng tư khách hàng" alt="Chính sách riêng tư khách hàng" src="images/icon_private.png"></div>
    <h2 class="contentheading">Chính sách riêng tư</h2>
    <p>Kinh Đô Travel tôn trọng sự riêng tư và bảo mật các thông tin cá nhân người dùng.</p>
    </div>
    <div class="item-separator">&nbsp;</div>
    </div>
    <!--span class="row-separator"></span--></div>
    <div class="items-row cols-2 row-1 clearfix">
    <div class="item column-1">
    <div class="contentpaneopen clearfix">
    <div class="img-intro-left"><img border="0" title="Hỗ trợ 24/7" alt="Hỗ trợ 24/7" src="images/icon_support.png"></div>
    <h2 class="contentheading">Hỗ trợ 24/7</h2>
    <p>Hỗ trợ khách hàng qua điện thoại, email, ticket. Thân thiện và nhanh chóng. 24/7.</p>
    </div>
    <div class="item-separator">&nbsp;</div>
    </div>
    <div class="item column-2">
    <div class="contentpaneopen clearfix">
    <div class="img-intro-left"><img width="64" height="64" border="0" title="Dễ sử dụng" alt="Dễ sử dụng" src="images/setting.png"></div>
    <h2 class="contentheading">Cam kết dịch vụ</h2>
    <p>Với nhiều năm trong lĩnh vực du lịch Châu Âu, luôn làm quý khách hàng hài lòng.</p>
    </div>
    <div class="item-separator">&nbsp;</div>
    </div>
    <!--span class="row-separator"></span--></div>
    </div>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php //get_sidebar( 'front' ); ?>
<?php get_sidebar(); ?>
<?php require_once('botsl.php'); ?>
<?php get_footer(); ?>