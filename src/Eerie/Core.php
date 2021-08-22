<?php

declare(strict_types = 1);

namespace Eerie;

use pocketmine\plugin\PluginBase;

class Core extends PluginBase {

    private $instance;

    public function onEnable(): void {
        $this->instance = $this;
    }

}