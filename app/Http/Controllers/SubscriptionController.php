<?php

namespace App\Http\Controllers;

use App\Services\Payments\PaymentService;
use App\Services\Subscriptions\Database\Enums\SubscriptionStatusEnum;
use App\Services\Subscriptions\Database\Models\Subscription;
use App\Services\Subscriptions\SubscriptionService;
use App\Support\Values\AmountValue;
use Illuminate\Support\Str;

class SubscriptionController extends Controller
{
    public function index(SubscriptionService $subscriptionService)
    {
        // $subscriptions = Subscription::query()
        //     ->latest('id')
        //     ->get();

        $subscriptions = $subscriptionService
            ->getSubscription()
            ->get();

        
        return view('subscriptions.index', compact('subscriptions'));
    }

    public function create()
    {
        return view('subscriptions.create');
    }

    public function store(PaymentService $paymentService)
    {
  
        //заглушка на выбор подписки
        /**
         * @var Subscription
         */
        $subscriptions = Subscription::query()
            ->create([
                'uuid' => (string) Str::uuid(),
                'currency_id' => 'RUB', 
                'price' => (new AmountValue(rand(100, 1000))), 
                'status' => SubscriptionStatusEnum::pending, 
            ]);
            
        $payment = $paymentService->createPayment()
            ->payable($subscriptions)
            ->run();

        return redirect()->route('payments.checkout', $payment->uuid);
    }

    public function show(Subscription $subscription)
    {   
        return view('subscriptions.show', compact('subscription'));
    }

    public function payment(

        Subscription $subscription,
        PaymentService $paymentSerivce

    ) {

        abort_unless($subscription->status->isPending(), 404);

        $subscription = $paymentSerivce
            ->createPayment()
            ->payable($subscription)
            ->run();

        return redirect()->route('payments.checkout', $subscription->uuid);
    }
}
