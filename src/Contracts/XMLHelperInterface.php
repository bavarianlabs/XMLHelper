<?php

namespace Bavarianlabs\XMLHelper\Contracts;


interface XMLHelperInterface
{
    function parse($data, FormatInterface $format);
    function xml($data);
    function json($data);
    function bson($data);
    function yaml($data);
    function toArray($data);
    function data($data);
}