<?php
class PlayersTest extends PHPUnit_Framework_TestCase
{
    protected $_players;
    
    protected function setUp()
    {
        $this->_players = new Players();
        parent::setUp();
    }
    protected function tearDown()
    {
        parent::tearDown();
        $this->_players = null;
    }
    public function testPlayersIsEmptyAtStartUp()
    {
        $this->assertEmpty($this->_players->getPlayers());
    }
    public function testPlayerCanAddPlayer()
    {
        $this->_players->addPlayer(new Player());
        $this->assertEquals(1, count($this->_players));
    }
    public function testPlayerCanTwoPlayerObjects()
    {
        $this->_players->addPlayer(new Player())
                       ->addPlayer(new Player());
        $this->assertEquals(2, count($this->_players));
    }
    /**
     * @expectedException OverflowException
     */
    public function testPlayerCannotAddMoreThenTwoPlayerObjects()
    {
        $this->_players->addPlayer(new Player())
                       ->addPlayer(new Player())
                       ->addPlayer(new Player());
    }
}