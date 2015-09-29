<?php

namespace Bavarianlabs\XMLHelper;


use Bavarianlabs\XMLHelper\Contracts\FormatInterface;
use Bavarianlabs\XMLHelper\Contracts\XMLHelperInterface;
use Bavarianlabs\XMLHelper\Exception\EmptyDataCollectionException;
use Bavarianlabs\XMLHelper\Exception\NotImplementedMethodException;
use Bavarianlabs\XMLHelper\Format\Json;
use Bavarianlabs\XMLHelper\Format\Xml;

class XMLHelper implements XMLHelperInterface
{

    /**
     * @var mixed Bag for any data collection
     */
    private $data;

    /**
     * @var array Supported Formats for Conversions
     */
    private $supportedFormats = array (
        'application/xml'           => 'xml',
        'text/xml'                  => 'xml',
        'application/json'          => 'json',
        'application/x-javascript'  => 'json',
        'text/javascript'           => 'json',
        'text/x-javascript'         => 'json',
        'text/x-json'               => 'json',
        'application/bson'          => 'bson',
        'text/yaml'                 => 'yaml',
        'text/x-yaml'               => 'yaml',
        'application/yaml'          => 'yaml',
        'application/x-yaml'        => 'yaml',
    );

    /**
     * Get all formats supported
     *
     * @return array
     */
    public function getSupportedFormats()
    {
        return $this->supportedFormats;
    }

    /**
     * Insert any data collection to parse after
     *
     * @param  mixed $data
     * @return XMLHelper
     * @throws EmptyDataCollectionException
     */
    function data($data)
    {
        $this->isDataEmpty($data);

        return $this->addData($data);
    }

    /**
     * Parse data to some format
     *
     * @param  mixed           $data
     * @param  FormatInterface $format
     * @return mixed
     */
    function parse($data = null, FormatInterface $format)
    {
        $this->extractData($data);

        return $format->parse($data);
    }

    /**
     * Parse data to XML format
     *
     * @param  $data
     * @return mixed XML Object
     */
    function xml($data = null)
    {
        $this->extractData($data);

        return $this->parse($this->data, new Xml());
    }

    /**
     * Parse data to JSON format
     *
     * @param  $data
     * @return mixed
     */
    function json($data = null)
    {
        $this->extractData($data);

        return $this->parse($this->data, new Json());
    }

    /**
     * Parse data to BSON format
     *
     * @param  $data
     * @return mixed
     * @throws NotImplementedMethodException
     */
    function bson($data = null)
    {
        $this->extractData($data);

        throw new NotImplementedMethodException();
    }

    /**
     * Parse data to YAML format
     *
     * @param  $data
     * @return mixed
     * @throws NotImplementedMethodException
     */
    function yaml($data = null)
    {
        $this->extractData($data);

        throw new NotImplementedMethodException();
    }

    /**
     * Parse data to array
     *
     * @param  $data
     * @return array
     * @throws NotImplementedMethodException
     */
    function toArray($data = null)
    {
        $this->extractData($data);

        throw new NotImplementedMethodException();
    }

    /**
     * Receive some data to save on property
     *
     * @param mixed|array $data
     */
    private function addData($data)
    {
        $this->data = $data;
    }

    /**
     * Verify if data collection was given
     *
     * @param  $data
     * @return bool true if data is not null
     * @throws EmptyDataCollectionException
     */
    private function isDataEmpty($data)
    {
        if (empty($data)) {
            throw new EmptyDataCollectionException();
        }

        return true;
    }

    /**
     * @param $data
     */
    private function extractData($data)
    {
        if (! is_null($data)) {
            $this->data = $data;
        }
    }
}