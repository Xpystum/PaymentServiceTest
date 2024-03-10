<?php

namespace App\Services\Currencies\Database\Source\Interface;

use App\Services\Currencies\Database\Source\Enums\SourceEnum;
use Illuminate\Support\Collection;

interface Source
{
    public function getPrices(): Collection;
    public function enum(): SourceEnum;
    
}
