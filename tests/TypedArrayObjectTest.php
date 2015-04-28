<?php

use RDM\Generics\TypedArrayObject;

class TypedArrayObjectTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Check if an array of type integer contains only integers
     */
    public function testIntArray()
    {
        $intArray = new TypedArrayObject('int');

        $intArray[] = 1;
        $intArray[] = 2;
        $intArray[] = 3;
        
        $this->assertContainsOnly('int', $intArray);
    }

    /**
     * Try to add a string to an array of type integer
     */
    public function testAddStringToIntArray()
    {
        $intArray = new TypedArrayObject('int');
    
        $this->setExpectedException('InvalidArgumentException');
        $intArray[] = '1';
    }
}
