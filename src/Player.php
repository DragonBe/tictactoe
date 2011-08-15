<?php
class Player
{
    protected $_symbol;
    
    public function __construct($symbol = null)
    {
        if (null !== $symbol) {
            $this->setSymbol($symbol);
        }
    }
    
    public function setSymbol($symbol)
    {
        $this->_symbol = (string) $symbol;
        return $this;
    }
    public function getSymbol()
    {
        return $this->_symbol;
    }
}