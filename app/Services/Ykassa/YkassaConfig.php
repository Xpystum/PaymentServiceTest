<?php

namespace App\Services\Ykassa;

class YkassaConfig
{

    public function __construct(

        public string $key,

        public string $shopId,

    ) { }

}
