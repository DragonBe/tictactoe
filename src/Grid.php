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
 * Grid
 * 
 * This Grid class is responsible to set up and maintain the playing field
 * 
 * @package Tictactoe
 * @category Tictactoe
 *
 */
class Grid
{
    /**
     * Constant to define the number of rows
     * @var int
     */
    const ROWS = 3;
    /**
     * Constant to define the number of colomns
     * @var int
     */
    const COLS = 3;
    /**
     * Container for all rows and columns
     * 
     * @var array
     */
    protected $_rows = array ();
    /**
     * Constructor for this Grid class that will set up our grid with 3 rows
     * and 3 columns while setting the value of each field to NULL
     */
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
    /**
     * Adds a row to the grid, requiring an array of 3 fields representing
     * the columns
     * 
     * @param array $row
     * @return Grid
     */
    public function addRow(array $row)
    {
        $this->_rows[] = $row;
        return $this;
    }
    /**
     * Retrieves all rows from this grid, including an array for the columns
     * for each row
     * 
     * @return array
     */
    public function getRows()
    {
        return $this->_rows;
    }
    /**
     * Sets the symbol for each field
     * 
     * @param int $row The position of the field in the row
     * @param int $column The position of the field in the column
     * @param string $symbol
     */
    public function setSymbol($row, $column, $symbol)
    {
        $this->_rows[$row][$column] = $symbol;
        return $this;
    }
    /**
     * Retrieves the current symbol from a given cordinate on the grid
     * 
     * @param int $row The postion of the field in the row
     * @param int $column The position of the field in the column
     * @return string
     */
    public function getSymbol($row, $column)
    {
        return $this->_rows[$row][$column];
    }
    /**
     * Validation method to verify if a given symbol is found 3 times in a
     * single row. If we have 3 matches, it will return TRUE. In all other
     * cases it will return FALSE.
     * 
     * @param string $symbol
     * @return boolean
     */
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
    /**
     * Validation method to verify if a given symbol is found 3 times in a
     * single column. If we have 3 matches, it will return TRUE. In all other
     * cases it will return FALSE.
     * 
     * @param string $symbol
     * @return boolean
     */
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
    /**
     * Validation method to verify if a given symbol is found 3 times in a
     * single diagonal row. If we have 3 matches, it will return TRUE. In all 
     * other cases it will return FALSE.
     * 
     * @param string $symbol
     * @return boolean
     */
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