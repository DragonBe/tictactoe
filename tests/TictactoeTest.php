<?php
require_once 'Tictactoe.php';
class TictactoeTest extends PHPUnit_Framework_TestCase
{
    protected $_ttt;
    protected function setUp()
    {
        parent::setUp();
        $this->_ttt = new Tictactoe();
    }
    protected function tearDown()
    {
        $this->_ttt = null;
        parent::tearDown();
    }
    public function testGameGridIsSetAtStart()
    {
        $grid = $this->_ttt->getGrid();
        $this->assertInstanceOf('Grid', $grid);
        $this->assertEquals(3, count($grid->getRows()));
        foreach ($grid->getRows() as $row) {
            $this->assertInternalType('array', $row);
            $this->assertEquals(3, count($row));
            $this->assertNull($row[0]);
            $this->assertNull($row[1]);
            $this->assertNull($row[2]);
        }
    }
    public function testGamePlayersAreSetAtStart()
    {
        $players = $this->_ttt->getPlayers();
        $this->assertInstanceOf('Players', $players);
        $this->assertEquals(2, count($players));
        $this->assertEquals(Player::PLAYER_X, $players->seek(0)->current()->getSymbol());
        $this->assertEquals(Player::PLAYER_O, $players->seek(1)->current()->getSymbol());
    }
    public function testGameCanBePlayed()
    {
        $playerX = $this->_ttt->getPlayers()->seek(0)->current();
        $playerO = $this->_ttt->getPlayers()->seek(1)->current();
        
        $this->assertFalse($this->_ttt->play(0, 0, $playerX));
        $this->assertFalse($this->_ttt->play(0, 1, $playerX));
        $this->assertTrue($this->_ttt->play(0, 2, $playerX));
        
        $this->_ttt->setGrid(new Grid());
        
        $this->assertFalse($this->_ttt->play(0, 0, $playerX));
        $this->assertFalse($this->_ttt->play(1, 0, $playerX));
        $this->assertTrue($this->_ttt->play(2, 0, $playerX));
        
        $this->_ttt->setGrid(new Grid());
        
        $this->assertFalse($this->_ttt->play(0, 0, $playerX));
        $this->assertFalse($this->_ttt->play(1, 1, $playerX));
        $this->assertTrue($this->_ttt->play(2, 2, $playerX));
        
        $this->_ttt->setGrid(new Grid());
        
        $this->assertFalse($this->_ttt->play(0, 2, $playerX));
        $this->assertFalse($this->_ttt->play(1, 1, $playerX));
        $this->assertTrue($this->_ttt->play(2, 0, $playerX));
    }
}
