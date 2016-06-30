<?php
class User
{
	private $_id = 0;
	
	public function __construct($sessionId = '')
	{
		if ($sessionId != '') {
			$result = Connection::connect()->prepare(
					'SELECT * FROM `user` WHERE `id`=:id AND `active` = 1 AND `deleted` = 0;'
			);
			$result->execute(array(':id' => $sessionId));
			
			$user = $result->fetch();
			
			if (!isset($user['id'])) {
				return false;
			}
			$this->_id = $user['id'];
			}
		
		return true;
	}
	
	public function existsLogin($login)
	{
		$result = Connection::connect()->prepare(
				'SELECT `id` FROM `user` WHERE `login`=:login AND `active` = 1 AND `deleted` = 0;'
		);
		$result->execute(array(':login' => $login));
		
		$user = $result->fetch();
		
		if (!isset($user['id'])) {
			return false;
		}		
		return true;
	}
	
	public function existsMail($mail)
	{
		$result = Connection::connect()->prepare(
				'SELECT `id` FROM `user` WHERE `mail`=:mail AND `active` = 1 AND `deleted` = 0;'
		);
		$result->execute(array(':mail' => $mail));
	
		$user = $result->fetch();
	
		if (!isset($user['id'])) {
			return false;
		}
		return true;
	}
	
	public function checkUser()
	{
		if ($this->_id == 0) {
			return false;
		}
		
		return true;
	}
	
	public function addNew($login, $mail, $password)
	{
		$result = Connection::connect()->prepare(
				'INSERT INTO `user`(`mail`,	`login`, `password`, `registered`) 
				VALUES (:mail, :login, :password, :registered:);'
		);
		$result->execute(array(
			':mail' => $mail,
			':login' => $login,
			':password' => \Library\Forms\passwordHash($password),
			':registered' => time()
		));
	}
}