<?php
class PlayerTest extends PHPUnit_Framework_TestCase
{
    protected $_player;
    protected function setUp()
    {
        $this->_player = new Player();
        parent::setUp();
    }
    protected function tearDown()
    {
        $this->_player = null;
        parent::tearDown();
    }
    public function testPlayerHasNoSymbolAtStartup()
    {
        $this->assertNull($this->_player->getSymbol());
    }
    public function goodSymbolProvider()
    {
        return array (
            array ('O'),
            array ('X'),
        );
    }
    /**
     * @dataProvider goodSymbolProvider
     */
    public function testPlayerCanSetASymbol($symbol)
    {
        $this->_player->setSymbol($symbol);
        $this->assertEquals($symbol, $this->_player->getSymbol());
    }
    public function badSymbolProvider()
    {
        return array (
            array ('a'),
            array (123),
            array ('Hello World!'),
            array (0x123),
        );
    }
    /**
     * @dataProvider badSymbolProvider
     * @expectedException InvalidArgumentException
     */
    public function testPlayerThrowsExceptionWithBadSymbol($symbol)
    {
        $this->_player->setSymbol($symbol);
    }
}