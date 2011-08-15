<?php
class Grid
{
    protected $_grid;
    
    public function __construct()
    {
        $this->_grid = array (
            array ('','',''),
            array ('','',''),
            array ('','',''),
        );
    }
    public function write($row, $column, Player $player)
    {
        $this->_grid[$row][$column] = $player->getSymbol();
    }
    public function inRows($symbol)
    {
        foreach ($this->_grid as $row) {
            if ($symbol == $row[0] && $symbol == $row[1] && $symbol == $row[2]) {
                return true;
                break;
            }
        }
        return false;
    }
    public function inColumns($symbol)
    {
        for ($i = 0; $i < 3; $i++) {
            if ($symbol == $this->_grid[0][$i] && $symbol == $this->_grid[1][$i] && $symbol == $this->_grid[2][$i]) {
                return true;
                break;
            }
        }
        return false;
    }
    public function inDiagonal($symbol)
    {
        if ($symbol == $this->_grid[0][0] && $symbol == $this->_grid[1][1] && $symbol == $this->_grid[2][2]) {
            return true;
        } elseif ($symbol == $this->_grid[0][2] && $symbol == $this->_grid[1][1] && $symbol == $this->_grid[2][0]) {
            return true;
        }
        return false;
    }
}