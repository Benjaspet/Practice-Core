<?php

namespace Eerie\managers\types;

use Eerie\Core;
use Eerie\managers\Manager;
use pocketmine\utils\Config;

class ConfigManager extends Manager {

    private $core;
    public $config;

    public function __construct(Core $core) {
        parent::__construct($core);
        $this->core = $core;
        $this->initConfigurationFiles();
    }

    private function initConfigurationFiles(): void {
        $this->config = new Config($this->core->getDataFolder() . "config.yml", Config::YAML);
    }

    public function getCoreConfig(): Config {
        return $this->config;
    }

}
