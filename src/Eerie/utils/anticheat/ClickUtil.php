<?php

declare(strict_types=1);

namespace Eerie\utils\anticheat;

use Eerie\Core;
use pocketmine\Player;

class ClickUtil {

    private $core;
    private $clicks = [];

    public function __construct(Core $core) {
        $this->core = $core;
    }

    public function isInClicksArray(Player $player): bool {
        $name = $player->getName();
        return ($name !== null) and isset($this->clicks[$name]);
    }

    public function addToClicksArray(Player $player) {
        if (!$this->isInClicksArray($player)) {
            $this->clicks[$player->getName()] == [];
        }
    }

    public function removeFromClicksArray(Player $player) {
        if ($this->isInClicksArray($player)) {
            unset($this->clicks[$player->getName()]);
        }
    }

}
