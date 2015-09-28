<?php

namespace Bavarianlabs\Test\XMLHelper;


use Bavarianlabs\XMLHelper\XMLHelper;

class XMLHelperTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var $object XMLHelper
     */
    private $object;

    public function testIfDataIsPersisted()
    {
        $this->object->data(array("foobar" => array("foo" => "bar")));
        $this->assertNotSame(array("foobar" => array("foo" => "bar")), $this->object->toArray());
    }

    protected function setUp()
    {
        $this->object = new XMLHelper();
    }

    public function testInClassExist()
    {
        $this->assertInstanceOf('\\Bavarianlabs\\XMLHelper\\XMLHelper', $this->object);
    }

    public function testIfGivenNullOnDataTheExceptionIsThrow()
    {
        $this->setExpectedException('\\Bavarianlabs\\XMLHelper\\Exception\\EmptyDataCollectionException');
        $this->object->data(null);
    }
    
    
}
