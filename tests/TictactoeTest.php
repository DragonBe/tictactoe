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
    public function testGamePlayersAreSetAtStart()
    {
        $players = $this->_ttt->getPlayers();
        $this->assertInstanceOf('Players', $players);
        $this->assertEquals(2, count($players));
        $this->assertEquals(Player::PLAYER_X, $players->seek(0)->current()->getSymbol());
        $this->assertEquals(Player::PLAYER_O, $players->seek(1)->current()->getSymbol());
    }
    public function rowColProvider()
    {
        return array (
            array (array (array (0,0), array (0,1), array (0,2))),
            array (array (array (0,0), array (1,0), array (2,0))),
            array (array (array (0,0), array (1,1), array (2,2))),
            array (array (array (0,2), array (1,1), array (2,0))),
        );
    }
    /**
     * @dataProvider rowColProvider
     */
    public function testGameplayCanDetectWinner($rowCols)
    {
        $player = $this->_ttt->getPlayers()->seek(0)->current();
        $this->assertFalse($this->_ttt->play($rowCols[0][0], $rowCols[0][1], $player));
        $this->assertFalse($this->_ttt->play($rowCols[1][0], $rowCols[1][1], $player));
        $this->assertTrue($this->_ttt->play($rowCols[2][0], $rowCols[2][1], $player));
    }
    public function testGameCanBePlayed()
    {
        $playerX = $this->_ttt->getPlayers()->seek(0)->current();
        $playerO = $this->_ttt->getPlayers()->seek(1)->current();
        $this->assertFalse($this->_ttt->play(0, 0, $playerX));
        $this->assertFalse($this->_ttt->play(0, 1, $playerO));
        $this->assertFalse($this->_ttt->play(1, 1, $playerX));
        $this->assertFalse($this->_ttt->play(2, 2, $playerO));
        $this->assertFalse($this->_ttt->play(1, 0, $playerX));
        $this->assertFalse($this->_ttt->play(2, 0, $playerO));
        $this->assertTrue($this->_ttt->play(1, 2, $playerX));
        return $this->_ttt;
    }
    /**
     * @depends testGameCanBePlayed
     * @expectedException RuntimeException
     */
    public function testGameStopsAfterWinning($game)
    {
        $playerO = $game->getPlayers()->seek(1)->current();
        $game->play(2,1, $playerO);
    }
}
