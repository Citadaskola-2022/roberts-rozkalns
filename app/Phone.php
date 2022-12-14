<?php

declare(strict_types=1);

namespace App;

class Phone {
    private ?float $height;
    private ?float $width;

    private array $appList;

    public function __construct(
      private int $version,
      private string $manufacturer,
      ?float $height = null,
      ?float $width = null,
    ) {
        $this->height = $height;
        $this->width = $width;

        $this->installApp('Settings');
        $this->installApp('Clock');
    }

    public function installApp(string $app): void
    {
        $this->appList[$app] = true;
    }

    public function uninstallApp(string $app): void
    {
        $this->appList[$app] = false;
    }

    public function getInstalledApps(): array
    {
        return array_keys(array_filter($this->appList, fn ($isInstalled) => !!$isInstalled));

//        $list = [];
//        foreach($this->appList as $app => $isInstalled) {
//            if ($isInstalled) {
//                $list[] = $app;
//            }
//        }
//        return $list;
    }

    public function isApplicationInstalled(string $app): bool
    {
        return isset($this->appList[$app]);
    }

    public function getSize(): ?string
    {
        if (!$this->height && !$this->width) {
            return null;
        }
        return 'H: ' . $this->height . ', W: ' . $this->width;
    }
}

