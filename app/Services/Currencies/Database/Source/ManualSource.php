<?php

namespace App\Services\Currencies\Database\Source;

use App\Services\Currencies\Database\Source\Enums\SourceEnum;
use App\Services\Currencies\Database\Source\Interface\Source;
use Illuminate\Support\Collection;

class ManualSource implements Source
{
    public function getPrices(): Collection
    {
        return new Collection([]);
    }

    public function enum(): SourceEnum
    {
        return SourceEnum::manual;
    }
}
