<?php

namespace Eerie\tasks;

use Eerie\Core;
use pocketmine\scheduler\Task;

class PingTask extends Task {

    private $core;

    public function __construct(Core $core) {
        $this->core = $core;
    }

    public function onRun(int $currentTick): void {
        foreach ($this->core->getServer()->getOnlinePlayers() as $player) {
            # TODO: handle scoreboard packets
            # $player->setHealth(20);
        }
    }

}
