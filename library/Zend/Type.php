<?php

class Type
{
    /**
     * Representation of the type is a correspondence to a built-in type if any.
     *
     */
    private $_representation = null;

    /**
     * Image of type - a name of the complex-structured class.
     */
    private $_image = null;

    /**
     * Reflection of the type image. 
     */
    private $_reflection = null;

    
    public function __construct($image, $standardRepr = null)
    {
        if (!is_string($image)) {
            new Exception\Type('Type must always have a defined image');
        }
        $this->_image = $image;
        $this->_representation = $standardRepr;
    }

    public function hasRepresantation() 
    {
        return !is_null($this->_representation);
    }

    public function getRepresantation() 
    {
        return $this->_representation;
    }

    public function hasImage() 
    {
        return !is_null($this->_image);
    }

    public function getImage()
    {
        return $this->_image;
    }

    public function getReflection()
    {
        if (is_null($this->_reflection)) {
            $this->_reflection = new ReflectionClass($this->image);
        }
        return $this->_reflection;
    }
}
