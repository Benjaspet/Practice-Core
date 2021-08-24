<?php

namespace Eerie\managers\types;

use Eerie\Core;
use Eerie\managers\Manager;
use Eerie\utils\ScoreboardPacketUtil;

class RetrieverManager extends Manager {

    private $core;

    public function __construct(Core $core) {
        parent::__construct($core);
        $this->core = $core;
    }

    public function getScoreboardPacketUtil(): ScoreboardPacketUtil {
        return $this->retriever;
    }

}
