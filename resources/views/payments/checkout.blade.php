

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

                    @if($methods->isEmpty())

                        <div class="text-info">
                            {{ __('Извините, оплата временно недоступна') }}
                        </div>
                        
                    @else

                
                        @if($errors->any())
                        
                            <div class="mb-3 text-danger">
                                {{ $errors->first() }}
                            </div>

                        @endif

                        <x-form action="{{ route('payments.method', $payment->uuid) }}" method="POST">

                            <div class="row">

                                <div class="col-12 col-md-4">

                                    <div class="mb-3 mb-md-0">

                                        <select name="method_id" class="form-control">

                                            <option value="" selected>
                                                {{ __('Способ оплаты') }}
                                            </option>

                                            @foreach ($methods as $method)

                                                <option value="{{ $method->id }}">

                                                    {{ __($method->name) }}  ({{ __($method->driver_currency_id) }})

                                                </option>

                                            @endforeach

                                        </select>

                                    </div>

                                </div>

                                <div class="col12 col-md-4">

                                    <x-button type="submit" class="w-100">
                                        {{ __('Продолжить') }}
                                    </x-button>

                                </div>

                            </div>

                        </x-form>

                    @endif

                </x-card-body>

            </x-card>

        </x-container>

    </section>

@endsection

