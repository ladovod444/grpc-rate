<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: message.proto

namespace GRPCContracts\Currency;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>currency.dto.GetRateRequest</code>
 */
class GetRateRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string ticker = 1;</code>
     */
    protected $ticker = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $ticker
     * }
     */
    public function __construct($data = NULL) {
        \GRPCContracts\Currency\GPBMetadata\Message::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>string ticker = 1;</code>
     * @return string
     */
    public function getTicker()
    {
        return $this->ticker;
    }

    /**
     * Generated from protobuf field <code>string ticker = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setTicker($var)
    {
        GPBUtil::checkString($var, True);
        $this->ticker = $var;

        return $this;
    }

}

