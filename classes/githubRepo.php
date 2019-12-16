<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of githubRepo
 *
 * @author Nexus
 */
class githubRepo {
    private $_name;
    private $_description;
    private $_isForked;
    private $_updatedAt;
    private $_url;
    
    public function setName($name)
    {
        $this->_name = $name;
    }
    
    public function setDescription($description)
    {
        $this->_description = $description;
    }
    
    public function setIsForked($isForked)
    {
        $this->_isForked = $isForked;
    }
    
    public function setUpdatedAt($updatedAt)
    {
        $this->_updatedAt = $updatedAt;
    }
    
    public function setURL($url)
    {
        $this->_url = $url;
    }
    
    public function getName()
    {
        return $this->_name;
    }
    
    public function getDescription()
    {
        return $this->_description;
    }
    
    public function getIsForked()
    {
        return $this->_isForked;
    }
    
    public function getUpdatedAt()
    {
        return $this->_updatedAt;
    }
    
    public function getURL()
    {
        return $this->_url;
    }
}
