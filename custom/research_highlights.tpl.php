<?php
if (empty($title)) {
  $title = t('Research Highlights');
}
?>
<!-- Recent Work -->        
<div class="row">

  <div class="twelve columns">

    <h3><?php print $title; ?></h3> 

    <!-- // // // // // // // // // // -->
    <div class="list_carousel">
      <div class="carousel_nav">
        <a class="prev" id="car_prev" href="#"><span><?php print t('prev'); ?></span></a>
        <a class="next" id="car_next" href="#"><span><?php print t('next'); ?></span></a>
      </div>
      <div class="clearfix"></div>
      <ul id="carousel-works">
        <?php
        $i = 0;
        foreach ($nodes as $node):
          ?>
          <li>
            <div class="work-item contentHover"> 
              <?php
              $image_uri = $node->field_image[LANGUAGE_NONE][0]['uri'];
              $image_url = file_create_url($image_uri);
              $style_name = 'story_item';
              $node_url = url('node/' . $node->nid);

              $image = theme('image_style', array('style_name' => $style_name, 'path' => $image_uri));
              ?>
              <div class="content"> 
                <div class="work-item-image">        
                  <?php print $image;?>
                </div>

                <div class="work-item-content">
                  <strong><?php print l($node->title, 'node/' . $node->nid); ?></strong>
                  <?php 
//print custom_trim_text(array('max_length' => 70, 'html' => true, 'ellipsis' => true), $node->body[LANGUAGE_NONE][0]['value']); 
print custom_trim_text(array('max_length' => 70, 'html' => true, 'ellipsis' => true), $node->body[LANGUAGE_NONE][0]['value']); 
?> 
                </div>            
              </div>

              <div class="hover-content">
                <h3><?php print l($node->title, 'node/' . $node->nid); ?></h3>                                    
                <?php print custom_trim_text(array('max_length' => 200, 'html' => true, 'ellipsis' => true), $node->body[LANGUAGE_NONE][0]['value']); ?>
                <div class="hover-links">
                  <a href="<?php print $node_url; ?>" class="view-item"><span>&nbsp;</span></a> 
                  <a class="titan-lb view-image" href="<?php print $image_url; ?>" title="<?php print $node->title; ?>"><span>&nbsp;</span></a>
                </div>                             
              </div>

            </div>        
          </li>
          <?php
          $i++;
        endforeach;
        ?>

      </ul>

      <div class="view-footer">
        <?php print l("Read Archived Highlights ", 'research-highlights/archive', array('attributes' => array('class' => array('all-news')))); ?>

      <!--  <?php print l('', 'research-highlights/archive', array('attributes' => array('class' => array('next all-text-arrow')))); 
?> -->

      </div>
</div>

      <div class="clearfix"></div>
    </div>
    <!-- // // // // // // // // // // -->

  </div>  
</div>
<!-- End Recent Work -->  
