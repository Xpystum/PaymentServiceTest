<?php

namespace App\Services\Subscriptions\App\Actions;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use App\Services\Subscriptions\Database\Models\Subscription;

class GetSubscriptionsAction
{
    private int|null $id = null;

    private function existsId(): bool
    {
        return $this->id != null ? true : false;
    }

    public function id(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    private function query(): Builder
    {
        $query = Subscription::query();

        if( !is_null($this->id) )
        {
            $query->latest('id', $this->id);
        }

        return $query;
    }


    public function first(): Subscription|null
    {

        if(!$this->existsId())
        {
            return null;
        }

        /**
         * @var Build $query
         */
        $query = $this->query();

        return $query->first();

    }

    public function get(): Collection|null
    {

        /**
        * @var Build $query
        */
        $query = $this->query();

        return $query->get();
    }
}
