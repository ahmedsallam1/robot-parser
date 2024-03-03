<?php

use PHPUnit\Framework\TestCase;
use App\Robot;
use App\RobotController;
use App\Services\RobotService;
use App\Services\FileGeneratorService;

class RobotControllerTest extends TestCase {

    public function testSuccessfulInstructions_FFRFL() {
		$fileGeneratorServiceMock = $this->createMock(FileGeneratorService::class);
        $fileGeneratorServiceMock->expects($this->once())
            ->method('generateFile')
            ->with(
                'FFRFL => x=0 y=3',
				'final_positions.txt'
            );

        $robot = new Robot();
        $service = new RobotService($robot);
        $controller = new RobotController($service, $fileGeneratorServiceMock);

        $controller->executeInstructions('FFRFL');
	}

    public function testSuccessfulInstructions_FRFRLL() {
		$fileGeneratorServiceMock = $this->createMock(FileGeneratorService::class);
        $fileGeneratorServiceMock->expects($this->once())
            ->method('generateFile')
            ->with(
                'FRFRLL => x=0 y=2',
				'final_positions.txt'
            );

        $robot = new Robot();
        $service = new RobotService($robot);
        $controller = new RobotController($service, $fileGeneratorServiceMock);

        $controller->executeInstructions('FRFRLL');
	}

	public function testSuccessEmptyInstructions() {
		$fileGeneratorServiceMock = $this->createMock(FileGeneratorService::class);
        $fileGeneratorServiceMock->expects($this->once())
            ->method('generateFile')
            ->with(
                ' => x=0 y=0',
				'final_positions.txt'
            );

        $robot = new Robot();
        $service = new RobotService($robot);
        $controller = new RobotController($service, $fileGeneratorServiceMock);

        $controller->executeInstructions('');
	}

	public function testInvalidInstructions() {
		$fileGeneratorServiceMock = $this->createMock(FileGeneratorService::class);
        $fileGeneratorServiceMock->expects($this->never())->method('generateFile');
        $robot = new Robot();
        $service = new RobotService($robot);
        $controller = new RobotController($service, $fileGeneratorServiceMock);

        $this->expectException(InvalidArgumentException::class);

        $controller->executeInstructions('FW');
	}
}
