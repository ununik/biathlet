<?php
$container = '<h3>Conversation with '.$secondUser->getFullName().'</h3>';

$container .= '<form action="" method="post">';
$container .= '<div class="formField">';
$container .= '<label>New message</label>';
$container .= '<textarea name="message"></textarea>';
$container .= '</div>';

$container .= '<input type="submit" name="sendMessage" value="send">';
$container .= '</form>';

foreach ($conversation as $messageConversation) {
	if ($messageConversation['to'] == $user->_id && $messageConversation['deletedTo'] == 1) {
		continue;
	}
	if ($messageConversation['from'] == $user->_id && $messageConversation['deletedFrom'] == 1) {
		continue;
	}
	$container .= '<div ';
	if ($messageConversation['to'] == $user->_id) {
		$container .= 'class="toUser">';
	} else {
		$container .= 'class="fromUser">';
	}
	$container .= '<div>'.date('j. n. Y - H:i', $messageConversation['timestamp']).'</div>';
	$container .= '<div>'.$messageConversation['text'].'</div>';
	$container .= '</div>';
}

return $container;