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

    public function addToClicksArray(Player $player): bool {
        if (!$this->isInClicksArray($player)) {
            return $this->clicks[$player->getName()] == [];
        }
        return false;
    }

    public function removeFromClicksArray(Player $player) {
        if ($this->isInClicksArray($player)) {
            unset($this->clicks[$player->getName()]);
        }
    }

    public function addClick(Player $player) {
        array_unshift($this->clicks[$player->getName()], microtime(true));
        if (count($this->clicks[$player->getName()]) >= 100){
            array_pop($this->clicks[$player->getName()]);
        }
        $player->sendPopup("§7CPS: §c§l".$this->getCps($player));
    }

    public function getCps(Player $player, float $deltaTime=1.0, int $roundPrecision=1): float {
        if (!$this->isInClicksArray($player) or empty($this->clicks[$player->getName()])) {
            return 0.0;
        }
        $mt = microtime(true);
        return round(count(array_filter($this->clicks[$player->getName()], static function(float $t) use ($deltaTime, $mt): bool {
                return ($mt - $t) <= $deltaTime;
        })) / $deltaTime, $roundPrecision);
    }

}
