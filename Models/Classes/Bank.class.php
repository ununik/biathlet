<?php
class Bank
{
	private $_id = 0;
	
	public function __construct($id)
	{
		$this->_id = $id;
	}
	
	public function addNewEntry($user, $money, $message = '')
	{
		$db = Connection::connect();
		$result = $db->prepare(
				'INSERT INTO `bank` (`timestamp`, `revenue`, `title`, `user`)
				VALUES (:timestamp, :revenue, :title, :user);'
				);
		$result->execute(array(
				':revenue' => $money,
				':title' => $message,
				':user' => $user,
				':timestamp' => time()
		));
	}
	
	public function getAllEntries($user, $page = 0)
	{
		$result = Connection::connect()->prepare(
				'SELECT * FROM `bank` WHERE `user`=:user ORDER BY timestamp DESC;'
				);
		$result->execute(array(
				':user' => $user
		));
		 
		$entries = $result->fetchAll();
		
		return $entries;
	}
}