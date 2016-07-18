<?php
class Page
{
	private $_log = false;
	private $_pid = 2; //unlog root x log root - 101
	private $_language = 'en';
	
	public function getPID()
	{
		return $this->_pid;
	}
	public function changeLog($log)
	{
		$this->_log = $log;
	}
	
	public function getActualPage()
	{
	    if ($this->_log) {
	        $log = 1;
	    } else {
	        $log = 0;
	    }
	    
		$result = Connection::connect()->prepare(
				'SELECT * FROM `page` WHERE `pid`=:id AND `language`=:language AND `active`=1 AND `deleted`=0 AND `log`=:log;'
		);
		$result->execute(array(
				':id' => $this->_pid,
				':language' => $this->_language,
		        ':log' => $log
		));
		
		$page = $result->fetch();
		
		return $page;
	}
	public function changePID($pid)
	{		
	    if ($this->_log == true && $pid < 100) {
	        $pid = $this->_pid;
	    } else if ($this->_log == false && $pid > 100) {
	        $pid = 101;
	    }
		$result = Connection::connect()->prepare(
				'SELECT `pid` FROM `page` WHERE `pid` = :id AND `language` = :language AND `active` = 1 AND `deleted` = 0;'
		);
		$result->execute(array(
				':id' => $pid,
				':language' => $this->_language
		));
		
		$page = $result->fetch();
		
		if (isset($page['pid']) && $page['pid'] > 0) {
			$this->_pid = $page['pid'];
		} else {
			die('page not found - Page.class.php line 32');
		}
	}
	
	public function changeLanguage($language)
	{
		$this->_language = $language;
	}
	
	public function getMainMenu()
	{
		if ($this->_log == true) {
			$log = 1;
		} else {
			$log = 0;
		}
		$result = Connection::connect()->prepare(
				'SELECT * FROM `mainMenu` WHERE `log` = :log AND  `language`=:language AND `active` = 1 AND `deleted` = 0 ORDER BY `sorting` ASC;'
		);
		$result->execute(array(
			':log' => $log,
			':language' => $this->_language
		));
		
		$menuArray = $result->fetchAll();
		
		return $menuArray;
	}
	
	public function getLink($pid = '', $externalLink = '')
	{
		if ($pid != '') {
			return 'index.php?pid=' . $pid;
		}
		
		return $externalLink;
	}
}