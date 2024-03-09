<?php

namespace App\Services\Payments\App\Actions;

use App\Services\Payments\Database\Enums\PaymentStatusEnum;
use App\Services\Payments\Interface\Payable;
use App\Services\Payments\Database\Models\Payment;
use Illuminate\Contracts\Database\Eloquent\Builder;

class GetPaymentsAction{

    private string|null $uuid = null;

    private Payable|null $payable = null;

    private PaymentStatusEnum|null $status = null;



    public function payable(Payable $payable): static
    {
        $this->payable = $payable;

        return $this;
    }

    public function uuid(string $uuid) :static
    {
        $this->uuid = $uuid;
        return $this;
    }

    public function status(PaymentStatusEnum $status) :static
    {
        $this->status = $status;
        return $this;
    }
    
    public function query(): Builder
    {
        $query = Payment::query();

        if( !is_null($this->uuid) )
        {
            $query->where('uuid', $this->uuid);
        }

        if( !is_null($this->status) )
        {
            $query->where('status', $this->status);
        }

        return $query;
    }

    public function first(): Payment|null
    {   
        /**
         * @var Build $query
         */
        $query = $this->query();
       
        
        return $query->first();
    }

    public function findForPayable(): Payment|null
    {

         /**
         * @var Build $query
         */
        $query = $this->query();
       

        $query->where('payable_type', $this->payable->getPayableType())
            ->where('payable_id', $this->payable->id);
            
        return $query->first();

    }


}



