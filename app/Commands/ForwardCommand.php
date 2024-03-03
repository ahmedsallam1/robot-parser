<?php
namespace App\Commands;

use App\Robot;
use App\Commands\RobotCommand;

class ForwardCommand implements RobotCommand {
    public function execute(Robot $robot): void {
        $robot->forward();
    }
}
?>
