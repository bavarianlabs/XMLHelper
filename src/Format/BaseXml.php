<?php

namespace Bavarianlabs\XMLHelper\Format;


use XMLWriter;

/**
 * Class BaseXml
 * @package Bavarianlabs\XMLHelper\Format
 */
abstract class BaseXml
{
    /**
     * @var $writer XMLWriter
     */
    protected $writer;

    /**
     * @var string $version
     */
    protected $version  = '1.0';

    /**
     * @var string $encoding
     */
    protected $encoding = 'UTF-8';

    /**
     * @var string $rootName
     */
    protected $rootName = 'root';

    /**
     * @var array $rootAttr
     */
    protected $rootAttr = array();

    /**
     * @var boolean $rootSelf
     */
    protected $rootSelf = false;

    /**
     * @var char $newLine
     */
    protected $newLine = "\n";

    /**
     * @var char $newTab
     */
    protected $newTab = "\t";

    /**
     * @var string
     */
    protected $numericTagPrefix = 'key';
    /**
     * @var bool
     */
    protected $skipNumeric = true;
    /**
     * @var bool
     */
    protected $_tabulation = true;            //TODO
    /**
     * @var bool
     */
    protected $defaultTagName = false;    //Tag For Numeric Array Keys
    /**
     * @var array
     */
    protected $rawKeys = array();
    /**
     * @var int
     */
    protected $emptyElementSyntax = 1;
    /**
     * @var bool
     */
    protected $filterNumbers = false;
    /**
     * @var array
     */
    protected $tagsToFilter = array();
    /**
     * @var array
     * @example $attrs['element_name'][] = array('attr_name' => 'attr_value');
     */
    protected $elementAttrs = array();
    /**
     * @var array
     */
    protected $CDataKeys = array();

    /**
     *
     */
    const EMPTY_SELF_CLOSING = 1;
    /**
     *
     */
    const EMPTY_FULL         = 2;

    /**
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param string $version
     * @return string
     */
    public function setVersion($version)
    {
        return $this->version = $version;
    }

    /**
     * @return string
     */
    public function getEncoding()
    {
        return $this->encoding;
    }

    /**
     * @param string $encoding
     * @return string
     */
    public function setEncoding($encoding)
    {
        return $this->encoding = $encoding;
    }

    /**
     * @return string
     */
    public function getRootName()
    {
        return $this->rootName;
    }

    /**
     * @param string $rootName
     * @return string
     */
    public function setRootName($rootName)
    {
        return $this->rootName = $rootName;
    }

    /**
     * @param array $rootAttr
     * @return BaseXml
     */
    public function setRootAttr($rootAttr)
    {
        return $this->rootAttr = $rootAttr;
    }

    /**
     * @return array
     */
    public function getRootAttr()
    {
        return $this->rootAttr;
    }

    /**
     * @return string
     */
    public function getNewLine()
    {
        return $this->newLine;
    }

    /**
     * @return string
     */
    public function getNewTab()
    {
        return $this->newTab;
    }
}