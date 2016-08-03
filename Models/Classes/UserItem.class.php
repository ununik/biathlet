<?php
class UserItem
{
    private $_id = 0;
    
    public function __construct($id = '')
    {
        if ($id == '') {
            die();
        }
        
        $this->_id = $id;
    }
    
    public function newItemForUser($itemId)
    {
        $item = $this->getConcreteItemForUser($itemId);
        if ($item === false) {
            $result = Connection::connect()->prepare(
                    'INSERT INTO `user-item` (`user`,	`item`, `timestamp`, `count`)
    				VALUES (:user, :item, :timestamp, 1);'
                    );
            $result->execute(array(
                    ':user' => $this->_id,
                    ':item' => $itemId,
                    ':timestamp' => time()
            ));
        } else {
            $result = Connection::connect()->prepare(
                    'UPDATE `user-item` SET `count`=:count, `timestamp`=:timestamp WHERE id=:id;'
                    );
            $result->execute(array(
                    ':count' => $item['count'] + 1,
                    ':id' => $item['id'],
                    ':timestamp' => time()
            ));
        }
    }
    
    public function getConcreteItemForUser($itemId)
    {
        $result = Connection::connect()->prepare(
                'SELECT * FROM `user-item` WHERE `user`=:user AND `item`=:item LIMIT 1;'
                );
        $result->execute(array(
            ':user' => $this->_id,
            ':item' => $itemId
        ));
         
        $item = $result->fetch();
        
        if (isset($item['id'])) {
            return $item;
        } else {
            return false;
        }
    }
    
    public function getConcreteItemForUserFromID($id)
    {
    	$result = Connection::connect()->prepare(
    			'SELECT * FROM `user-item` WHERE `user`=:user AND `id`=:item LIMIT 1;'
    			);
    	$result->execute(array(
    			':user' => $this->_id,
    			':item' => $id
    	));
    	 
    	$item = $result->fetch();
    
    	if (isset($item['id'])) {
    		return $item;
    	} else {
    		return false;
    	}
    }
    
    public function getAllItemsForUser($user, $category, $language)
    {
        $result = Connection::connect()->prepare(
                'SELECT * FROM `equipment` INNER JOIN `user-item` ON `equipment`.`id`=`user-item`.`item`
                WHERE 
                `equipment`.language=:language AND 
                `user-item`.user=:user AND 
                `equipment`.categoryInShop=:category
                ;'
                );
        $result->execute(array(
                ':user' => $user,
                ':category' => $category,
                ':language' => $language
        ));
         
        $categories = $result->fetchAll();
        
        return $categories;
    }
    
    public function showWeapon($language, $weapon, $weapon2,$stock, $harness, $diopter, $buttPlate)
    {    	
    	$partsFromTop = array(
    			$weapon2,
    			$stock,
    			$diopter,
    			$weapon,
    			$buttPlate,
    			$harness
    	);
    	$return = '<div id="weaponImg" style="background-image: ';	
    			
    			foreach ($partsFromTop as $part) {
    				if ($part == '') {
    					continue;
    				}
    				$return .= 'url(\''.URL_PATH.$part.'\'),';
    			}
    	$return = substr($return, 0, -1);
    	$return .= ';" >';
		$return .= '</div>';

		return $return;
    }
    
    public function getItemSVGImageById($id, $language)
    {
    	$result = Connection::connect()->prepare(
    			'SELECT svgImage FROM `equipment` 
                WHERE
                language=:language AND
                id = :id AND
    			active = 1 AND
    			deleted = 0
                ;'
    			);
    	$result->execute(array(
    			':id' => $id,
    			':language' => $language
    	));
    	 
    	$item = $result->fetch();
    	$item = $item['svgImage'];
    	
    	return $item;
    }
    
    public function getItemById($id, $language)
    {
    	$result = Connection::connect()->prepare(
    			'SELECT * FROM `equipment`
                WHERE
                language=:language AND
                id = :id AND
    			active = 1 AND
    			deleted = 0
                ;'
    			);
    	$result->execute(array(
    			':id' => $id,
    			':language' => $language
    	));
    
    	$item = $result->fetch();
    	 
    	return $item;
    }
    
    public function setNewItem($field, $item)
    {
    	$result = Connection::connect()->prepare(
    			'UPDATE `user` SET '.$field.'=:item WHERE `id`=:id AND `active`=1 AND `deleted`=0 LIMIT 1;'
    			);
    	$result->execute(array(
    			':id' => $this->_id,
    			':item' => $item
    	));
    }
}