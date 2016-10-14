<?php
class EquipmentAdmin
{
    public function getAllCategories()
    {
        $result = Connection::connect()->prepare(
                'SELECT * FROM `shops-category`
                WHERE
                language=:language AND
    			deleted = 0
                ORDER BY title
                ;'
                );
        $result->execute(array(
            ':language' => 'en'
        ));
        
        $items = $result->fetchAll();
        
        return $items;
    }
    public function getAllItemsOrderByCategory($category)
    {
        $result = Connection::connect()->prepare(
                'SELECT * FROM `equipment`
                WHERE
                language=:language AND
                categoryInShop=:category AND
    			deleted = 0
                ORDER BY title
                ;'
                );
        $result->execute(array(
            ':language' => 'en',
            ':category' => $category
        ));
        
        $items = $result->fetchAll();
        
        return $items;
    }
    
    public function issetTranslationForItem($item, $language)
    {
        $result = Connection::connect()->prepare(
                'SELECT `uid` FROM `equipment`
                WHERE
                language=:language AND
                id=:id AND
    			deleted = 0
                ;'
                );
        $result->execute(array(
            ':language' => $language,
            ':id' => $item
        ));
        
        $item = $result->fetch();
        if (isset($item['uid']) && $item['uid'] != 0) {
            return true;
        }
        
        return false;
    }
    
    public function getItem($item, $language)
    {
        $result = Connection::connect()->prepare(
                'SELECT * FROM `equipment`
                WHERE
                language=:language AND
                id=:id AND
    			deleted = 0
                ;'
                );
        $result->execute(array(
            ':language' => $language,
            ':id' => $item
        ));
        
        $item = $result->fetch();
        
        return $item;
    }
    
    public function saveForLanguage($id, $language, $fields)
    {
        $update = array();
        foreach ($fields as $key=>$value) {
            if (is_string($value)) {
                $update[] = "`$key`= '$value'";
            } else {
                $update[] = '`'.$key.'`='.$value;
            }
        }
        
        $update = implode(', ', $update);
        
        $result = Connection::connect()->prepare(
                'UPDATE `equipment` SET '
                . $update .' 
                WHERE
                language=:language AND
                id=:id AND
    			deleted = 0
                ;'
                );
        $result->execute(array(
            ':language' => $language,
            ':id' => $id
        ));
    }
    public function saveForAll($id, $fields)
    {
        $update = array();
        foreach ($fields as $key=>$value) {
            if (is_string($value)) {
                $update[] = "`$key`= '$value'";
            } else {
                $update[] = '`'.$key.'`='.$value;
            }
        }
    
        $update = implode(', ', $update);
    
        $result = Connection::connect()->prepare(
                'UPDATE `equipment` SET '
                . $update .'
                WHERE
                id=:id AND
    			deleted = 0
                ;'
                );
        $result->execute(array(
            ':id' => $id
        ));
    }
    public function copyRowAndDeactiveNew($id, $language)
    {
        $result = Connection::connect()->prepare(
                'SELECT * FROM `equipment`
                WHERE
                language=:language AND
                id=:id AND
    			deleted = 0
                ;'
                );
        $result->execute(array(
            ':language' => 'en',
            ':id' => $id
        ));
        
        $item = $result->fetch();
        
        unset($item['uid']);
        $item['language'] = $language;
        $item['active'] = 0;
        
        $columns = array();
        $values = array();
        foreach ($item as $column=>$value) {
            if (is_int($column)) {
                continue;
            }
            $columns[] = "`$column`";
            if (is_string($value)) {
                $values[] = "'$value'";
            } else {
                $values[] = $value;
            }
        }
        
        $columns = " ( " .implode(", ",$columns).") ";
        $values = " (" .implode(", ",$values).") ";
        
        $result = Connection::connect()->prepare(
                'INSERT INTO `equipment` '
                . $columns .'
                VALUES'
                . $values .'
                ;'
                );
        $result->execute();
    }
}