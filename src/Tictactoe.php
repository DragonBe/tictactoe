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
    /**
     * Constant to tell how many maximum rounds exists
     * 
     * @var int
     */
    const MAX_ROUNDS = 9;
    /**
     * Collection of players
     * 
     * @var Players
     */
    protected $_players;
    /**
     * The game board
     * 
     * @var Grid
     */
    protected $_grid;
    /**
     * Status indicator to say there's a winner or not
     * 
     * @var bool
     */
    protected $_winner = false;
    /**
     * Constructor that sets up our game board and assigns symbols to our
     * players.
     */
    public function __construct()
    {
        $this->setGrid(new Grid(3,3));
        $this->setPlayers(new Players(array(
            new Player(Player::PLAYER_X), new Player(Player::PLAYER_O))));
    }
    /**
     * Sets the Grid
     * 
     * @param Grid $grid
     * @return Tictactoe
     */
    public function setGrid(Grid $grid)
    {
        $this->_grid = $grid;
        return $this;
    }
    /**
     * Retrieves the game board from the game
     * 
     * @return Grid
     */
    public function getGrid()
    {
        return $this->_grid;
    }
    /**
     * Sets the players collection
     * 
     * @param Players $players
     * @return Tictactoe
     */
    public function setPlayers(Players $players)
    {
        $this->_players = $players;
        return $this;
    }
    /**
     * Retrieves the players from the game
     * 
     * @return Players
     */
    public function getPlayers()
    {
        return $this->_players;
    }
    /**
     * Sets a flag to indicate this game has a winner
     * 
     * @param bool $flag
     * @return Tictactoe
     */
    public function setWinner($flag = true)
    {
        $this->_winner = $flag;
        return $this;
    }
    /**
     * Checks if the game has a winner
     * 
     * @return bool
     */
    public function hasWinner()
    {
        return $this->_winner;
    }
    /**
     * Plays the game and returns TRUE if a player has become a winner, FALSE
     * if the player is not (yet) a winner.
     * 
     * @param int $row
     * @param int $column
     * @param Player $player
     * @return bool
     * @throws RuntimeException
     */
    public function play($row, $column, Player $player)
    {
        if ($this->hasWinner()) {
            throw new RuntimeException('Game already has a winner');
        }
        $this->getGrid()->setSymbol($row, $column, $player->getSymbol());
        return $this->isWinner($player);
    }
    /**
     * Returns TRUE if a player has become a winner, FALSE if not.
     * 
     * @param Player $player
     * @return bool
     */
    public function isWinner(Player $player)
    {
        if ($this->getGrid()->inRow($player->getSymbol())) {
            $this->setWinner();
            return true;
        }
        if ($this->getGrid()->inColumn($player->getSymbol())) {
            $this->setWinner();
            return true;
        }
        if ($this->getGrid()->inDiagonal($player->getSymbol())) {
            $this->setWinner();
            return true;
        }
        return false;
    }
}