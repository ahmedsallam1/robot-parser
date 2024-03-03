# Robot Controller Project

## Description
The Robot Controller Project is a PHP application designed to control a robot's movements based on user instructions. The project includes a RobotController class that executes instructions provided to a robot and generates a file containing the final position of the robot.

## Project Structure
The project structure is organized as follows:

```
robot-parser/
├── app/
│   ├── RobotController.php
│   ├── Robot.php
│   ├── Commands/
│   │   ├── ForwardCommand.php
│   │   ├── BackwardCommand.php
│   │   ├── RightCommand.php
│   │   ├── LeftCommand.php
│   │   └── RobotCommand.php
│   └── Services/
│       ├── RobotService.php
│       └── FileGeneratorService.php
├── tests/
│   ├── RobotControllerTest.php
│   └── Services/
│       └── RobotServiceTest.php
├── Dockerfile
├── composer.json
├── composer.lock
└── README.md
```

## Requirements
Each instruction character makes the robot move one step in certain direction:
```
F => forward y + 1 

B => forward y - 1 

R => forward x + 1 

L => forward x - 1 
```

## Assumptions
- Robot initial position is x=0, y=0
- In case of empty instructions the robot should be at initial position.

## Installation
To install the project locally, follow these steps:

1.Clone the repository:

```
git clone git@github.com:ahmedsallam1/robot-parser.git
cd robot-parser
```
2.Install dependencies:
```
docker build -t robot-parser .
```
3.Running Tests with Docker:
```
docker run robot-parser vendor/bin/phpunit .
```