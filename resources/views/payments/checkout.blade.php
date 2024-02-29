@extends('templates.main')

@section('main.content')

    <section>

        <x-container>

            <h4 class="mb-3">
                {{ __('Оплата') }}
            </h4>

            <x-card class="card">

                <x-card-body>

                    <h5 class="card-title-mb-0">

                        {{__('Детали Платежа')}}

                    </h5>

                </x-card-body>

          

                <x-list.list-group class="list-group-flush">
                    
                    <x-list.list-group-item>

                        <div class="row">

                            <div class="col-4"> 

                                <div class="text-muted">
                                    {{ __('ID Платежа') }} 
                                </div>
                            
                            </div>

                            <div class="col-8">

                                {{ $payment->uuid }}

                            </div>

                        </div>

                    </x-list.list-group-item>

                    <x-list.list-group-item >

                        <div class="row">

                            <div class="col-4"> 

                                <div class="text-muted">

                                    {{ __('Сумма Платежа') }} 

                                </div>

                            </div>

                            <div class="col-8">

                                {{ $payment->amount }} {{ $payment->currency_id }}
    
                            </div>
                            
                        </div>

                    </x-list.list-group-item>


                    <x-list.list-group-item>

                        <div class="row">

                            <div class="col-4"> 

                                <div class="text-muted">

                                    {{ __('Статус Платежа') }} 

                                </div>

                            </div>

                            <div class="col-8">

                                <div class="text-{{ $payment->status->color() }}">

                                    {{ $payment->status->name() }} 

                                </div>
                            
                            </div>
                            
                        </div>

                    </x-list.list-group-item>

                    <x-list.list-group-item>

                        <div class="row">

                            <div class="col-4"> 

                                <div class="text-muted">

                                    {{ __('Операция:') }} 

                                </div>

                            </div>

                            <div class="col-8">

                                {{ __($payment->payable->getPayableName()) }}:  {{ $payment->payable->uuid }}
                            
                            </div>
                            
                        </div>

                    </x-list.list-group-item>

                </x-list.list-group>

                <x-card-body>

                    <x-form action="" method="POST">

                        <p>

                            {{ __('Выберите способ оплаты.') }}

                        </p>

                        <x-button  type="submit" >

                            {{ __('Продолжить') }}
    
                        </x-button>

                    </x-form>

                </x-card-body>

            </x-card>

        </x-container>

    </section>

@endsection