<?php 
function post_vote_function() {
  //Получаем данные
  $post_id = stripslashes_deep($_POST['postId']);
  $item_meta = stripslashes_deep($_POST['itemMeta']);
  
  //Обновляем мета данные
  if ( metadata_exists( 'post', $post_id, $item_meta ) ) {
    $count_value = get_post_meta( $post_id, $item_meta, true );
    $count_value = $count_value + 1;
    update_post_meta( $post_id, $item_meta, $count_value );
  } else {
    add_post_meta( $post_id, $item_meta, 1, true);
  }

  $data_back = get_post_meta( $post_id, $item_meta, true );
  
  echo $data_back;
  wp_die();
}

add_action('wp_ajax_vote_post_click_action', 'post_vote_function');
add_action('wp_ajax_nopriv_vote_post_click_action', 'post_vote_function');

?>