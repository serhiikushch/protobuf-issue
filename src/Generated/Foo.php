<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: messages.proto

namespace Generated;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>generated.Foo</code>
 */
class Foo extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>.generated.Bar bar = 1;</code>
     */
    private $bar = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Generated\Bar $bar
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Messages::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>.generated.Bar bar = 1;</code>
     * @return \Generated\Bar
     */
    public function getBar()
    {
        return $this->bar;
    }

    /**
     * Generated from protobuf field <code>.generated.Bar bar = 1;</code>
     * @param \Generated\Bar $var
     * @return $this
     */
    public function setBar($var)
    {
        GPBUtil::checkMessage($var, \Generated\Bar::class);
        $this->bar = $var;

        return $this;
    }

}
