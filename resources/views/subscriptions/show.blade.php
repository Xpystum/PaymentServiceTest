@extends('templates.main')

@section('main.content')

    <section>

        <x-container>

            <h4 class="mb-3">
                {{ __('Мои Подписки') }}
            </h4>

            <x-card class="card">

                <x-card-body>

                    <h5 class="card-title-mb-0">

                        {{__('Детали Подписки')}}

                    </h5>

                </x-card-body>

          

                <x-list.list-group class="list-group-flush">
                    
                    <x-list.list-group-item>

                        <div class="row">

                            <div class="col-4"> 

                                <div class="text-muted">
                                    {{ __('ID Подписки') }} 
                                </div>
                            
                            </div>

                            <div class="col-8">

                                {{ $subscription->uuid }}

                            </div>

                        </div>

                    </x-list.list-group-item>

                    <x-list.list-group-item >

                        <div class="row">

                            <div class="col-4"> 

                                <div class="text-muted">

                                    {{ __('Сумма Подписки') }} 

                                </div>

                            </div>

                            <div class="col-8">

                                {{ $subscription->price }} {{ $subscription->currency_id }}
    
                            </div>
                            
                        </div>

                    </x-list.list-group-item>


                    <x-list.list-group-item>

                        <div class="row">

                            <div class="col-4"> 

                                <div class="text-muted">

                                    {{ __('Статус Оплаты Подписки') }} 

                                </div>

                            </div>

                            <div class="col-8">

                                <div class="text-{{ $subscription->status->color() }}">

                                    {{ $subscription->status->name() }} 

                                </div>
                            
                            </div>
                            
                        </div>

                    </x-list.list-group-item>

                </x-list.list-group>

                @if($subscription->status->isPending())
                    <x-card-body>

                        <x-form action="{{ route('subscriptions.payment', $subscription->uuid) }}" method="POST">

                            <x-button  type="submit" >

                                {{ __('Перейти к оплате') }}
        
                            </x-button>

                        </x-form>

                    </x-card-body>
                @endif

            </x-card>

        </x-container>

    </section>

@endsection