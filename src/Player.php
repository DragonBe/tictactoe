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
 * Player
 * 
 * This Player class is responsible to set up and maintain a single player
 * 
 * @package Tictactoe
 * @category Tictactoe
 *
 */
class Player
{
    /**
     * Defines the symbol X for a player to choose
     * 
     * @var string
     */
    const PLAYER_X = 'X';
    /**
     * Defines the symbol X for a player to choose
     * 
     * @var string
     */
    const PLAYER_O = 'O';
    /**
     * The symbol a player chooses
     * 
     * @var string
     */
    protected $_symbol;
    /**
     * Constructor for a single player, with an optional symbol (X or O) to
     * define the player's playing symbol
     * 
     * @param string $symbol
     */
    public function __construct($symbol = null)
    {
        if (null !== $symbol) {
            $this->setSymbol($symbol);
        }
    }
    /**
     * Sets a symbol for this Player
     * 
     * @param string $symbol
     * @return Player
     * @throws InvalidArgumentException
     */
    public function setSymbol($symbol)
    {
        $validSymbols = array (self::PLAYER_O, self::PLAYER_X);
        if (!in_array($symbol, $validSymbols)) {
            throw new InvalidArgumentException(
                'Player can only choose between X or O');
        }
        $this->_symbol = (string) $symbol;
        return $this;
    }
    /**
     * Retrieves the chosen symbol from this Player
     * 
     * @return string
     */
    public function getSymbol()
    {
        return $this->_symbol;
    }
}