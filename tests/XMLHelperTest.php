<?php

namespace Bavarianlabs\Test\XMLHelper;


use Bavarianlabs\XMLHelper\XMLHelper;

class XMLHelperTest extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        $this->object = new XMLHelper();
    }

    public function testInClassExist()
    {
        $this->assertInstanceOf('\Bavarianlabs\XMLHelper\XMLHelper', $this->object);
    }
}
