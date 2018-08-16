<?php

 function rk_slider_vc() {
	 $subparams = array(
     array(
       "type" => "colorpicker",
       "heading" => "Background color",
       "param_name" => "bg_color"
     ),
		  array(
        "type" => "attach_image",
        "heading" => "Background image",
        "param_name" => "bg_img"
      ),
      array(
        "type" => "attach_image",
        "heading" => "Background image mobile",
        "param_name" => "bg_img_mobile"
      ),
			array(
        "type" => "attach_image",
        "heading" => "Model image",
        "param_name" => "model_img"
      ),
      array(
        "type" => "attach_image",
        "heading" => "Model image mobile",
        "param_name" => "model_img_mobile"
      ),
			array(
        "type" => "attach_image",
        "heading" => "Object image",
        "param_name" => "object_img"
      ),
			array(
        "type" => "attach_image",
        "heading" => "Object image mobile",
        "param_name" => "object_img_mobile"
      ),
		 	array(
				"type" => "textfield",
				"heading" => "Slide title",
				"param_name" => "slide_title"
       ),
			array(
				"type" => "textarea",
				"heading" => "Slide content",
				"param_name" => "slide_content"
      ),
      array(
        "type" => "textfield",
				"heading" => "Button link",
				"param_name" => "btn_link"
      ),
      array(
        "type" => "textfield",
				"heading" => "Button text",
				"param_name" => "btn_txt"
      ),
      array(
        "type" => "colorpicker",
				"heading" => "Button color",
				"param_name" => "btn_color"
      ),
      array(
        "type" => "colorpicker",
				"heading" => "Title color",
				"param_name" => "title_color"
      )
    );

	 $params = array(
		  array(
        'type' => 'param_group',
        'param_name' => 'slides',
        'params' => $subparams
      ),
      array(
        'type' => 'textfield',
        "heading" => "Banners Title",
        "param_name" => "banner_title"
      ),
      array(
       'type' => 'textarea',
       "heading" => "Banners body",
       "param_name" => "banner_body"
      )
    );

	 vc_map(
     array(
     'name' => 'Slider',
     'base' => 'ra_slider',
     'category' => 'RK',
     'params' => $params
     )
    );
 }

 add_action( 'vc_before_init', 'rk_slider_vc' );