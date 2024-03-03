<?php
namespace App;

use App\Robot;
use App\Services\RobotService;
use App\Services\FileGeneratorService;

class RobotController {
    private RobotService $robotService;
    private FileGeneratorService $fileGeneratorService;

    /**
     * __construct
     *
     * @param RobotService $robotService
     * @param FileGeneratorService $fileGeneratorService
     */
    public function __construct(RobotService $robotService, FileGeneratorService $fileGeneratorService) {
        $this->robotService = $robotService;
        $this->fileGeneratorService = $fileGeneratorService;
    }

    /**
     * Execute Instructions
     *
     * @param string $instructions
     * @return void
     */
    public function executeInstructions(string $instructions): void {
        $finalPosititon = $this->robotService->executeInstructions($instructions);
        $this->fileGeneratorService->generateFile(sprintf("%s => %s", $instructions, $finalPosititon), 'final_positions.txt');
    }
}
?>
