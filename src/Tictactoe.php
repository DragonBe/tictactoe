<?php
/**
 * TicTacToe
 * 
 * A simple game that's played with two players, each taking a turn by marking
 * a field in a grid of 3 x 3 with either an X or an O (one symbol per player).
 * Winner is the one who has 3 identical symbols in a single horizontal,
 * vertical or diagonal row.
 * 
 * @package Tictactoe
 * @license "Attribution-ShareAlike 3.0 Unported (CC BY-SA 3.0)"
 * @link http://creativecommons.org/licenses/by-sa/3.0/
 */
/**
 * @see Grid
 */
require_once 'Grid.php';
/**
 * @see Players
 */
require_once 'Players.php';
/**
 * @see Player
 */
require_once 'Player.php';
/**
 * Tictactoe
 * 
 * This Tictactoe class is the main class that is used to play a game of
 * tictactoe with 2 players in maximum 9 rounds.
 * 
 * @package Tictactoe
 * @category Tictactoe
 * @link http://en.wikipedia.org/wiki/Tic-tac-toe
 *
 */
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