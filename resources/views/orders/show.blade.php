@extends('templates.main')

@section('main.content')

    <section>

        <x-container>

            <h4 class="mb-3">
                {{ __('Мои Заказы') }}
            </h4>

            <x-card class="card">

                <x-card-body>

                    <h5 class="card-title-mb-0">

                        {{__('Детали Заказа')}}

                    </h5>

                </x-card-body>

          

                <x-list.list-group class="list-group-flush">
                    
                    <x-list.list-group-item>

                        <div class="row">

                            <div class="col-4"> 

                                <div class="text-muted">
                                    {{ __('ID Заказа') }} 
                                </div>
                            
                            </div>

                            <div class="col-8">

                                {{ $order->uuid }}

                            </div>

                        </div>

                    </x-list.list-group-item>

                    <x-list.list-group-item >

                        <div class="row">

                            <div class="col-4"> 

                                <div class="text-muted">

                                    {{ __('Сумма Заказа') }} 

                                </div>

                            </div>

                            <div class="col-8">

                                {{ money(convert($order->amount) , currency()) }} 
    
                            </div>
                            
                        </div>

                    </x-list.list-group-item>


                    <x-list.list-group-item>

                        <div class="row">

                            <div class="col-4"> 

                                <div class="text-muted">

                                    {{ __('Статус Оплаты Заказа') }} 

                                </div>

                            </div>

                            <div class="col-8">

                                <div class="text-{{ $order->status->color() }}">

                                    {{ $order->status->name() }} 

                                </div>
                            
                            </div>
                            
                        </div>

                    </x-list.list-group-item>

                </x-list.list-group>

                @if($order->status->isPending())
                    <x-card-body>

                        <x-form action="{{ route('orders.payment', $order->uuid) }}" method="POST">

                            <x-button  type="submit" >

                                {{ __('Перейти к оплате') }}
        
                            </x-button>

                        </x-form>

                    </x-card-body>
                @endif

                @if($order->status->isWaiting())
                
                    <x-card-body>

                        <x-form action="{{ route('ykassa.cancel', $order->uuid) }}" method="POST">

                            <x-button type="submit" >

                                {{ __('Отменить Платеж') }}
        
                            </x-button>

                        </x-form>

                    </x-card-body>
                @endif

            </x-card>

        </x-container>

    </section>

@endsection