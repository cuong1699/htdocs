<?php
/**
 * @package DummySlide
 * @version 1.0
 */
/*
Plugin Name: Dummy Slide
Plugin URI: http://www.thviet.vn
Description: Plugin giúp tạo ra 1 slide ảnh tùy chỉnh trong post.
Author: Cuong Nghiem
Version: 1.0
Author URI: http://www.thviet.vn
*/
	global $wp_version;
	if(version_compare($wp_version,'3.5.1','<')){
		die('Your Wordpress\' version is NOT compatible with this plugin please <a href="update-core.php">Update</a>');
	}
//Create some js and css for the image uploader
add_action('admin_enqueue_scripts', 'my_admin_scripts');
//add_action('wp_enqueue_scripts', 'slide_show_js');
//add_action('init', 'modify_jquery');
//add_action('wp_head','slide_show_css');
function my_admin_scripts() {
        wp_enqueue_media();
        wp_register_script('my-admin-js', WP_PLUGIN_URL.'/DummySlide/js/upload.js', array('jquery'));
        wp_enqueue_script('my-admin-js');
}
//Making jQuery Google API so we can use the slide show
function modify_jquery() {
	if (!is_admin()) {
		// comment out the next two lines to load the local copy of jQuery
		wp_deregister_script('jquery');
		wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js', false, '1.8.1');
		wp_enqueue_script('jquery');
	}
}
$meta_box = array(
	'id' => 'slide_show_box',
	'title' => 'Dummy SlideShow',
	'page' => 'post',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(array(
			'name' => 'upload_image',
			'desc' => 'Enter something here',
			'id' => 'upload_image',
			'type' => 'textarea'
		),
		array(
			'name' => 'image_id',
			'desc' => 'Enter something here',
			'id' => 'image_id',
			'type' => 'text'
		))
	);
add_action('admin_menu', 'slide_add_box');
// Add meta box
function slide_add_box() {
	global $meta_box;
	add_meta_box($meta_box['id'], $meta_box['title'], 'slide_show_box', $meta_box['page'], $meta_box['context'], $meta_box['priority']);
}

// Callback function to show fields in meta box
function slide_show_box() {
	global $meta_box, $post;
		$field = $meta_box['fields'];
		//use nonce to verify
		echo '<input type="hidden" name="slide_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
		 foreach ($meta_box['fields'] as $field) {
		// get current post meta data
		$meta = get_post_meta($post->ID, $field['id'], true);
		 switch ($field['type']) {
			case 'text':
				echo '<input type="text" placeholder="ID của ảnh upload lên sẽ được để tại đây"  name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" size="30" style="width:97%" READONLY/>', '<br />';
				break;
			case 'textarea':
				echo '<textarea placeholder="Điền link ảnh từ ngoài vào đây" name="', $field['id'], '" id="', $field['id'], '" cols="60" rows="4" style="width:97%">', $meta ? $meta : $field['std'], '</textarea>', '<br />';
				break;
			}
		}
		?>
		<br />
			<script>
				jQuery(document).ready(function(){
					jQuery("#upload_image").change(function(){
						if(jQuery("#upload_image").val()!='')
						jQuery("#image_id").remove();
					});
					if(jQuery("#image_id").val()!=''){
						jQuery("#upload_image").val('');
					}
					});
			</script>
		<input id="upload_image_button" class="button" type="button" value="Select Image" />
<?php
}

add_action('save_post', 'slideshow_save_data');

// Save data from meta box
function slideshow_save_data($post_id) {
	global $meta_box;
	// verify nonce
	if (!wp_verify_nonce($_POST['slide_meta_box_nonce'], basename(__FILE__))) {
		return $post_id;
	}

	// check autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}

	// check permissions
	if ('page' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id)) {
			return $post_id;
		}
	} elseif (!current_user_can('edit_post', $post_id)) {
		return $post_id;
	}
	
		 foreach ($meta_box['fields'] as $field) {
			$old = get_post_meta($post_id, $field['id'], true);
			$new = $_POST[$field['id']];
			if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], $new);
			} elseif ('' == $new && $old || (!isset($_POST[$field['id']]))) {
			delete_post_meta($post_id, $field['id'], $old);
			}
		}
}
//add the slide show to the content;
function add_post_slide($content){
				if(get_post_meta(get_the_ID(),'upload_image', true) == null){
					if(get_post_meta(get_the_ID(),'image_id', true) == null){
						return $content;
					}
					$slide_show ="<div class='slide_show'>
                           <ul id='myGallery'>";
							$image_id= explode(',',get_post_meta(get_the_ID(),'image_id', true));
					if(count($image_id)==0)
						return $content;

						for($i=0;$i<count($image_id)-1;$i++){
							$attr = array(
								'src'	=> $src,
								'class'	=> "attachment-$size",
								'alt'   => trim(strip_tags( get_post_meta($attachment_id, '_wp_attachment_image_alt', true) )),
								'title' => get_the_title($image_id[$i])
							);
								$slide_show.='<li>'.wp_get_attachment_image(intval($image_id[$i]),'full',$attr).$image_id[i].'</li>\n';
								}
							$slide_show.='</ul>
                    </div>';
							return $slide_show.$content;
				}
				$image_title = get_the_title(get_the_ID());
				$slide_show ="<div class='slide_show'>
                           <ul id='myGallery'>";
				$image_link = explode(',',get_post_meta(get_the_ID(),'upload_image', true));
				if(count($image_link)==0)
					return $content;
				for($i=0;$i<count($image_link)-1;$i++){
						$slide_show.="<li><img src='$image_link[$i]' alt='".$image_title."' /></li>\n";
								}
				$slide_show.="</ul>
                    </div>";
							return $slide_show.$content;
								}							
//Add the slide to the post when publish it
	add_filter('the_content','add_post_slide');
?>
