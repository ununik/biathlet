<?php
class Mail
{
    private $_subject = '';
    private $_to = array();
    
    public function setSubject($new)
    {
        $this->_subject = $new;
    }
    
    public function addTo($mail)
    {
        $this->_to[] = $mail;
    }
}