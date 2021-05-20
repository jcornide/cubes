<?php

namespace App\Entity;

final class Cube implements CubeInterface
{
    /** @var integer */
    private $x;

    /** @var integer */
    private $y;

    /** @var integer */
    private $z;

    /** @var integer */
    private $size;

    public function __construct(int $x, int $y, int $z, int $size)
    {
        $this->x = $x;
        $this->y = $y;
        $this->z = $z;
        $this->size = $size;
    }

    public function getX(): int
    {
        return $this->x;
    }

    public function getY(): int
    {
        return $this->y;
    }

    public function getZ(): int
    {
        return $this->z;
    }

    public function getSize(): int
    {
        return $this->size;
    }


}
