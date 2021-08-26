<?php

namespace Eerie\managers\types;

use Eerie\Core;
use Eerie\managers\Manager;
use Eerie\tasks\PingTask;

class TaskManager extends Manager {

    private $core;

    public function __construct(Core $core) {
        parent::__construct($core);
        $this->core = $core;
        $this->initTasks();
    }

    private function initTasks(): void {
        $map = $this->core->getScheduler();
        $map->scheduleRepeatingTask(new PingTask($this->core), 20);
    }

}