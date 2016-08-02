<?php
class Shop
{
    public function getAllShops($language)
    {
        $result = Connection::connect()->prepare(
                'SELECT * FROM `shops` WHERE `language`=:language AND `active`=1 AND `deleted`=0 ORDER BY sort;'
                );
        $result->execute(array(
                ':language' => $language
        ));
         
        $shops = $result->fetchAll();
    
        return $shops;
    }
    
    public function getActualShop($id, $language)
    {
        $result = Connection::connect()->prepare(
                'SELECT * FROM `shops` WHERE `id`=:id AND `language`=:language AND `active`=1 AND `deleted`=0;'
                );
        $result->execute(array(
                ':id' => $id,
                ':language' => $language
        ));
         
        $shop = $result->fetch();
        
        return $shop;
    }
    
    public function getAllCategories($language)
    {
        $result = Connection::connect()->prepare(
                'SELECT * FROM `shops-category` WHERE `language`=:language AND `active`=1 AND `deleted`=0;'
                );
        $result->execute(array(
                ':language' => $language
        ));
         
        $categories = $result->fetchAll();
     
        return $categories;
    }
    
    public function getAllItemsForCategory($shop, $category, $language)
    {
        $result = Connection::connect()->prepare(
                'SELECT * FROM `equipment` INNER JOIN `shops-item` ON `equipment`.`id`=`shops-item`.`equipment`
                WHERE 
                `shops-item`.`active`=1 AND 
                `shops-item`.`deleted`=0 AND 
        		`equipment`.`active`=1 AND 
                `equipment`.`deleted`=0 AND 
                `equipment`.language=:language AND 
                `shops-item`.`shop`=:shop AND 
                `equipment`.categoryInShop=:category AND
                `equipment`.specialCode = ""
                ;'
                );
        $result->execute(array(
                ':shop' => $shop,
                ':category' => $category,
                ':language' => $language
        ));
         
        $categories = $result->fetchAll();
        
        return $categories;
    }
    
    public function getItemFromShop($id)
    {
        $result = Connection::connect()->prepare(
                'SELECT * FROM `shops-item` WHERE `id`=:id AND `active`=1 AND `deleted`=0;'
                );
        $result->execute(array(
                ':id' => $id
        ));
         
        $item = $result->fetch();
        
        return $item;
    }
}