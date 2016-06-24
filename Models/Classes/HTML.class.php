<?php
class HTML
{
    private $_headerTitle = 'Biathlete';
    private $_mainMenu = array();
    private $_content = '';
    
    public function setHeaderTitle($new)
    {
    	$this->_headerTitle = $new;
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
    
    public function addToContent($new)
    {
    	$this->_content .= $new;
    }
    
    public function printHTML()
    {
    	$return = '<html>';
    	
    	$return .= '<head>';
    	$return .= "<title>{$this->_headerTitle}</title>";
    	$return .= '</head>';
    	
    	$return .= '<body>';
    	//NAVIGATION
    	$return .= "<nav>{$this->getMenu()}</nav>";
    	$return .= '</body>';
    	
    	$return .= '</html>';
    	
    	return $return;
    }
}