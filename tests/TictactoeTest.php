<?php
require_once 'src/Tictactoe.php';
require_once 'PHPUnit/Framework/TestCase.php';
/**
 * Tictactoe test case.
 */
class TictactoeTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Tictactoe
     */
    private $Tictactoe;
    /**
     * Prepares the environment before running a test.
     */
    protected function setUp ()
    {
        parent::setUp();
        $this->Tictactoe = new Tictactoe(/* parameters */);
    }
    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown ()
    {
        $this->Tictactoe = null;
        parent::tearDown();
    }
    public function testUserCanDrawSymbolOnGrid()
    {
    }
}

