<?php
class Page
{
	private $_log = false;
	private $_pid = 1;
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
		$result = Connection::connect()->prepare(
				'SELECT * FROM `page` WHERE `id` = :id AND `active` = 1 AND `deleted` = 0;'
		);
		$result->execute(array(
				':id' => $this->_pid
		));
		
		$page = $result->fetch();
		
		return $page;
	}
	public function changePID($pid)
	{		
		$result = Connection::connect()->prepare(
				'SELECT `id` FROM `page` WHERE `id` = :id AND `active` = 1 AND `deleted` = 0;'
		);
		$result->execute(array(
				':id' => $pid
		));
		
		$page = $result->fetch();
		
		if (isset($page['id']) && $page['id'] > 0) {
			$this->_pid = $page['id'];
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
				'SELECT * FROM `mainMenu` WHERE `log` = :log AND  `language`=:language AND `active` = 1 AND `deleted` = 0 ORDER BY `sorting`;'
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