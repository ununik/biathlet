<?php
class HTML
{
    private $_headerTitle = 'Biathlete';
    private $_mainMenu = array();
    private $_content = '';
    private $_header = '';
    private $_cssPath = '';
    private $_js = array();
    private $_scripts = '';
    private $_actualActivity;
    private $homepageLink = '';
    
    public function setHeaderTitle($new)
    {
    	$this->_headerTitle = $new . ' - Biathlete';
    }
    
    public function setHomepageLink($new)
    {
      $this->homepageLink = $new;
    }
    
    public function addToJs($src, $script = '')
    {
        if ($src != '') {
            $this->_js[] = $src;
        } else {
            $this->_scripts .= '<script>'.$script.'</script>';
        }
    }
    
    /**
     * 
     * @param string $title
     * @param string $href
     * @param string $class
     * @param boolean $active
     */
    public function addToMenu($title, $href, $class = '', $active = false)
    {
    	$menuItemArray = array();
    	$menuItemArray['title'] = $title;
    	$menuItemArray['class'] = $class;
    	$menuItemArray['active'] = $active;
    	$menuItemArray['href'] = $href;
    	
    	
    	$this->_mainMenu[] = $menuItemArray;
    }
    
    private function getMenu()
    {
    	$menu = '<ul>';
    	foreach ($this->_mainMenu as $menuItem) {
    		$menu .= '<li>';
    		//link
    		$menu .= '<a href="';
    		$menu .= $menuItem['href'];
    		$menu .= '" ';
    		//class
    		$menu .= 'class="';
    		$menu .= $menuItem['class'];
    		if ($menuItem['active'] == true) {
    			$menu .= ' active';
    		}
    		$menu .= '"';
    		
    		$menu .= '>';
    		
    		$menu .= $menuItem['title'];
    		
    		$menu .= '</a>';
    		
    		
    		$menu .= '</li>';
    	}
    	$menu .= '</ul>';
    	
    	return $menu;
    }
    
    public function setCssFile($path)
    {
        $this->_cssPath = $path;
    }
    
    public function setHeader($new)
    {
        $this->_header = $new;
    }
    
    public function addToContent($new)
    {
    	$this->_content .= $new;
    }
    
    public function addToActualActivity($new)
    {
        $this->_actualActivity = $new;
    }
    
    public function printHTML()
    {
    	$return = '<html>';
    	
    	$return .= '<head>';
      $return .= '<meta charset="UTF-8">';
    	$return .= '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
    	$return .= "<title>{$this->_headerTitle}</title>";
    	
    	if ($this->_cssPath != '') {
    	    $return .= '<link rel="stylesheet" type="text/css" href="' . $this->_cssPath . '">';
    	}
    	
    	$return .= $this->_scripts;
    	foreach ($this->_js as $js) {
    	    $return .= '<script src="'.$js.'"></script>';
    	}
    	
    	$return .= '</head>';
    	
    	$return .= '<body>';
    	$return .= '<a href="'.$this->homepageLink.'" id="logo"></a>';
    	$return .= "<div id='header'><div id='head_navigation'>{$this->_header}</div></div>";
    	$return .= $this->_actualActivity;
    	//NAVIGATION
    	$return .= '<div id="navigationButton" onclick="menu()"></div>';
    	$return .= "<nav>{$this->getMenu()}</nav>";
    	$return .= "<div id='content'>{$this->_content}</div>";
    	$return .= '</body>';
    	
    	$return .= '</html>';
    	
    	return $return;
    }
}