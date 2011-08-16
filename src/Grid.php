<?php
class Grid
{
    const ROWS = 3;
    const COLS = 3;
    
    protected $_rows = array ();
    
    public function __construct()
    {
        for ($i = 0; $i < self::ROWS; $i++) {
            $columns = array ();
            for ($j = 0; $j < self::COLS; $j++) {
                $columns[$j] = null;
            }
            $this->addRow($columns);
        }
    }
    public function addRow(array $row)
    {
        $this->_rows[] = $row;
        return $this;
    }
    public function getRows()
    {
        return $this->_rows;
    }
    
    public function setSymbol($row, $column, $symbol)
    {
//        if (!isset ($this->_grid[$row][$column])) {
//            throw new OutOfBoundsException('Invalid position on this grid');
//        }
        $this->_rows[$row][$column] = $symbol;
    }
    
    public function inRow($symbol)
    {
        foreach ($this->getRows() as $row) {
            $match = 0;
            foreach ($row as $column) {
                if ($symbol === $column) {
                    $match++;
                }
            }
            if (self::ROWS === $match) {
                return true;
            }
        }
        return false;
    }
    public function inColumn($symbol)
    {
        for ($i = 0; $i < self::COLS; $i++) {
            $match = 0;
            for ($j = 0; $j < self::ROWS; $j++) {
                if ($symbol === $this->_rows[$j][$i]) {
                    $match++;
                }
            }
            if (self::COLS === $match) {
                return true;
            }
        }
        return false;
    }
    public function inDiagonal($symbol)
    {
        $match1 = $match2 = 0;
        for ($i = 0; $i < self::ROWS; $i++) {
            if ($symbol === $this->_rows[$i][$i]) {
                $match1++;
            }
            if ($symbol === $this->_rows[$i][self::COLS - 1 - $i]) {
                $match2++;
            }
        }
        if (self::ROWS === $match1 || self::ROWS === $match2) {
            return true;
        }
        return false;
    }
}