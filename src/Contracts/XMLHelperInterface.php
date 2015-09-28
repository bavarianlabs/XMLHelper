<?php

namespace Bavarianlabs\XMLHelper\Contracts;


interface XMLHelperInterface
{

    /**
     * Parse data to some format
     *
     * @param   mixed   $data
     * @param   FormatInterface $format
     * @return  mixed
     */
    function parse($data = null, FormatInterface $format);

    /**
     * Parse data to XML format
     *
     * @param $data
     * @return mixed XML Object
     */
    function xml($data = null);

    /**
     * Parse data to JSON format
     *
     * @param $data
     * @return mixed
     */
    function json($data = null);

    /**
     * Parse data to BSON format
     *
     * @param $data
     * @return mixed
     */
    function bson($data = null);

    /**
     * Parse data to YAML format
     *
     * @param $data
     * @return mixed
     */
    function yaml($data = null);

    /**
     * Parse data to array
     *
     * @param $data
     * @return array
     */
    function toArray($data = null);

    /**
     * Insert any data collection to parse after
     *
     * @param $data
     */
    function data($data);
}