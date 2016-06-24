<?php
class User
{
	private $_id = 0;
	
	public function __construct($sessionId)
	{
		$result = Connection::connect()->prepare(
				'SELECT * FROM `user` WHERE `id`=:id AND `active` = 1 AND `deleted` = 0;'
		);
		$result->execute(array(':id' => $sessionId));
		
		$user = $result->fetch();
		
		if (!isset($user['id'])) {
			return false;
		}
		$this->_id = $user['id'];
		
		return true;
	}
	
	public function checkUser()
	{
		if ($this->_id == 0) {
			return false;
		}
		
		return true;
	}
}