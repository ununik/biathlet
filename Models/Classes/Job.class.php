<?php
class Job
{
    public function getAllPartTimeJobs($maxEnergy, $language)
    {
        $result = Connection::connect()->prepare(
                'SELECT * FROM `job-parttime` WHERE `minEnergy`<=:maxEnergy AND `language`=:language AND `active`=1 AND `deleted`=0 ORDER BY minEnergy DESC, title ASC;'
                );
        $result->execute(array(
                ':maxEnergy' => $maxEnergy,
                ':language' => $language
        ));
         
        $job = $result->fetchAll();
        
        return $job;
    }
    
    public function getParttimeJobFromId($id)
    {
        $result = Connection::connect()->prepare(
                'SELECT * FROM `job-parttime` WHERE `id`=:id AND `active`=1 AND `deleted`=0;'
                );
        $result->execute(array(
                ':id' => $id
        ));
         
        $job = $result->fetch();
        
        return $job;
    }
}