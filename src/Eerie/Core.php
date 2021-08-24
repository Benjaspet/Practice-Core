<?php

declare(strict_types = 1);

namespace Eerie;

use Eerie\managers\Manager;
use Eerie\tasks\PingTask;
use pocketmine\plugin\PluginBase;

class Core extends PluginBase {

    public $instance;
    public $manager;

    public function onEnable(): void {
        $this->instance = $this;
        $this->initManagers();
        $this->initTasks();
    }

    protected function initManagers(): void {
        $this->manager = new Manager($this);
    }

    protected function initTasks(): void {
        $map = $this->getScheduler();
        $map->scheduleRepeatingTask(new PingTask($this), 20);
    }

}