<?php

/**
* URL-bot's address and its token
* You will need to use your own token which you will get from the BOTFATHER
*/

$access_token = '268542073:AAH0YRVFupwdUvWTxlQOZE8hn0Q2neQFUQs';

$api = 'https://api.telegram.org/bot' . $access_token;

/**
 * Now we should set some variables
 */

$output = json_decode(file_get_contents('php://input'), TRUE); // By doing this, we will get what the bot has got and we will parse it

$chat_id = $output['message']['chat']['id']; //set chat id

$first_name = $output['message']['chat']['first_name']; // set first name

$message = $output['message']['text']; // set message

/**
* Get commands from some user
* Just for fun we will make it all in lower cases
*/

switch(strtolower_ru($message)) {

case ('hi'):

case ('/hello'):

sendMessage($chat_id, 'hi, '. $first_name . '! ' . $emoji['preload'] );

   break;

case ('/start'):

  break;

default:

  sendMessage($chat_id, 'Unknown command' );

  break;

}

/**
*Function of sending messages to chat "sendMessage()"
*/

function sendMessage($chat_id, $message) {

file_get_contents($GLOBALS['api'] . '/sendMessage?chat_id=' . $chat_id . '&text=' . urlencode($message));

}

/**
* Function to write down everything in lower case
*/

function strtolower_ru($text) {

    $alphabet = array('a','b','c','d','e','f','g','h', 'i','j','k','l','m','n','o','p', 'q','r','s','t','u','v','w','x', 'y','z');

      $alphabetupper = array('A','B','C','D','E','F','G','H', 'I','J','K','L','M','N','O','P', 'Q','R','S','T','U','V','W','X', 'Y','Z');

return str_replace($alphabetupper,$alphabet,strtolower($text));

}
?>
