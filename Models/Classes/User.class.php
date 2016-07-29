<?php
class User
{
	public $_id = 0;
	
	private $_mail = '';
	private $_login = '';
	public $_firstname = '';
	public $_lastname = '';
	public $_actualEnergy = 0;
	public $_maxEnergy = 0;
	public $_money = 0;
	public $_lastActivityTimestamp = 0;
	public $_stayLogin = 0;
	public $_lastActivity = '';
	public $_nextEnergy = 0;
	public $_howLongToNextEnergy = 0;
	
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
            $this->_mail = $user['mail'];
            $this->_login = $user['login'];
            $this->_firstname = $user['firstname'];
            $this->_lastname = $user['lastname'];
            $this->_maxEnergy = $user['maxEnergy'];
            $this->_actualEnergy = $user['actualEnergy'];
            $this->_money = $user['money'];
            $this->_lastActivityTimestamp = $user['lastActivityTimestamp'];
            $this->_lastActivity = $user['lastActivity'];
            $this->_stayLogin = $user['stayLogin'];
            $this->_nextEnergy = $user['nextEnergyTimestamp'];
            $this->_howLongToNextEnergy = $user['howLongToNextEnergy'];
            
            $result = Connection::connect()->prepare(
                 'UPDATE `user` SET `lastOnlineTime`=:time WHERE `id`=:id AND `active`=1 AND `deleted`=0 LIMIT 1;'
                 );
            $result->execute(array(
                 ':time' => time(),
                 ':id' => $this->_id,
            ));
		}
		
		return true;
	}
	
	public function getMail()
	{
	    return $this->_mail;
	}
	public function getLogin()
	{
	    return $this->_login;
	}
	
	public function existsLogin($login, $actualUser = 0)
	{
		$result = Connection::connect()->prepare(
				'SELECT `id` FROM `user` WHERE `login`=:login AND `id`!=:actualUser AND `active` = 1 AND `deleted` = 0;'
		);
		$result->execute(array(
		    ':login' => $login,
	        ':actualUser' => $actualUser
		));
		
		$user = $result->fetch();
		
		if (!isset($user['id'])) {
			return false;
		}		
		return true;
	}
	
	public function existsMail($mail, $actualUser = 0)
	{
		$result = Connection::connect()->prepare(
				'SELECT `id` FROM `user` WHERE `mail`=:mail AND `id`!=:actualUser AND `active` = 1 AND `deleted` = 0;'
		);
		$result->execute(array(
	        ':mail' => $mail,
	        ':actualUser' => $actualUser
		));
	
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
				'INSERT INTO `user` (`mail`,	`login`, `password`, `registered`) 
				VALUES (:mail, :login, :password, :registered);'
		);
		$result->execute(array(
			':mail' => $mail,
			':login' => $login,
			':password' => \Library\Forms\passwordHash($password),
			':registered' => time()
		));
	}
	
	public function makeLogin($login, $password)
	{
	    $result = Connection::connect()->prepare(
	            'SELECT `id`, `stayLogin` FROM `user` WHERE `login`=:login AND `password`=:password AND `active`=1 LIMIT 1;'
	            );
	    $result->execute(array(
	            ':login' => $login,
	            ':password' => \Library\Forms\passwordHash($password),
	    ));
	    
	    $user = $result->fetch();
	    
	    if (!isset($user['id'])) {
	        return false;
	    }
	    
	    $_SESSION['biathlete_user'] = $user['id'];
	    if ($user['stayLogin'] == 1) {
	       setcookie('biathlete_user', \Library\Extra\cookies($login, $password), time() + (60*60*24*31), '/');
	    }
	    return true;
	}
	
	public function logout()
	{
	    unset($_SESSION['biathlete_user']);
	    setcookie( 'biathlete_user', false, time() - 3600, '/');
	}
	
	public function randomPassword($mail)
	{
	    $newPass = \Library\Extra\generateRandomString(7);
	    
	    $result = Connection::connect()->prepare(
	            'UPDATE `user` SET `password`=:password WHERE `mail`=:mail AND `active`=1 AND `deleted`=0 LIMIT 1;'
	            );
	    $result->execute(array(
	            ':mail' => $mail,
	            ':password' => \Library\Forms\passwordHash($newPass),
	    ));
	    
	    return $newPass;
	}
	
	public function getFullName($id = 0)
	{
	    if ($id == 0) {
	        $login = $this->_login;
	        $firstname = $this->_firstname;
	        $lastname = $this->_lastname;
	    } else {
	        $result = Connection::connect()->prepare(
	                'SELECT `login`, `firstname`, `lastname` FROM `user` WHERE `id`=:id AND `active` = 1 AND `deleted` = 0;'
	                );
	        $result->execute(array(':id' => $id));
	        
	        $user = $result->fetch();
	        
	        $login = $user['login'];
	        $firstname = $user['firstname'];
	        $lastname = $user['lastname'];
	    }
	    
	    if ($lastname == '' && $firstname == '') {
	        return $login;
	    }
	    
	    return $firstname . ' ' . $lastname. ' (' . $login . ')';
	}
	
	public function getHeader()
	{
	    $return = '';
	    
	    $return .= '<span class="header_money"><span id="myMoney"><script>reloadMoney()</script></span><img src="'.URL_PATH.'/images/icons/euro.svg" class="euro"></span>';
	    
	    $return .= '<span class="header_energy">Energy: <span id="myEnergy"><script>reloadEnergy()</script></span></span>';
	    
	    $return .= '<a href=" '.Page::getLink(101).' " class="header_name">' . $this->getFullName() . '</a>';
	    
	    $return .= '<a href=" '.Page::getLink(105).' " id="mailbox_icon" class="header_message" style="background-image: url('. URL_PATH . '/images/icons/messageReaded.svg)"></a>';
	    
	    //one unreaded message
	    //$return .= '<a href=" '.Page::getLink(105).' " id="mailbox_icon" class="header_message" style="background-image: url('. URL_PATH . '/images/icons/message.svg)"></a>';
	    
	    //more unreaded messages
	    //$return .= '<a href=" '.Page::getLink(105).' " id="mailbox_icon" class="header_message" style="background-image: url('. URL_PATH . '/images/icons/messages.svg)"><span>1</span></a>';
  
	    return $return;
	}
	
	public function getActualActivity()
	{
	    $return = '<span class="header_activity">Actual activity: <span id="myActivity"><script>reloadActivity()</script></span></span>';
	    
	    return $return;
	}
	
	public function updateProfil($firstname, $lastname, $mail, $login)
	{
	    $result = Connection::connect()->prepare(
	            'UPDATE `user` SET `firstname`=:firstname, `lastname`=:lastname,
	            `mail`=:mail, `login`=:login
	            WHERE `id`=:id AND `active`=1 AND `deleted`=0 LIMIT 1;'
	            );
	    $result->execute(array(
	            ':firstname' => $firstname,
	            ':lastname' => $lastname,
	            ':mail' => $mail,
	            ':login' => $login,
	            ':id' => $this->_id
	    ));
	    
	    return;
	}
	
	public function checkPassword($password)
	{
	    $result = Connection::connect()->prepare(
	            'SELECT `id` FROM `user` WHERE `id`=:id AND `password`=:password AND `active`=1 LIMIT 1;'
	            );
	    $result->execute(array(
	            ':id' => $this->_id,
	            ':password' => \Library\Forms\passwordHash($password),
	    ));
	    
	    $user = $result->fetch();
	    
	    if (isset($user['id'])) {
	        return true;
	    }
	    
	    return false;
	}
	
	public function updateProfilPassword($newPass)
	{
	    $result = Connection::connect()->prepare(
	            'UPDATE `user` SET `password`=:password WHERE `id`=:id AND `active`=1 AND `deleted`=0 LIMIT 1;'
	            );
	    $result->execute(array(
	            ':id' => $this->_id,
	            ':password' => \Library\Forms\passwordHash($newPass),
	    ));
	}
	
	public function changeStayLog($value)
	{
	    $result = Connection::connect()->prepare(
	            'UPDATE `user` SET `stayLogin`=:value WHERE `id`=:id AND `active`=1 AND `deleted`=0 LIMIT 1;'
	            );
	    $result->execute(array(
	            ':id' => $this->_id,
	            ':value' => $value
	    ));
	}
	
	public function setMoney($money)
	{
	    $result = Connection::connect()->prepare(
	            'UPDATE `user` SET `money`=:value WHERE `id`=:id AND `active`=1 AND `deleted`=0 LIMIT 1;'
	            );
	    $result->execute(array(
	            ':id' => $this->_id,
	            ':value' => $money
	    ));
	}
	public function setActualEnergy($energy, $nextEnergy)
	{
	    $result = Connection::connect()->prepare(
	            'UPDATE `user` SET `actualEnergy`=:value, `nextEnergyTimestamp`=:nextEnergy WHERE `id`=:id AND `active`=1 AND `deleted`=0 LIMIT 1;'
	            );
	    $result->execute(array(
	            ':id' => $this->_id,
	            ':value' => $energy,
	            ':nextEnergy' => $nextEnergy
	    ));
	}
	
	public function setLastActivity($time, $activity)
	{
	    $result = Connection::connect()->prepare(
	            'UPDATE `user` SET `lastActivityTimestamp`=:time, `lastActivity`=:activity WHERE `id`=:id AND `active`=1 AND `deleted`=0 LIMIT 1;'
	            );
	    $result->execute(array(
	            ':id' => $this->_id,
	            ':time' => $time,
	            ':activity' => $activity
	    ));
	}
}