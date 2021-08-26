<?php

namespace Eerie\managers;

use Eerie\Core;
use Eerie\managers\types\ConfigManager;
use Eerie\managers\types\TaskManager;
use Eerie\managers\types\UtilManager;

class Manager {

    private $core;
    private $utils;
    private $tasks;
    public $config;

    public function __construct(Core $core) {
        $this->core = $core;
        $this->initManagerModules();
    }

    protected function initManagerModules(): void {
        $this->tasks = new TaskManager($this->core);
        $this->utils = new UtilManager($this->core);
    }

    public function getUtilManager(): UtilManager {
        return $this->utils;
    }

    public function getTaskManager(): TaskManager {
        return $this->tasks;
    }

    public function getConfigManager(): ConfigManager {
        return $this->config;
    }

}