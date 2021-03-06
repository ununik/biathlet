<?php
$userId = $user->getUserByLogin($page->getSpecialValue(1));
if ($userId == false) {
	header('Location: '.$page->getLink($page->getHomepageId()));
}

$secondUser = new User($userId);

if ($secondUser->_id == 0) {
	header('Location: '.$page->getLink($page->getHomepageId()));
}

$message = new Message();
$err = array();
if (isset($_POST['sendMessage'])) {
	$messageText = \Library\Forms\safeText($_POST['message']);
	
	if (strlen($messageText) == 0) {
		$err[] = 'No message';
	}
	
	if (count($err) == 0) {
		$message->saveMessage($user->_id, $secondUser->_id, $messageText);
		header('Location: '.$page->getLink($page->getPID()).'?user='.$_GET['user']);
	}
}

$conversation = $message->getConversationWithUser($user->_id, $secondUser->_id);