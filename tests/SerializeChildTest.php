<?php
require_once '../vendor/autoload.php';

use Generated\Bar;
use Generated\Foo;
use Google\Protobuf\StringValue;
use PHPUnit\Framework\TestCase;

class SerializeChildTest extends TestCase
{
    /**
     * @dataProvider serializeDataProvider
     * @param string $expected
     * @param \Google\Protobuf\Internal\Message $message
     */
    public function testSerialize(string $expected, \Google\Protobuf\Internal\Message $message)
    {
        $this->assertEquals($expected, $message->serializeToJsonString());
    }

    public function serializeDataProvider()
    {
        $stringValue = new StringValue(['value' => '']);
        $bar = new Bar();
        $bar->setField($stringValue);
        return [
            ["{}", new Foo()],
            ["{}", new Bar()],
            ['{"field":""}', new Bar(['field' => ''])],
            ['{"field":""}', $bar],
            ['{"bar":{}}', new Foo(['bar' => new Bar()])],
            ['{"bar":{"field":""}}', new Foo(['bar' => new Bar(['field' => ''])])], // fails with ext
            ['{"bar":{"field":""}}', new Foo(['bar' => $bar])] // fails with ext
        ];
    }
}
