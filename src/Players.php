<?php
class Players implements SeekableIterator, Countable
{
    protected $_players;
    protected $_position;
    protected $_count;
    
    public function __construct(array $array = null)
    {
        if (null !== $array) {
            foreach ($array as $player) {
                $this->addPlayer($player);
            }
        }
    }
    
    public function addPlayer(Player $player)
    {
        $this->_players[] = $player;
        return $this;
    }
    
    public function getPlayers()
    {
        return $this->_players;
    }
    
    public function rewind()
    {
        $this->_position = 0;
    }
    
    public function next()
    {
        $this->_position++;
    }
    
    public function valid()
    {
        return isset ($this->_player[$this->_position]);
    }
    
    public function current()
    {
        return $this->_players[$this->_position];
    }
    
    public function key()
    {
        return $this->_position;
    }
    
    public function seek($position)
    {
        if (!isset ($this->_players[$position])) {
            throw new OutOfBoundsException('No more items in this stack');
        }
        $this->_position = $position;
        return $this;
    }
    
    public function count()
    {
        return count($this->_players);
    }
}