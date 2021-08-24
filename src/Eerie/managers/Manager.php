<?php

namespace Eerie\managers;

use Eerie\Core;
use Eerie\managers\types\RetrieverManager;

class Manager {

    private $core;
    protected $retriever;

    public function __construct(Core $core) {
        $this->core = $core;
        $this->initManagerModules();
    }

    protected function initManagerModules(): void {
        $this->retriever = new RetrieverManager($this->core);
    }

}