<?php ?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'thviet' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
<link type="text/css" rel="stylesheet" href="css/jquery.galleryview-3.0-dev.css" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<!-- Second, add the Timer and Easing plugins -->
<script type="text/javascript" src="js/jquery.timers-1.2.js"></script>


<!-- Third, add the GalleryView Javascript and CSS files -->
<script type="text/javascript" src="js/jquery.galleryview-3.0-dev.js"></script>
<!-- Lastly, call the galleryView() function on your unordered list(s) -->
<script type="text/javascript">
	$(function(){
		$('#myGallery').galleryView();
	});
</script>   

<!--[if lt IE 7]>
<link rel="stylesheet" type="text/css" href="css/kGallery_ie6.css"/>
<![endif]-->
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php
	wp_head();
?>
</head>

<body>
	<div id="container">
        <div id="maincontent">
            <div class="header">
                <div class="info_header">
                    <div class="top_menu">
                    	<a href="<?php echo home_url(); ?>">Trang chủ</a>
                        <a href="#">Tuyển dụng</a>
                        <a href="#">Hỗ trợ khách hàng</a>
                    </div>
                    <div class="language">
                    	<a href="#"><img src="images/icon_vn.gif" /></a>
                        <a href="#"><img src="images/ico_en.gif" /></a>
                    </div>
                    <div class="cleaner"></div>
                </div>
            </div>
            <div class="main_menu">
                <div class="list_menu">
                  
                    <div id='cssmenu'>
                        <ul>
                           <li class="home"><a href="<?php echo home_url(); ?>" title="#" rel="home"><img src="images/ico_home.gif" /></a></li>
                           <li class='has-sub '><a href='#' title="#" rel="products"><span>Sản phẩm</span></a>
                              <ul>
                                 <li class='has-sub '><a href='#' title="#" rel="product 1"><span>Product 1</span></a>                                    
                                 </li>
                                 <li class='has-sub '><a href='#' title="#" rel="product 2"><span>Product 2</span></a>                                    
                                 </li>
                              </ul>
                           </li>
                           <li><a href='#' title="#" rel="introduction"><span>Giới thiệu</span></a></li>
                           <li><a href='#' title="#" rel="news"><span>Tin tức</span></a></li>
                           <li><a href='#' title="#" rel="contact"><span>Liên hệ</span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="search">
                        	<input type="text" autocomplete="on" size="10" class="i-search" name="search" placeholder="Tìm Kiếm" />
                	
                </div>
            </div><!-- #hetheader -->