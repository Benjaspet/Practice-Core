<?php

declare(strict_types=1);

namespace Eerie\managers\types;

use Eerie\Core;
use Eerie\generator\Generator;
use Eerie\managers\Manager;

class GeneratorManager extends Manager {

    private $gen;

    public function __construct(Core $core) {
        parent::__construct($core);
        $this->core = $core;
        $this->initGenerators();
    }

    private function initGenerators(): void {
        $this->gen = new Generator($this->core);
    }

}