<?php
class Training
{
    public function getAllTrainingsCategories($language)
    {
        $result = Connection::connect()->prepare(
                'SELECT * FROM `training-category` WHERE `language`=:language AND `active`=1 AND `deleted`=0 ORDER BY sort;'
                );
        $result->execute(array(
                ':language' => $language
        ));
         
        $categories = $result->fetchAll();
        
        return $categories;
    }
    
    public function getAllTrainingsSubcategories($language, $category)
    {
        $result = Connection::connect()->prepare(
                'SELECT * FROM `training-subcategory` WHERE `category`=:category AND `language`=:language AND `active`=1 AND `deleted`=0 ORDER BY sort;'
                );
        $result->execute(array(
                ':language' => $language,
                ':category' => $category,
        ));
         
        $categories = $result->fetchAll();
    
        return $categories;
    }
}