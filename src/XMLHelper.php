<?php

namespace Bavarianlabs\XMLHelper;


use Bavarianlabs\XMLHelper\Contracts\FormatInterface;
use Bavarianlabs\XMLHelper\Contracts\XMLHelperInterface;
use Bavarianlabs\XMLHelper\Exception\EmptyDataCollectionException;

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

    function parse($data, FormatInterface $format)
    {
        // TODO: Implement parse() method.
    }

    function xml($data)
    {
        // TODO: Implement xml() method.
    }

    function json($data)
    {
        // TODO: Implement json() method.
    }

    function bson($data)
    {
        // TODO: Implement bson() method.
    }

    function yaml($data)
    {
        // TODO: Implement yaml() method.
    }

    function toArray($data)
    {
        // TODO: Implement toArray() method.
    }

    /**
     * Insert any data collection to parse after
     *
     * @param   mixed $data
     * @return  XMLHelper
     * @throws  EmptyDataCollectionException
     */
    function data($data)
    {
        $this->isDataEmpty($data);

        return $this->addData($data);
    }

    /**
     * Receive some data to save on property
     *
     * @param mixed|array   $data
     */
    private function addData($data)
    {
        $this->data = $data;
    }

    /**
     * Verify if data collection was given
     *
     * @param   $data
     * @return bool true if data is not null
     * @throws  EmptyDataCollectionException
     */
    private function isDataEmpty($data)
    {
        if (is_null($data)) throw new EmptyDataCollectionException();

        return true;
    }
}