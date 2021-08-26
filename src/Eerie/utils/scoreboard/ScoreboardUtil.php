<?php

namespace Eerie\utils\scoreboard;

use Eerie\Core;
use pocketmine\Player;

class ScoreboardUtil {

    private $core;

    public function __construct(Core $core) {
        $this->core = $core;
    }

    public function setLobbyScoreboard(Player $player): void {
        $title = $this->core->getManager()->getConfigManager()->getCoreConfig()->get("server-name");
        $address = $this->core->getManager()->getConfigManager()->getCoreConfig()->get("address");
        $this->core->getManager()->getUtilManager()->getScoreboardPacketUtil()->setScoreboardTitle($player, " §c§l" . $title . " ");
        $this->core->getManager()->getUtilManager()->getScoreboardPacketUtil()->createScoreboardLine($player, 0, str_repeat(" ", 20));
        $this->core->getManager()->getUtilManager()->getScoreboardPacketUtil()->createScoreboardLine($player, 1, "§cOnline: §f" . count($this->core->getServer()->getOnlinePlayers()));
        $this->core->getManager()->getUtilManager()->getScoreboardPacketUtil()->createScoreboardLine($player, 2, str_repeat(" ", 5));
        $this->core->getManager()->getUtilManager()->getScoreboardPacketUtil()->createScoreboardLine($player, 3, "§cPing: §f" . $player->getPing() . "ms");
        $this->core->getManager()->getUtilManager()->getScoreboardPacketUtil()->createScoreboardLine($player, 4, "§cCombat: §f0");
        $this->core->getManager()->getUtilManager()->getScoreboardPacketUtil()->createScoreboardLine($player, 5, str_repeat(" ", 4));
        $this->core->getManager()->getUtilManager()->getScoreboardPacketUtil()->createScoreboardLine($player, 6, "§cPearl: §f0");
        $this->core->getManager()->getUtilManager()->getScoreboardPacketUtil()->createScoreboardLine($player, 7, str_repeat(" ", 3));
        $this->core->getManager()->getUtilManager()->getScoreboardPacketUtil()->createScoreboardLine($player, 8, "§c" . $address);
    }
}