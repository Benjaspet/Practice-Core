<?php

namespace Eerie\utils;

use pocketmine\network\mcpe\protocol\RemoveObjectivePacket;
use pocketmine\network\mcpe\protocol\SetDisplayObjectivePacket;
use pocketmine\network\mcpe\protocol\SetScorePacket;
use pocketmine\network\mcpe\protocol\types\ScorePacketEntry;
use pocketmine\Player;

class ScoreboardPacketUtil {

    /*
     * @param Player $player - The player whose scoreboard title will be set.
     * @param string $title - The scoreboard title display name.
     * @return void
     */

    public function setScoreboardTitle(Player $player, string $title): void {
        $packet = new SetDisplayObjectivePacket();
        $packet->displaySlot = "sidebar";
        $packet->objectiveName = "objective";
        $packet->displayName = $title;
        $packet->criteriaName = "dummy";
        $packet->sortOrder = 0;
        $player->sendDataPacket($packet);
    }

    /*
     * @param Player $player - The player whose scoreboard will be removed.
     * @return void
     */

    public function removeScoreboard(Player $player): void {
        $packet = new RemoveObjectivePacket();
        $packet->objectiveName = "objective";
        $player->sendDataPacket($packet);
    }

    /*
     * @param Player $player - The player whose scoreboard line will be updated.
     * @param int $line - The line number.
     * @param string $content - The line content.
     * @return void
     */

    public function createScoreboardLine(Player $player, int $line, string $content): void {
        $packetline = new ScorePacketEntry();
        $packetline->objectiveName = "objective";
        $packetline->type = ScorePacketEntry::TYPE_FAKE_PLAYER;
        $packetline->customName = " ". $content . "   ";
        $packetline->score = $line;
        $packetline->scoreboardId = $line;
        $packet = new SetScorePacket();
        $packet->type = SetScorePacket::TYPE_CHANGE;
        $packet->entries[] = $packetline;
        $player->sendDataPacket($packet);
    }

    /*
     * @param Player $player - The player whose scoreboard line will be removed.
     * @param int $line = The line number.
     * @return void
     */

    public function removeScoreboardLine(Player $player, int $line): void {
        $entry = new ScorePacketEntry();
        $entry->objectiveName = "objective";
        $entry->score = $line;
        $entry->scoreboardId = $line;
        $packet = new SetScorePacket();
        $packet->type = SetScorePacket::TYPE_REMOVE;
        $packet->entries[] = $entry;
        $player->sendDataPacket($packet);
    }

}
