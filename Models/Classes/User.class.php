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
  	public $_gender = 'n';
  	public $_weapon = 0;
  	public $_stock = 0;
  	public $_diopter = 0;
  	public $_rifleSling = 0;
  	public $_harness = 0;
  	public $_buttPlate = 0;
  	public $_accuracy = 0;
  	public $_legPower = 0;
  	public $_handPower = 0;
  	public $_endurance = 0;
  	public $_stability = 0;
  	private $_arrayOfAllEquiptmentForCompetitions = array();
	
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
            $this->_gender = $user['gender'];
            $this->_weapon = $user['weapon'];
            $this->_stock = $user['stock'];
            $this->_diopter = $user['diopter'];
            $this->_rifleSling = $user['rifle_sling'];
            $this->_harness = $user['harness'];
            $this->_buttPlate = $user['buttPlate'];
            $this->_accuracy = $user['accuracy'];
            $this->_legPower = $user['legPower'];
            $this->_handPower = $user['handPower'];
            $this->_endurance = $user['endurance'];
            $this->_stability = $user['stability'];
            
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
	
	private function getArrayOfAllEquiptmentForCompetitions ()
	{
		$parts = $this->_arrayOfAllEquiptmentForCompetitions;
		if (count($parts) == 0) {
			$userItem = new UserItem();
			
			$cartridge = $userItem->getBestCartridgesForUser($this->_id, 'en');
			$parts = array(
					$this->_weapon,
					$this->_diopter,
					$this->_stock,
					$this->_buttPlate,
					$this->_harness,
					$cartridge
					
			);
		}
		
		return $parts;		
	}
	
	public function getAccuracy()
	{
		$total = $this->_accuracy;
		
		$parts = $this->getArrayOfAllEquiptmentForCompetitions();
		$userItem = new UserItem();
		foreach ($parts as $part) {
			$weapon = $userItem->getItemById($part, 'en');
			$total += $weapon['accuracy'];
		}
		
		if ($total < 0) {
			$total = 0;
		}
		
		return $total;
	}
	
	public function setAccuracy($new)
	{
		if ($new < 0) {
			$new = 0;
		}
		$result = Connection::connect()->prepare(
				'UPDATE `user` SET `accuracy`=:field WHERE `id`=:id AND `active`=1 AND `deleted`=0 LIMIT 1;'
				);
		$result->execute(array(
				':field' => $new,
				':id' => $this->_id
		));
	}
	
	public function getLegPower()
	{
		$total = $this->_legPower;
		
		$parts = $this->getArrayOfAllEquiptmentForCompetitions();
		$userItem = new UserItem();	
		foreach ($parts as $part) {
			$weapon = $userItem->getItemById($part, 'en');
			$total += $weapon['legPower'];
		}
		
		if ($total < 0) {
			$total = 0;
		}
	
		return $total;
	}
	
	public function setLegPower($new)
	{
		if ($new < 0) {
			$new = 0;
		}
		$result = Connection::connect()->prepare(
				'UPDATE `user` SET `legPower`=:field WHERE `id`=:id AND `active`=1 AND `deleted`=0 LIMIT 1;'
				);
		$result->execute(array(
				':field' => $new,
				':id' => $this->_id
		));
	}
	
	public function getHandPower()
	{
		$total = $this->_handPower;
		
		$parts = $this->getArrayOfAllEquiptmentForCompetitions();
		$userItem = new UserItem();
		foreach ($parts as $part) {
			$weapon = $userItem->getItemById($part, 'en');
			$total += $weapon['handPower'];
		}
	
		if ($total < 0) {
			$total = 0;
		}
	
		return $total;
	}
	public function setHandPower($new)
	{
		if ($new < 0) {
			$new = 0;
		}
		$result = Connection::connect()->prepare(
				'UPDATE `user` SET `handPower`=:field WHERE `id`=:id AND `active`=1 AND `deleted`=0 LIMIT 1;'
				);
		$result->execute(array(
				':field' => $new,
				':id' => $this->_id
		));
	}
	
	public function getEndurance()
	{
		$total = $this->_endurance;
	
		$parts = $this->getArrayOfAllEquiptmentForCompetitions();
		$userItem = new UserItem();
		foreach ($parts as $part) {
			$weapon = $userItem->getItemById($part, 'en');
			$total += $weapon['endurance'];
		}
	
		if ($total < 0) {
			$total = 0;
		}
	
		return $total;
	}
	public function setEndurance($new)
	{
		if ($new < 0) {
			$new = 0;
		}
		$result = Connection::connect()->prepare(
				'UPDATE `user` SET `endurance`=:field WHERE `id`=:id AND `active`=1 AND `deleted`=0 LIMIT 1;'
				);
		$result->execute(array(
				':field' => $new,
				':id' => $this->_id
		));
	}
	
	public function getStability()
	{
		$total = $this->_stability;
	
		$parts = $this->getArrayOfAllEquiptmentForCompetitions();
		$userItem = new UserItem();
		foreach ($parts as $part) {
			$weapon = $userItem->getItemById($part, 'en');
			$total += $weapon['stability'];
		}
	
		if ($total < 0) {
			$total = 0;
		}
	
		return $total;
	}
	public function setStability($new)
	{
		if ($new < 0) {
			$new = 0;
		}
		$result = Connection::connect()->prepare(
				'UPDATE `user` SET `stability`=:field WHERE `id`=:id AND `active`=1 AND `deleted`=0 LIMIT 1;'
				);
		$result->execute(array(
				':field' => $new,
				':id' => $this->_id
		));
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
		$db = Connection::connect();
		$result = $db->prepare(
				'INSERT INTO `user` (`mail`, `login`, `password`, `registered`, `weapon`, `stock`, `diopter`, `rifle_sling`, `harness`) 
				VALUES (:mail, :login, :password, :registered, :weapon, :stock, :diopter, :rifle_sling, :harness);'
		);
		$result->execute(array(
			':mail' => $mail,
			':login' => $login,
			':password' => \Library\Forms\passwordHash($password),
			':registered' => time(),
			':weapon' => DEFAULT_WEAPON,
			':stock' => DEFAULT_STOCK,
			':diopter' => DEFAULT_DIOPTER,
			':rifle_sling' => DEFAULT_RIFLE_SLING,
			':harness' => DEFAULT_HARNESS				
		));
		
		$userItem = new UserItem($db->lastInsertId());
		//DEFAULT ITEMS
		$userItem->newItemForUser(DEFAULT_WEAPON);
		$userItem->newItemForUser(DEFAULT_STOCK);
		$userItem->newItemForUser(DEFAULT_DIOPTER);
		$userItem->newItemForUser(DEFAULT_RIFLE_SLING);
		$userItem->newItemForUser(DEFAULT_HARNESS);
		$userItem->newItemForUser(DEFAULT_BUTT_PLATE);
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
	
	public function getHeader($language)
	{
	    $return = '';
	    
	    $return .= '<span class="header_money"><a href="'.Page::getLink(119, '', $language).'"><span id="myMoney"><script>reloadMoney()</script></span></a></span>';
	    
	    $return .= '<span class="header_energy">'.Translation::t($language, 'Energy').': <span id="myEnergy"><script>reloadEnergy()</script></span></span>';
	  
	    $return .= '<a href=" '.Page::getLink(101, '', $language).' " class="header_name">' . $this->getFullName() . '</a>';
	    
	    $return .= '<a href=" '.Page::getLink(105, '', $language).' " id="mailbox_icon" class="header_message" style="background-image: url('. URL_PATH . '/images/icons/messageReaded.svg)"></a>';
	    
	    //one unreaded message
	    //$return .= '<a href=" '.Page::getLink(105).' " id="mailbox_icon" class="header_message" style="background-image: url('. URL_PATH . '/images/icons/message.svg)"></a>';
	    
	    //more unreaded messages
	    //$return .= '<a href=" '.Page::getLink(105).' " id="mailbox_icon" class="header_message" style="background-image: url('. URL_PATH . '/images/icons/messages.svg)"><span>1</span></a>';
  
	    return $return;
	}
	
	public function getActualActivity($language = 'en')
	{
	    $return = '<span class="header_activity"><b>'.Translation::t($language, 'Actual activity').'</b>: <span id="myActivity"><script>reloadActivity()</script></span></span>';
	    
	    return $return;
	}
	
	public function updateProfil($firstname, $lastname, $mail, $login, $gender)
	{
	    $result = Connection::connect()->prepare(
	            'UPDATE `user` SET `firstname`=:firstname, `lastname`=:lastname,
	            `mail`=:mail, `login`=:login, `gender`=:gender
	            WHERE `id`=:id AND `active`=1 AND `deleted`=0 LIMIT 1;'
	            );
	    $result->execute(array(
	            ':firstname' => $firstname,
	            ':lastname' => $lastname,
	            ':mail' => $mail,
	            ':login' => $login,
              ':gender' => $gender,
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
  
  public function searchUser($words = array(), $columnsInTable = array())
  {
      if (!is_array($words)) {
        $words[0] = $words;
      }
      if (!is_array($columnsInTable)) {
        $columnsInTable[0] = $columnsInTable;
      }
      
      $sql = 'SELECT `id` from `user` WHERE 1=0 ';
      
      foreach ($words as $word) {
        if ($word == '') {
            continue;
        }
        foreach ($columnsInTable as $column) {
          $sql .= ' OR `'.$column.'` like "%' .$word.'%"';
        }
      }
      
      $result = Connection::connect()->prepare($sql);
	    $result->execute();
      
      $users = $result->fetchAll();
      
      return $users;
  }
}