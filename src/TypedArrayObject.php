<?php
namespace RDM\Generics;

class TypedArrayObject extends \ArrayObject
{
    private $type;
    
    /**
     * {@inheritDoc}
     *
     * @param string $type The type of elements the array can contain.
     *                     Can be any of the primitive types or a class name.
     */
    public function __construct($type, $array = array())
    {
        $this->type = $type;
    }
}
