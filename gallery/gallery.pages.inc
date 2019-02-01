<?php

function gallery_default_page($type = NULL) {


    global $user;

    $default_gallery = $type;
    if (empty($type)) {

        $default_gallery = theme_get_setting('default_gallery', 'touchm');
		
    }



    $gallery_type_arr = array('4c', '3c', '2c', '1c');
    $build = array();


    if (in_array($default_gallery, $gallery_type_arr)) {


        $query = db_select('node', 'n')->extend('PagerDefault');
        $nids = $query
                ->fields('n', array('nid', 'sticky', 'created'))
                ->condition('type', 'gallery')
                ->condition('status', 1)
                ->orderBy('sticky', 'DESC')
                ->orderBy('created', 'DESC')
                ->limit(theme_get_setting('default_nodes_gallery', 'touchm'))
                ->addTag('node_access')
                ->execute()
                ->fetchCol();

        if (!empty($nids)) {
            $nodes = node_load_multiple($nids);
            $build += array('nodes' => array(
                    '#theme' => 'gallery_' . $default_gallery,
                    '#nodes' => $nodes,
                    )); //theme('gallery_' . $default_gallery, array('nodes' => $nodes));
            $build['pager'] = array(
                '#theme' => 'pager',
                '#weight' => 5,
            );
        } else {
            drupal_set_message(t('No gallery entries have been created1.'));
        }
    } else {

        drupal_set_message(t('No gallery entries have been created2.'));
    }

    return $build;
}
