<?php

namespace Tests\HcsOmotGeometryShapesBundle\Entity;

use HcsOmot\Geometry\ShapesBundle\Entity\Triangle;
use InvalidArgumentException;

class TriangleTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider providePossibleValuesToCreateATriangle
     */
    public function testCanAValidTriangleBeInstatiated(int $sideA, int $sideB, int $sideC, bool $isTriangleValid)
    {
        if (false === $isTriangleValid){
            $this->expectException(InvalidArgumentException::class);
        }

        $triangle = new Triangle($sideA, $sideB, $sideC);
    }

    public function providePossibleValuesToCreateATriangle()
    {
        return [
            [1, 1, 1, true],
        ];
    }
}
