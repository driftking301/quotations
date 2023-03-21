<?php

namespace App\Internal;

class Holes
{
    public readonly float $totalLengthHoles;
    /** @var Hole[] */
    private array $holes;

    public function __construct(Hole ...$holes)
    {
        $this->holes = $holes;
        $this->totalLengthHoles = array_sum(array_column($this->holes, 'totalLength'));
    }
}
