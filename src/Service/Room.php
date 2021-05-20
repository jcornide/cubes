<?php

namespace App\Service;

use App\Entity\CubeInterface;

final class Room
{
    /** @var CubeInterface */
    private $cubeA;

    /* @var CubeInterface */
    private $cubeB;

    public function __construct(CubeInterface $cubeA, CubeInterface $cubeB)
    {
        $this->cubeA = $cubeA;
        $this->cubeB = $cubeB;
    }

    public function areCubesColliding(): bool
    {
        return
            (
                abs($this->cubeA->getX() - $this->cubeB->getX()) <
                $this->cubeA->getSize()/2 + $this->cubeB->getSize()/2
            )
            &&
            (
                abs($this->cubeA->getY() - $this->cubeB->getY()) <
                $this->cubeA->getSize()/2 + $this->cubeB->getSize()/2
            )
            &&
            (
                abs($this->cubeA->getZ() - $this->cubeB->getZ()) <
                $this->cubeA->getSize()/2 + $this->cubeB->getSize()/2
            );
    }

    public function getIntersectedVolume(): ?float
    {
        if (!$this->areCubesColliding()) {
            return null;
        }

        $xIntersection = ($this->cubeA->getX() < $this->cubeB->getX()) ?
            ($this->cubeA->getX() + $this->cubeA->getSize()/2) -
            ($this->cubeB->getX() - $this->cubeB->getSize()/2)
            :
            ($this->cubeB->getX() + $this->cubeB->getSize()/2) -
            ($this->cubeA->getX() - $this->cubeA->getSize()/2);

        $yIntersection = ($this->cubeA->getY() < $this->cubeB->getY()) ?
            ($this->cubeA->getY() + $this->cubeA->getSize()/2) -
            ($this->cubeB->getY() - $this->cubeB->getSize()/2)
            :
            ($this->cubeB->getY() + $this->cubeB->getSize()/2) -
            ($this->cubeA->getY() - $this->cubeA->getSize()/2);

        $zIntersection = ($this->cubeA->getZ() < $this->cubeB->getZ()) ?
            ($this->cubeA->getZ() + $this->cubeA->getSize()/2) -
            ($this->cubeB->getZ() - $this->cubeB->getSize()/2)
            :
            ($this->cubeB->getZ() + $this->cubeB->getSize()/2) -
            ($this->cubeA->getZ() - $this->cubeA->getSize()/2);

        return $xIntersection * $yIntersection * $zIntersection;
    }
}
