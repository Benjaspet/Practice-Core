<?php

declare(strict_types = 1);

namespace Eerie;

use Eerie\listeners\PlayerListener;
use Eerie\managers\Manager;
use Eerie\managers\types\RetrieverManager;
use Eerie\tasks\PingTask;
use Eerie\utils\anticheat\ClickUtil;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class Core extends PluginBase {

    public $instance;
    public $manager;
    public $config;
    public $clickUtil;

    public function onEnable(): void {
        $this->instance = $this;
        $this->initConfigurationFiles();
        $this->initManagers();
        $this->initTasks();
        $this->initListeners();
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

    protected function initListeners(): void {
        $map = $this->getServer()->getPluginManager();
        $map->registerEvents(new PlayerListener($this), $this);
    }

    protected function initUtilities(): void {
        $this->clickUtil = new ClickUtil($this->core);
    }

    public function getManager(): RetrieverManager {
        return $this->manager;
    }

}