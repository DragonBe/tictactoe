<?php
require_once 'Grid.php';
require_once 'Players.php';
require_once 'Player.php';
class Tictactoe
{
    const MAX_ROUNDS = 9;
    
    protected $_players;
    protected $_grid;
    
    public function __construct()
    {
        $this->setGrid(new Grid(3,3));
        $this->setPlayers(new Players(array(
            new Player(Player::PLAYER_X), new Player(Player::PLAYER_O))));
    }
    
    public function setGrid(Grid $grid)
    {
        $this->_grid = $grid;
        return $this;
    }
    public function getGrid()
    {
        return $this->_grid;
    }
    public function setPlayers(Players $players)
    {
        $this->_players = $players;
        return $this;
    }
    public function getPlayers()
    {
        return $this->_players;
    }
    
    public function play($row, $column, Player $player)
    {
        $this->getGrid()->setSymbol($row, $column, $player->getSymbol());
        return $this->isWinner($player);
    }
    public function isWinner(Player $player)
    {
        if ($this->getGrid()->inRow($player->getSymbol())) {
            return true;
        }
        if ($this->getGrid()->inColumn($player->getSymbol())) {
            return true;
        }
        if ($this->getGrid()->inDiagonal($player->getSymbol())) {
            return true;
        }
        return false;
    }
}