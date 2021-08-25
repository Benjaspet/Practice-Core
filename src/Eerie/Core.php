<?php

declare(strict_types = 1);

namespace Eerie;

use Eerie\managers\Manager;
use Eerie\managers\types\RetrieverManager;
use Eerie\tasks\PingTask;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class Core extends PluginBase {

    public $instance;
    public $manager;
    public $config;

    public function onEnable(): void {
        $this->instance = $this;
        $this->initConfigurationFiles();
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

    public function initConfigurationFiles(): void {
        $this->config = new Config($this->getDataFolder() . "config.yml", Config::YAML);
    }

    public function getManager(): RetrieverManager {
        return $this->manager;
    }

}