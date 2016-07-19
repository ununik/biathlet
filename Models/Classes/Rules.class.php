<?php
class Rules
{
    public function getAllRules($language)
    {
        $result = Connection::connect()->prepare(
                'SELECT * FROM `rules` WHERE `language`=:language AND `active`=1 AND `deleted`=0;'
                );
        $result->execute(array(
                ':language' => $language
        ));
         
        $rules = $result->fetchAll();
        
        return $rules;
    }
}