<?php

namespace HcsOmot\Geometry\ShapesBundle\Entity;

interface ShapeInterface
{
    public function getArea(): float;

    public function getPerimeter(): float;
}
