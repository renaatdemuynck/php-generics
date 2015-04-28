<?php

use RDM\Generics\TypedArrayObject;

/**
 * Unit test for class RDM\Generics\TypedArrayObject
 */
class TypedArrayObjectTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test the constructor
     */
    public function testIntArrayConstructor()
    {
        $input = array(1, 2, 3);
        
        $intArray = new TypedArrayObject('int', $input);
        
        $this->assertCount(3, $intArray);
        $this->assertContainsOnly('int', $intArray);
    }

    /**
     * Try to add some integers to an array object of type integer
     */
    public function testAddIntToIntArray()
    {
        $intArray = new TypedArrayObject('int');
        
        $intArray[] = 1;
        $intArray[] = 2;
        $intArray[] = 3;
        
        $this->assertCount(3, $intArray);
        $this->assertContainsOnly('int', $intArray);
    }
    
    /**
     * Try to add a string to an array object of type integer
     */
    public function testAddStringToIntArray()
    {
        $intArray = new TypedArrayObject('int');
        
        $this->setExpectedException('InvalidArgumentException');
        $intArray[] = '1';
    }
    
    /**
     * Try to append a string to an array object of type integer
     */
    public function testAppendStringToIntArray()
    {
        $intArray = new TypedArrayObject('int');
        
        $this->setExpectedException('InvalidArgumentException');
        $intArray->append('1');
    }
    
    /**
     * Try to exchange an array containing a string to an array object of type integer
     */
    public function testExchangeArrayWithIntArray()
    {
        $intArray = new TypedArrayObject('int');
        $newArray = array(1, 2, 'three');
        
        $this->setExpectedException('InvalidArgumentException');
        $intArray->exchangeArray($newArray);
    }
}
