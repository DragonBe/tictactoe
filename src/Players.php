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
 * Players
 * 
 * This Players class is a collection container for both players, implementing
 * both Countable and SeekableIterator interfaces from SPL
 * 
 * @package Tictactoe
 * @category Tictactoe
 * @see SeekableIterator
 * @see Countable
 * @link http://php.net/spl
 *
 */
class Players implements SeekableIterator, Countable
{
    const MAX_PLAYERS = 2;
    /**
     * Contains Player objects
     * 
     * @var array
     */
    protected $_players = array ();
    /**
     * Specifies the position in the stack
     * 
     * @var int
     */
    protected $_position;
    /**
     * Keeps track of the count
     * 
     * @var int
     */
    protected $_count;
    /**
     * Constructor for this Players collection, allows setting players with
     * optional provided array of Player objects
     * 
     * @param array $array
     */
    public function __construct(array $array = null)
    {
        if (null !== $array) {
            foreach ($array as $player) {
                $this->addPlayer($player);
            }
        }
    }
    /**
     * Adds a Player object to the collection
     * 
     * @param Player $player
     * @return Players
     * @throw Overflow
     */
    public function addPlayer(Player $player)
    {
        if (self::MAX_PLAYERS <= $this->count()) {
            throw new OverflowException('Cannot add more Player objects');
        }
        $this->_players[] = $player;
        return $this;
    }
    /**
     * Retrieves a list of Player objects currently in the collection
     * 
     * @return array
     */
    public function getPlayers()
    {
        return $this->_players;
    }
    /**
     * Sets the internal stack pointer back to 0
     * 
     * @see SeekableIterator::rewind()
     */
    public function rewind()
    {
        $this->_position = 0;
    }
    /**
     * Sets the internal stack pointer to the next position
     * 
     * @see SeekableIterator::next()
     */
    public function next()
    {
        $this->_position++;
    }
    /**
     * Checks if the current position in the stack is still valid
     * 
     * @see SeekableIterator::valid()
     * @return boolean
     */
    public function valid()
    {
        return isset ($this->_player[$this->_position]);
    }
    /**
     * Retrieves the current object from the stack
     * 
     * @see SeekableIterator::current()
     * @return Player
     */
    public function current()
    {
        return $this->_players[$this->_position];
    }
    /**
     * Retrieves the current position from the stack
     * 
     * @see SeekableIterator::key()
     * @return int
     */
    public function key()
    {
        return $this->_position;
    }
    /**
     * Moves the position to the given stack postion
     * 
     * @see SeekableIterator::seek()
     * @throws OutOfBoundsException
     */
    public function seek($position)
    {
        if (!isset ($this->_players[$position])) {
            throw new OutOfBoundsException('No more items in this stack');
        }
        $this->_position = $position;
        return $this;
    }
    /**
     * Keeps record of the count in this collection
     * 
     * @see Countable::count()
     */
    public function count()
    {
        return count($this->_players);
    }
}