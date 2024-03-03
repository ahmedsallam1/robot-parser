<?php
namespace App\Commands;

use App\Robot;
use App\Commands\RobotCommand;

class BackwardCommand implements RobotCommand {
    public function execute(Robot $robot): void {
        $robot->backward();
    }
}
?>
