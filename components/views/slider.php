<?php
$dir_base = get_template_directory();

function getAttachment($arr, $field) {
	return isset($arr[$field]) ? wp_get_attachment_url($arr[$field]) : '';
}

function parseSlides($slides) {
	$parseAtts = function_exists('vc_param_group_parse_atts') ? vc_param_group_parse_atts( $slides ) : array();

	$arrResult = array_map(function($slide) {
		if(!empty($slide)) {
			$slide['bg_img'] = getAttachment($slide, 'bg_img');
			$slide['bg_img_mobile'] = getAttachment($slide, 'bg_img_mobile');
			$slide['model_img'] = getAttachment($slide, 'model_img');
			$slide['model_img_mobile'] = getAttachment($slide, 'model_img_mobile');
			$slide['object_img'] = getAttachment($slide, 'object_img');
			$slide['object_img_mobile'] = getAttachment($slide, 'object_img_mobile');
		}

		return $slide;

	}, $parseAtts);

	return $arrResult;
}

function ra_slider_sc( $atts , $content) {
  $at = shortcode_atts( array( 'slides' => '', 'banner_title' => '',  'banner_body' => ''), $atts );

	$slides = parseSlides($at['slides']);
	// $slides = vc_param_group_parse_atts($atts['slides']);
	$slidesJson = json_encode($slides);

  ob_start();
	?>

    <!--rk_slider html-->
    <div class="header-slider">
        <div class="header-inner">
            <div class="slider-container">
                <div class="slider">
                    <?php foreach($slides as $slide): ?>
                        <img src="<?php echo $slide['bg_img'] ?>" class="slide-img" alt="">
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="container container--wide">
                <div class="container--wide-content">
                    <h1><?php  echo $at['banner_title'] ?></h1>
                    <p class="white-text"><?php  echo $at['banner_body'] ?></p>
                </div>
            </div>
        </div>
        
    </div>
	
    

	<!--/rk_slider html-->

	<?php
	return ob_get_clean();
}

add_shortcode(	'ra_slider', 'ra_slider_sc' );
