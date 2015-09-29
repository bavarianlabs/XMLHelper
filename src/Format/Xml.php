<?php

namespace Bavarianlabs\XMLHelper\Format;


use Bavarianlabs\XMLHelper\Contracts\FormatInterface;
use XMLWriter;

class Xml extends BaseXml implements FormatInterface
{

    /**
     * Constructor
     * Load Standard PHP Class XMLWriter and path it to variable
     *
     * @access    public
     */
    public function __construct()
    {
        $this->writer = new XMLWriter();
    }

    /**
     * Parse data to concrete implementation
     *
     * @param   mixed $data
     * @return  mixed
     */
    function parse($data)
    {
        $this->writer->openMemory();
        $this->writer->startDocument($this->version, $this->encoding);
        $this->writer->startElement($this->rootName);

        if ($this->isRootAttrArray()) {
            $this->setAttrArray($this->getRootAttr());
        }

        if (! $this->isRootSelf()) {
            $this->writer->text($this->newLine);

            if (is_array($data) && ! empty($data)) {
                $this->_getXML($data);
            }
        }

        $this->writer->endElement();

        return $this->writer->outputMemory();
    }

    /**
     * @return bool
     */
    private function isRootAttrArray()
    {
        return !empty($this->getRootAttr()) && is_array($this->getRootAttr());
    }

    private function setAttrArray(array $data)
    {
        foreach ($data as $attrName => $attrText) {
            $this->writer->writeAttribute($attrName, $attrText);
        }
    }

    /**
     * @return bool
     */
    private function isRootSelf()
    {
        return true === $this->rootSelf;
    }

    /**
     * Writing XML document by passing through array
     *
     * @param    array
     * @param    int
     * @return    void
     */
    private function _getXML(&$data, $tabs_count = 0)
    {
        foreach ($data as $key => $val) {
            unset($data[$key]);

            if ($this->isAttributeArray($key)) {
                continue;
            }

            if (is_numeric($key)) {
                if (! is_array($val)) {
                    $tabs_count = 0;
                }

                if ($tabs_count > 0) {
                    $tabs_count --;
                }

                continue;
            }

            $key = $this->sanitizeNumber($key);

            if ($key !== false) {
                $this->writer->text(str_repeat($this->newTab, $tabs_count));
                $this->writer->startElement($key);
                $val = $this->setElementAttributes($key, $val);
            }

            if (is_array($val)) {
                if ($key !== false) {
                    $this->writer->text($this->newLine);
                }
                $tabs_count++;
                $this->_getXML($val, $tabs_count);
                $tabs_count--;
                if ($key !== false) {
                    $this->writer->text(str_repeat($this->newTab, $tabs_count));
                }
            } else {
                if ($val != NULL || $val === 0) {
                    if (isset($this->CDataKeys[$key]) || array_search($key, $this->CDataKeys) !== false) {
                        $this->writer->writeCData($val);
                    } elseif (array_search($key, $this->rawKeys) !== false) {
                        $this->writer->writeRaw($val);
                    } else {
                        $this->writer->text($val);
                    }
                } elseif ($this->emptyElementSyntax === self::EMPTY_FULL) {
                    $this->writer->text('');
                }
            }

            $this->insertNewLine($key);
        }
    }

    /**
     * @param $key
     */
    private function insertNewLine($key)
    {
        if (false !== $key) {
            $this->writer->endElement();
            $this->writer->text($this->newLine);
        }
    }

    /**
     * @param $key
     * @return bool
     */
    private function isAttributeArray($key)
    {
        return substr($key, 0, 1) == '@';
    }

    /**
     * @param $key
     * @return mixed
     */
    private function sanitizeNumber($key)
    {
        if ($this->filterNumbers === true || in_array(preg_replace('#[0-9]*#', '', $key), $this->tagsToFilter)) {
            return preg_replace('#[0-9]*#', '', $key);
        }

        return $key;
    }

    /**
     * @param $val
     * @return mixed
     */
    private function addContent($val)
    {
        if (! empty($val['@content']) && is_string($val['@content']) && isset($val['@attributes'])) {
            return $val['@content'];
        }

        return $val;
    }

    /**
     * @param $attributes
     */
    private function setElements($attributes)
    {
        foreach ($attributes as $elementAttrName => $elementAttrText) {
            $this->setElement($elementAttrName, $elementAttrText);
        }
    }

    /**
     * @param $key
     * @param $val
     * @return mixed
     */
    private function setElementAttributes($key, $val)
    {
        if (! $this->hasAttributes($key, $val)) {
            return $val;
        }

        list($val, $attributes) = $this->getAttributes($key, $val);

        $this->setElements($attributes);

        return $this->addContent($val);

    }

    /**
     * @param $key
     * @param $val
     * @return array
     */
    private function getAttributes($key, $val)
    {
        if (isset($val['@attributes']) && is_array($val['@attributes'])) {
            $attributes = $val['@attributes'];
        } else {
            $attributes = $this->elementAttrs[$key];
        }

        return array($val, $attributes);
    }

    /**
     * @param $key
     * @param $val
     * @return bool
     */
    private function hasAttributes($key, $val)
    {
        return isset($this->elementAttrs[$key]) || isset($val['@attributes']);
    }

    /**
     * @param $elementAttrName
     * @param $elementAttrText
     */
    private function setElement($elementAttrName, $elementAttrText)
    {
        $this->writer->startAttribute($elementAttrName);
        $this->writer->text($elementAttrText);
        $this->writer->endAttribute();
    }
}