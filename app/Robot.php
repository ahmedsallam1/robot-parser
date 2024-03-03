<?php
namespace App;

class Robot {
    private $x = 0;
    private $y = 0;

    public function forward(): void {
		$this->y += 1;
    }

    public function backward(): void {
        $this->y -= 1;
    }

    public function right(): void {
        $this->x += 1;
    }

    public function left(): void {
        $this->x -= 1;
    }

    public function reset(): void {
        $this->x = 0;
        $this->y = 0;
    }

    public function getPosition(): string {
        return "x={$this->x} y={$this->y}";
    }
}
