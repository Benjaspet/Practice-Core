<?php

namespace Eerie\managers;

use Eerie\Core;

class Manager {

    private $core;

    public function __construct(Core $core) {
        $this->core = $core;
    }

}