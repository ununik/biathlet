<?php
class Page
{
	private $_log = false;
	private $_pid = 2; //unlog root x log root - 101
	public $_language = 'en';
	
	public function getPID()
	{
		return $this->_pid;
	}
	public function changeLog($log)
	{
		$this->_log = $log;
	}
  
  public function getHomepageId()
  {
      if ($this->_log) {
	        return 101;
	    } else {
	        return 2;
	    }
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
	public function changePID($url)
	{	
	    if ($this->_log) {
	        $log = 1;
	    } else {
	        $log = 0;
	    }
	    
	    if ($url == '') {
	        if ($this->_log) {
	            $url = 'profil';
	            $log = 1;
	        } else {
	            $url = 'login';
	            $log = 0;
	        }   
	    }
	    
		$result = Connection::connect()->prepare(
				'SELECT `pid` FROM `page` WHERE `url` = :url AND `language` = :language AND `log`=:log AND `active` = 1 AND `deleted` = 0;'
		);
		$result->execute(array(
				':url' => $url,
		        ':log' => $log,
				':language' => $this->_language
		));
		
		$page = $result->fetch();
		
		if (isset($page['pid']) && $page['pid'] > 0) {
			$this->_pid = $page['pid'];
		} else {
			header('Location: '. $this->getLink($this->getHomepageId()));
		}
	}
	
	public function changeLanguage($language)
	{
	    if ($language == '') {
	        $language = 'en';
	    }
	    
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
				'SELECT * FROM `main-menu` WHERE `log` = :log AND  `language`=:language AND `active` = 1 AND `deleted` = 0 ORDER BY `sorting` ASC;'
		);
		$result->execute(array(
			':log' => $log,
			':language' => $this->_language
		));
		
		$menuArray = $result->fetchAll();
		
		return $menuArray;
	}
	
	public function getLink($pid = '', $externalLink = '', $language = '')
	{	    
		if ($language == '') {
			$language = $this->_language;
		}
		
		if ($pid != '') {
		    $result = Connection::connect()->prepare(
		            'SELECT * FROM `page` WHERE `pid` = :pid AND `language`=:language AND `active` = 1 AND `deleted` = 0;'
		            );
		    $result->execute(array(
		            ':pid' => $pid,
		            ':language' => $language
		    ));
		    
		    $url = $result->fetch();
		    
		    return URL_PATH . '/index.php/'.$language.'/'.$url['url'].'/';
			//return 'index.php?pid=' . $pid;
		}
		
		return $externalLink;
	}
}