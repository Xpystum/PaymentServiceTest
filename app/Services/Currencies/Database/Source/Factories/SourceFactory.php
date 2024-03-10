<?php

namespace App\Services\Currencies\Database\Source\Factories;

use App\Services\Currencies\Database\Source\CbrfSource;
use App\Services\Currencies\Database\Source\Enums\SourceEnum;
use App\Services\Currencies\Database\Source\Interface\Source;
use App\Services\Currencies\Database\Source\ManualSource;

class SourceFactory
{

    public static function make(SourceEnum $source): Source
    {

        return match ($source){

            SourceEnum::manual => app(ManualSource::class),
            SourceEnum::cbrf => app(CbrfSource::class),

        };

    }
}
