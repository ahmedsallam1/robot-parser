<?php

use PHPUnit\Framework\TestCase;
use App\Services\RobotService;
use App\Robot;
use InvalidArgumentException;

class RobotServiceTest extends TestCase
{
    public function testForwardMovement()
    {
        $robot = new Robot();
        $service = new RobotService($robot);
        $finalPosition = $service->executeInstructions('FF');
        $this->assertEquals('x=0 y=2', $finalPosition);
    }

    public function testBackwardMovement()
    {
        $robot = new Robot();
        $service = new RobotService($robot);
        $finalPosition = $service->executeInstructions('BB');
        $this->assertEquals('x=0 y=-2', $finalPosition);
    }

    public function testRightTurn()
    {
        $robot = new Robot();
        $service = new RobotService($robot);
        $finalPosition = $service->executeInstructions('RR');
        $this->assertEquals('x=2 y=0', $finalPosition);
    }

    public function testLeftTurn()
    {
        $robot = new Robot();
        $service = new RobotService($robot);
        $finalPosition = $service->executeInstructions('LL');
        $this->assertEquals('x=-2 y=0', $finalPosition);
    }

    public function testInvalidInstruction()
    {
        $this->expectException(InvalidArgumentException::class);
        $robot = new Robot();
        $service = new RobotService($robot);
        $service->executeInstructions('FX');
    }

    public function testInvalidCombination()
    {
        $this->expectException(InvalidArgumentException::class);
        $robot = new Robot();
        $service = new RobotService($robot);
        $service->executeInstructions('FZ');
    }
}
