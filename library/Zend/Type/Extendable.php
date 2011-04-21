<?php

namespace Zend\Type;

class Extendable 
{
    protected $_meta = array();

    public function useMetaClass($classname)
    {
        $this->_meta[] = $classname;
    }

    public function __call($method, $arguments)
    {
        
    }

}
