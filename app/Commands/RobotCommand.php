<?php
namespace App\Commands;

use App\Robot;

interface RobotCommand {
    public function execute(Robot $robot): void;
}
?>