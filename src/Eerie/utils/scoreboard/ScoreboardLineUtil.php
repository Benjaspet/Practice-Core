<?php

declare(strict_types=1);

namespace Eerie\utils\scoreboard;

use Eerie\Core;
use Eerie\utils\ScoreboardPacketUtil;
use pocketmine\Player;

class ScoreboardLineUtil {

    private $core;

    public function __construct(Core $core) {
        $this->core = $core;
    }

    public function updatePingLine(Player $player): void {
        ScoreboardPacketUtil::removeScoreboardLine($player, 3);
        ScoreboardPacketUtil::createScoreboardLine($player, 3, "§cOnline: §f" . count($this->core->getServer()->getOnlinePlayers()));
    }


}
