<?php

namespace App\Services\Payments\App\Actions\Traits;

trait ActionHelperTrait
{
    public bool|null $active = null;

    public function active(bool $active = true): static
    {
        $this->active = $active;

        return $this;
    }
}

