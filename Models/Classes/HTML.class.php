<?php
class HTML
{
    private $_headerTitle = 'Biathlete';
    private $_mainMenu = array();
    private $_content = '';
    private $_header = '';
    private $_cssPath = '';
    
    public function setHeaderTitle($new)
    {
    	$this->_headerTitle = $new . ' - Biathlete';
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
    
    public function printHTML()
    {
    	$return = '<html>';
    	
    	$return .= '<head>';
    	$return .= '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
    	$return .= "<title>{$this->_headerTitle}</title>";
    	
    	if ($this->_cssPath != '') {
    	    $return .= '<link rel="stylesheet" type="text/css" href="' . $this->_cssPath . '">';
    	}
    	
    	$return .= '</head>';
    	
    	$return .= '<body>';
    	$return .= '<div id="logo"></div>';
    	$return .= "<div id='header'><div id='head_navigation'>{$this->_header}</div></div>";
    	//NAVIGATION
    	$return .= "<nav>{$this->getMenu()}</nav>";
    	$return .= "<div id='content'>{$this->_content}</div>";
    	$return .= '</body>';
    	
    	$return .= '</html>';
    	
    	return $return;
    }
}