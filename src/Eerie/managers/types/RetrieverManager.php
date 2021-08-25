<?php

namespace Eerie\managers\types;

use Eerie\Core;
use Eerie\managers\Manager;
use Eerie\utils\anticheat\ClickUtil;
use Eerie\utils\ScoreboardPacketUtil;
use pocketmine\utils\Config;

class RetrieverManager extends Manager {

    private $core;

    public function __construct(Core $core) {
        parent::__construct($core);
        $this->core = $core;
    }

    public function getScoreboardPacketUtil(): ScoreboardPacketUtil {
        return $this->retriever;
    }

    public function getCoreConfig(): Config {
        return $this->core->config;
    }

    public function getClickUtil(): ClickUtil {
        return $this->core->clickUtil;
    }

}
