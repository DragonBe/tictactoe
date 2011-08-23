<?php
class GridTest extends PHPUnit_Framework_TestCase
{
    const TEST_SYMBOL = 'X';
    
    protected $_grid;
    
    protected function setUp()
    {
        $this->_grid = new Grid();
        parent::setUp();
    }
    protected function tearDown()
    {
        parent::tearDown();
        $this->_grid = null;
    }
    public function testGameGridIsSetAtStart()
    {
        $this->assertEquals(Grid::ROWS, count($this->_grid->getRows()));
        foreach ($this->_grid->getRows() as $row) {
            $this->assertInternalType('array', $row);
            $this->assertEquals(Grid::COLS, count($row));
            foreach ($row as $column) {
                $this->assertNull($column);
            }
        }
    }
    public function cordinateProvider()
    {
        return array (
            array (0,0), array (0,1), array (0,2), array (1,0), array (1,1),
            array (1,2), array (2,0), array (2,1), array (2,2),
        );
    }
    /**
     * @dataProvider cordinateProvider
     */
    public function testGridCanPositionASymbol($row, $column)
    {
        $this->_grid->setSymbol($row, $column, self::TEST_SYMBOL);
        $this->assertNotNull($this->_grid->getSymbol($row, $column));
        $this->assertEquals(self::TEST_SYMBOL, $this->_grid->getSymbol($row, $column));
    }
    protected function _setDataOnGrid($data)
    {
        foreach ($data as $field) {
            list ($row, $column) = $field;
            $this->_grid->setSymbol($row, $column, self::TEST_SYMBOL);
        }
    }
    public function horizontalRowProvider()
    {
        return array (
            array (array (array (0,0), array (0,1), array (0,2))),
            array (array (array (1,0), array (1,1), array (1,2))),
            array (array (array (2,0), array (2,1), array (2,2))),
        );
    }
    /**
     * @dataProvider horizontalRowProvider
     */
    public function testGridHasThreeSymbolsInARow($data)
    {
        $this->_setDataOnGrid($data);
        $this->assertTrue($this->_grid->inRow(self::TEST_SYMBOL));
    }
    public function VerticalRowProvider()
    {
        return array (
            array (array (array (0,0), array (1,0), array (2,0))),
            array (array (array (0,1), array (1,1), array (2,1))),
            array (array (array (0,2), array (1,2), array (2,2))),
        );
    }
    /**
     * @dataProvider VerticalRowProvider
     */
    public function testGridHasThreeSymbolsInAColumn($data)
    {
        $this->_setDataOnGrid($data);
        $this->assertTrue($this->_grid->inColumn(self::TEST_SYMBOL));
    }
    public function DiagonalRowProvider()
    {
        return array (
            array (array (array (0,0), array (1,1), array (2,2))),
            array (array (array (0,2), array (1,1), array (2,0))),
        );
    }
    /**
     * @dataProvider DiagonalRowProvider
     */
    public function testGridHasThreeSymbolsInADiagonal($data)
    {
        $this->_setDataOnGrid($data);
        $this->assertTrue($this->_grid->inDiagonal(self::TEST_SYMBOL));
    }
}