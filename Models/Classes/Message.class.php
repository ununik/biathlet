<?php
class Message
{
	public function saveMessage($from, $to, $text)
	{
		$db = Connection::connect();
		$result = $db->prepare(
				'INSERT INTO `message` (`from`, `to`, `text`, `timestamp`)
				VALUES (:from, :to, :text, :timestamp);'
				);
		$result->execute(array(
				':from' => $from,
				':to' => $to,
				':text' => $text,
				':timestamp' => time()
		));
	}
	
	public function getConversationWithUser($user1, $user2, $limit = 30)
	{
		$result = Connection::connect()->prepare(
				'SELECT * FROM `message` WHERE ((`from`=:userA AND `to`=:userB) OR (`from`=:userB AND `to`=:userA)) ORDER BY timestamp DESC LIMIT '.$limit.';'
				);
		$result->execute(array(
				':userA' => $user1,
				':userB' => $user2
		));
		
		$messages = $result->fetchAll();

		return $messages;
	}
}