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

                                {{ $order->amount }} {{ $order->currency_id }}
    
                            </div>
                            
                        </div>

                    </x-list.list-group-item>


                    <x-list.list-group-item>

                        <div class="row">

                            <div class="col-4"> 

                                <div class="text-muted">

                                    {{ __('Статус Заказа') }} 

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

                <x-card-body>

                    <x-form action="" method="POST">

                        <x-button type="submit" >

                            {{ __('Перейти к оплате') }}
    
                        </x-button>

                    </x-form>

                </x-card-body>

            </x-card>

        </x-container>

    </section>

@endsection