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
    public function __construct($type, $input = array())
    {
        parent::__construct($input);
        
        $this->type = $type;
    }

    private function isValid($value)
    {
        switch ($this->type) {
            case 'bool':
                return is_bool($value);
            case 'int':
                return is_int($value);
            case 'float':
                return is_float($value);
            case 'string':
                return is_string($value);
            case 'array':
                return is_array($value);
            case 'resource':
                return is_resource($value);
            case 'callable':
                return is_callable($value);
            default:
                return is_a($value, $this->type);
        }
    }

    /**
     * {@inheritDoc}
     *
     * @throws InvalidArgumentException If the given value is not of the specified type
     */
    public function offsetSet($offset, $value)
    {
        if ($this->isValid($value)) {
            parent::offsetSet($offset, $value);
        } else {
            throw new \InvalidArgumentException('The given value is not of type ' . $this->type);
        }
    }

    /**
     * {@inheritDoc}
     *
     * @throws InvalidArgumentException If the given array contains a value that is not of the specified type
     */
    public function exchangeArray($input)
    {
        foreach ($input as $item) {
            if (!$this->isValid($item)) {
                throw new \InvalidArgumentException(
                    'The given array contains a value that is not of type ' . $this->type
                );
            }
        }
        
        parent::exchangeArray($input);
    }
}
