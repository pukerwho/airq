<?php 

function sendMessage($chatID, $messaggio, $token) {
    $parse_mode = "markdown";
    $url = "https://api.telegram.org/bot" . $token . "/sendMessage?chat_id=" . $chatID;
    $url = $url . "&text=" . urlencode($messaggio);
    $url = $url . "&parse_mode=".$parse_mode;
    $ch = curl_init();
    $optArray = array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}


function get_data( ) {
  $token = "5593597866:AAH1VUQ_deuDHRrYSXtLdVNjmvlYI4HU6Vw";
  $chatID = "-649233282";
  $user_name = stripslashes_deep($_POST['user_name']);
  $user_phone = stripslashes_deep($_POST['user_phone']);
  $site_page = stripslashes_deep($_POST['site_page']);

  $messaggio .= "`Нова заявка з сайту airq.com.ua` \n \n";
  $messaggio .= "**Ім'я:** ".$user_name. "\n";
  $messaggio .= "**Телефон:** ".$user_phone. "\n";
  $messaggio .= "**Сторінка:** ".$site_page;

  sendMessage($chatID, $messaggio, $token);
  
  wp_die();
}
add_action( 'wp_ajax_nopriv_send_telegram_message_action', 'get_data' );
add_action( 'wp_ajax_send_telegram_message_action', 'get_data' );
