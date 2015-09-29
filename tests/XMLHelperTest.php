<?php

namespace Bavarianlabs\Test\XMLHelper;


use Bavarianlabs\XMLHelper\XMLHelper;
use DOMDocument;

class XMLHelperTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var $object XMLHelper
     */
    private $object;

    public function testIfDataIsPersisted()
    {
        $this->object->data(array("foobar" => array("foo" => "bar")));
//        $this->assertNotSame(array("foobar" => array("foo" => "bar")), $this->object->toArray());
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

    public function testIfGivenArrayXmlIsReturned()
    {
        $data = array(
            'item1' => 'Text 3',
            'item2' => 1234,
            'item3' => array(
                'subItem1' => 'Text 1',
                'subItem2' => 'Text 2'
            ),
        );

        $expected = '<?xml version="1.0" encoding="UTF-8"?>
<root>
<item1>Text 3</item1>
<item2>1234</item2>
<item3>
        <subItem1>Text 1</subItem1>
        <subItem2>Text 2</subItem2>
</item3>
</root>';


        $this->execute($expected, $data);
    }

    protected function execute($expected_xml, $actual_array){

        $actual_xml = $this->object->xml($actual_array);

        $actual = new DOMDocument;
        $actual->preserveWhiteSpace = false;
        $actual->loadXML($actual_xml);

        $expected = new DOMDocument;
        $expected->preserveWhiteSpace = false;
        $expected->loadXML($expected_xml);

        $this->assertEqualXMLStructure(
            $expected->firstChild, $actual->firstChild, true
        );
        $this->assertEquals($expected, $actual);
    }
}
