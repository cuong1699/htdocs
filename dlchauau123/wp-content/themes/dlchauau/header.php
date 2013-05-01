<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="refresh" content="600">
<meta name="viewport" content="width=device-width" />
<link rel="shortcut icon" href="http://www.lat.vn/favicon.ico" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
<script src="http://cdn.fptshop.com.vn/Scripts/script_head.min.js" type="text/javascript"></script>
<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>

</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<header id="masthead" class="site-header" role="banner">
        
		<div class="header">
            
			<h4 class="logo"> <a href="<?php echo get_bloginfo('url') ?>" title="Du lịch Châu Âu,Tour du lịch Châu Âu giá rẻ-Kinh Đô Travel">
                    <img src="http://dulichchauau123.com/wp-content/themes/dlchauau/images/logo.png" alt="Du lịch Châu Âu,Tour du lịch Châu Âu giá rẻ-Kinh Đô Travel" title="Du lịch Châu Âu,Tour du lịch Châu Âu giá rẻ-Kinh Đô Travel"/>
                </a>
            </h4>
            
            <?php if ( is_active_sidebar( 'topmenu' ) ) : ?>
    	
             <div class="topmenu">
                 <?php dynamic_sidebar( 'topmenu' ); ?>
             </div  > 
    	    <?php endif; ?>
            
            <?php if ( is_active_sidebar( 'hotline-module' ) ) : ?>
    	    <div id="hotline-module">
                 <?php dynamic_sidebar( 'hotline-module' ); ?>
            </div>
    	    <?php endif; ?>
			<!--Tin Tức mới-->
		<?php wp_reset_query();query_posts('cat=1'); if(have_posts()): while (have_posts()) : the_post(); ?>
		<div class="firstLine">
				<div class="topBar">
				<script>
					function tick(){
					
						$('#ticker_01frt li:first').slideUp( function () { 
						//alert("show test");
						$(this).appendTo($('#ticker_01frt')).slideDown(); 
						
						});
					}
					setInterval(function(){ tick () }, 3000);
				</script>

					<div class="hotnewfrt">
						<span class="hottitle" style="50px; float:left;">TIN MỚI : </span>
						<span>
										<ul id="ticker_01frt" class="ticker">
																					   
										<li style="display: list-item;">
													<a href="<?php the_permalink(); ?>" rel="nofollow"><?php the_title(); ?></a></li></ul>
													<?php endwhile ?>
						</span>
					</div>
				</div>

			</div>
			<?php endif ?>
			<!--hết Tin Tức mới-->
		</div>
  </header><!-- #masthead -->
        <div class="menu-navigation">
			<nav id="site-navigation" class="main-navigation" role="navigation">
    			<h3 class="menu-toggle">MAIN MENU</h3>
    			<div class="menu-main-menu-container">
                	<ul id="menu-main-menu" class="nav-menu">
                    	<li><span class="trangchu"><a title="Du lịch Châu Âu,Tour du lịch Châu Âu giá rẻ-Kinh Đô Travel" href="<?php echo get_bloginfo('url') ?>" rel="home">Tour Châu Âu</a></span></li>
						<li><a href="#" title="Du lịch Châu Âu giá rẻ">Du lịch Châu Âu giá rẻ</a></li>
						<li><a href="#" title="Tin tức,cẩm nang">Tin tức,cẩm nang</a></li>
						<li><a href="#" title="Giới Thiệu">Giới Thiệu</a></li>
                       			 	<li><a href="#" title="Kinh nghiệm">Kinh nghiệm</a></li>

					</ul>
                  </div>    		
			</nav><!-- #site-navigation -->
		
		
        </div>

		
		<?php $header_image = get_header_image();
		if ( ! empty( $header_image ) ) : ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $header_image ); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a>
		<?php endif; ?>

     <?php if(is_home()):?>
     <link rel="stylesheet" href="css/responsiveslides.css"/>
      <link rel="stylesheet" href="css/demo.css"/>
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
      <script src="js/responsiveslides.min.js"></script>
      <script>
        // You can also use "$(window).load(function() {"
        $(function () {
    
          // Slideshow 3
          $("#slider").responsiveSlides({
            auto: true,
            pager: false,
            nav: true,
            speed: 500,
            namespace: "callbacks",
            before: function () {
              $('.events').append("<li>before event fired.</li>");
            },
            after: function () {
              $('.events').append("<li>after event fired.</li>");
            }
          });
    
        });
      </script>
     
     <?php if ( is_active_sidebar( 'slideshow' ) ) : ?>
    	<div id="sl_contain">
         <div class="slideshow">
             <?php dynamic_sidebar( 'slideshow' ); ?>
             
         </div  > 
		 </div >
         
	 <?php endif; ?>
     <div class="like-home">
        <g:plusone size="medium"></g:plusone><span class="author vcard"><a class="url fn n" href="http://dulichchauau123.com/author/KinhDo/" title="admin" rel="author">admin</a></span>
    	<div class="fb-like" data-href="http://dulichchauau123.com" data-send="true" data-layout="button_count" data-width="100" data-show-faces="true"></div>
    	<div id="fb-root"></div>
    		<script>(function(d, s, id) {
    			var js, fjs = d.getElementsByTagName(s)[0];
    			if (d.getElementById(id)) return;
    			js = d.createElement(s); js.id = id;
    			js.src = "//connect.facebook.net/vi_VN/all.js#xfbml=1&appId=499957860023910";
    			fjs.parentNode.insertBefore(js, fjs);
    		}(document, 'script', 'facebook-jssdk'));
    		</script>
             
         </div>
     
     <?php endif;?>

 <div id="mainwrap">
	<div id="main" class="wrapper">