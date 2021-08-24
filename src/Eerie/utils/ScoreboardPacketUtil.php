<?php

namespace Eerie\utils;

use pocketmine\network\mcpe\protocol\SetDisplayObjectivePacket;
use pocketmine\Player;

class ScoreboardPacketUtil {

    public function setScoreboardTitle(Player $player, string $title): void {
        $packet = new SetDisplayObjectivePacket();
        $packet->displaySlot = "sidebar";
        $packet->objectiveName = "objective";
        $packet->displayName = $title;
        $packet->criteriaName = "dummy";
        $packet->sortOrder = 0;
        $player->sendDataPacket($packet);
    }

}
