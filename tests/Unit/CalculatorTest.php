<?php

use App\Models\Calculator;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    protected Calculator $calculator;
    protected function setUp(): void
    {
        $this->calculator = new Calculator();
    }
    public function testAdditionOfTwoNumbersReturnsCorrectSum(): void
    {
        $expected = 5;
        $result = $this->calculator->add(2, 3);
        $this->assertEquals($expected, $result);
    }

    public function testSubtractionHandlesNegativeResults(): void
    {
        $result = $this->calculator->subtract(5, 10);
        $this->assertEquals(-5, $result);
    }
}