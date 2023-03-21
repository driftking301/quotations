<?php

namespace App\Internal;

class PriceLineCalculations
{
    public readonly float $amountTotal;

    public function __construct(
        public readonly int $perimeter,
        public readonly int $perimeters,
        public readonly float $laserLength,
        public readonly float $amountMaterial,
        public readonly float $amountLaser,
        public readonly float $amountWeld,
        public readonly float $amountPress,
        public readonly float $amountSaw,
        public readonly float $amountDrilling,
        public readonly float $amountCleaning,
        public readonly float $amountPainting,
        public readonly float $amountPipeThread,
        public readonly float $amountPipeEngage,
        public readonly float $amountPressSetUp,
    ) {
        $this->amountTotal = array_sum([
            $this->amountMaterial,
            $this->amountLaser,
            $this->amountWeld,
            $this->amountPress,
            $this->amountSaw,
            $this->amountDrilling,
            $this->amountCleaning,
            $this->amountPainting,
            $this->amountPipeThread,
            $this->amountPipeEngage,
            $this->amountPressSetUp,
        ]);
    }

    public static function empty(): self
    {
        return new self(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
    }
}
