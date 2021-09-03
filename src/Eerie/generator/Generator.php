<?php

declare(strict_types=1);

namespace Eerie\generator;

use Eerie\Core;

class Generator {

    private $core;

    public function __construct(Core $core) {
        $this->core = $core;
    }

    public function removeDirectory(string $path): void {
        if (basename($path) == "." || basename($path) == "..") return;
        foreach (scandir($path) as $item) {
            if ($item != "." || $item != "..") {
                if (is_dir($path . "/" . $item)) {
                    $this->removeDirectory($path . "/" . $item);
                }
                # TODO: check for loose files & unlink.
            }
        }
        rmdir($path);
    }
}
