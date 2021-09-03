<?php

namespace Eerie\managers\types;

use Eerie\Core;
use Eerie\managers\Manager;
use Eerie\utils\anticheat\ClickUtil;
use Eerie\utils\scoreboard\ScoreboardLineUtil;
use Eerie\utils\scoreboard\ScoreboardUtil;
use Eerie\utils\ScoreboardPacketUtil;

class UtilManager extends Manager {

    private $clickUtil;
    private $scoreboardPacketUtil;
    private $scoreboard;
    private $scoreboardLineUtil;

    public function __construct(Core $core) {
        parent::__construct($core);
        $this->core = $core;
        $this->initUtilities();
    }

    private function initUtilities(): void {
        $this->clickUtil = new ClickUtil($this->core);
        $this->scoreboard = new ScoreboardUtil($this->core);
        $this->scoreboardPacketUtil = new ScoreboardPacketUtil();
        $this->scoreboardLineUtil = new ScoreboardLineUtil($this->core);
    }

    public function getClickUtil(): ClickUtil {
        return $this->clickUtil;
    }

    public function getScoreboardUtil(): ScoreboardUtil {
        return $this->scoreboard;
    }

    public function getScoreboardPacketUtil(): ScoreboardPacketUtil {
        return $this->scoreboardPacketUtil;
    }

    public function getScoreboardLineUtil(): ScoreboardLineUtil {
        return $this->scoreboardLineUtil;
    }

}
