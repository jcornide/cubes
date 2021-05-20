<?php
namespace App\Entity;

interface CubeInterface
{
    public function __construct(int $x, int $y, int $z, int $size);

    public function getX(): int;

    public function getY(): int;

    public function getZ(): int;

    public function getSize(): int;
}
