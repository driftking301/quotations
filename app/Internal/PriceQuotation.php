<?php

namespace App\Internal;

class PriceQuotation
{
    /** @var PriceLineData[] */
    private readonly array $lines;

    /** @var array PriceLineCalculations[] */
    private readonly array $calculations;
    public readonly float $amountTotal;

    public function __construct(
        public readonly ProcessesSettings $processes,
        PriceLineData ...$lines
    ) {
        $this->lines = $lines;
        $this->calculations = array_map(
            fn (PriceLineData $line):PriceLineCalculations => $this->calculateLine($line),
            $this->lines
        );

        $this->amountTotal = array_sum(array_column($this->calculations, 'amountTotal'));
    }

    public function calculateLine(PriceLineData $line): PriceLineCalculations
    {
        if ($line->partNumberPrice->isPounds) {
            $amountMaterial = $line->width * $line->length * $line->quantity * $line->partNumberPrice->pricePerSqInch;
        } else {
            $amountMaterial = $line->quantity * $line->partNumberPrice->pricePerLb;
        }

        $perimeter = 2 * $line->width + 2 * $line->length;
        $perimeters = $perimeter * $line->quantity;
        $laserLength = $perimeters + $line->holes->totalLengthHoles;

        return new PriceLineCalculations(
            $perimeter,
            $perimeters,
            $laserLength,
            $amountMaterial,
            $this->processes->getLaser() * $laserLength,
            $this->processes->getWeld() * $line->weld,
            $this->processes->getPress() * $line->press,
            $this->processes->getSaw() * $line->saw,
            $this->processes->getDrilling() * $line->drilling,
            $this->processes->getCleaning() * $line->cleaning,
            $this->processes->getPainting() * $line->painting,
            $this->processes->getPipeThread() * $line->pipeThread,
            $this->processes->getPipeEngage() * $line->pipeEngage,
            $this->processes->getPressSetUp() * $line->pressSetUp,
        );
    }
}
