<?php

declare(strict_types = 1);

namespace Eerie;

use Eerie\listeners\PlayerListener;
use Eerie\managers\Manager;
use pocketmine\plugin\PluginBase;

class Core extends PluginBase {

    public $instance;
    public $manager;

    public function onEnable(): void {
        $this->instance = $this;
        $this->initManager();
        $this->initListeners();
    }

    protected function initManager(): void {
        $this->manager = new Manager($this);
    }

    protected function initListeners(): void {
        $map = $this->getServer()->getPluginManager();
        $map->registerEvents(new PlayerListener($this), $this);
    }

    public function getManager(): Manager {
        return $this->manager;
    }

}