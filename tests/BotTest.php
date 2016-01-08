<?php

namespace seregazhuk\tests;

use ReflectionClass;
use PHPUnit_Framework_TestCase;
use seregazhuk\PinterestBot\Api\Response;
use seregazhuk\PinterestBot\PinterestBot;
use seregazhuk\tests\helpers\ReflectionHelper;

class BotTest extends PHPUnit_Framework_TestCase
{
    use ReflectionHelper;

    /**
     * @var PinterestBot;
     */
    protected $bot;

    protected function setUp()
    {
        $this->bot = new PinterestBot('test', 'test');
        $this->reflection = new ReflectionClass($this->bot);
        $this->setReflectedObject($this->bot);
    }

    protected function tearDown()
    {
        $this->bot = null;
        $this->reflection = null;
    }

    /** @test */
    public function getLastResponseError()
    {
        $error = 'expected_error';
        $mock = $this->getMock(Response::class, ['getLastError']);
        $mock->method('getLastError')->willReturn($error);
        $this->setProperty('response', $mock);
        $this->assertEquals($error, $this->bot->getLastError());
    }

}
