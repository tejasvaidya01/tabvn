<!-- Main Slider -->  
<div class="mainslider-container responsive" >
  <div class="mainslider" >
    <ul>

      <?php foreach ($nodes as $node): ?>

        <?php
        $transition = 'slotfade-horizontal';
        if (!empty($node->field_slider_transition[LANGUAGE_NONE][0]['value'])) {
          $transition = $node->field_slider_transition[LANGUAGE_NONE][0]['value'];
        }
	$image_field = field_get_items('node', $node, 'field_slider_image');

        $image_uri = $image_field[0]['uri'];
        $image_url = file_create_url($image_uri);
	$style_name = 'sliderblock';
        $thumb_style = 'thumbnail';

        $body = field_get_items('node', $node, 'body');

        //print theme('image_style', array('style_name' => $thumb_style, 'path' => $image_uri)); 

	//data-thumb="<?php print theme('image_style', array('style_name' => $thumb_style, 'path' => $image_uri)); 
	//data-thumb="<?php print image_style_url($style_name, $image_uri);
        //<li data-transition="<?php print $transition; ? REMOVE SPACE >" data-slotamount="6" data-masterspeed="900"  

        if (!empty($body[0]['value'])) {
          $body_value = $body[0]['value'];
        } else {
		  $body_value = "";
		}
        ?>
        <!-- SLIDE DOWN -->
        <li data-transition="fade" data-slotamount="6" data-masterspeed="900"  data-delay="7000"
         >
          <?php print theme('image_style', array('style_name' => $style_name, 'path' => $image_uri)); ?>
          <?php print $body_value; ?>
        </li>

      <?php endforeach; ?>

    </ul>
    <div class="tp-bannertimer1"></div>
  </div>
</div>

<!-- End Main Slider -->
