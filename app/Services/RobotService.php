<?php
namespace App\Services;

use App\Robot;
use App\Commands\ForwardCommand;
use App\Commands\BackwardCommand;
use App\Commands\RightCommand;
use App\Commands\LeftCommand;

class RobotService {
	const COMMAND_MAP = [
		'F' => ForwardCommand::class,
		'B' => BackwardCommand::class,
		'R' => RightCommand::class,
		'L' => LeftCommand::class
	];

    private Robot $robot;

    /**
     * __construct
     *
     * @param Robot $robot
     */
    public function __construct(Robot $robot) {
        $this->robot = $robot;
    }

    /**
     * Execute Instructions
     *
     * @param string $instructions
     * @return string
     */
    public function executeInstructions(string $instructions): string {
        if (!$this->validateInstructions($instructions)) {
            throw new \InvalidArgumentException("Invalid instruction: $instructions");
        }

        foreach (mb_str_split($instructions) as $instruction) {
            $commandClass = self::COMMAND_MAP[$instruction] ?? null;
            if ($commandClass) {
                $command = new $commandClass();
                $command->execute($this->robot);
            } else {
                $this->robot->reset();
                throw new \InvalidArgumentException("Invalid instruction: $instruction");
            }
        }

        return $this->robot->getPosition();
    }

    /**
     * Validate Instructions
     *
     * @param string $instructions
     * @return boolean
     */
    private function validateInstructions(string $instructions): bool {
        $validChars = array_keys(self::COMMAND_MAP);
        $invalidChars = preg_replace('/[' . implode('', $validChars) . ']/', '', $instructions);
        return empty($invalidChars);
    }
}
