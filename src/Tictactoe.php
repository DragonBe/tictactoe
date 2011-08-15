<?php
class Tictactoe
{
    const MAX_ROUNDS = 9;
    const SYMBOL_X = 'X';
    const SYMBOL_Y = 'Y';
    
    protected $_players;
    protected $_grid;
    
    public function __construct()
    {
        $this->_players = array (
            new Player(self::SYMBOL_X),
            new Player(self::SYMBOL_Y),
        );
        $this->_grid = new Grid();
    }
    public function play($row = 0, $column = 0, Player $player)
    {
        $this->_grid->write($row, $column, $player);
    }
    public function isWinner(Player $player)
    {
        
    }
}