@extends('templates.main')

@section('main.content')

    <section>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    <x-card>
                        <x-card-body>

                            <div class="card-title">
                                <h5>
                                    {{ __('Тестовый Платеж') }}
                                </h5>
                            </div>

                            <p>
                                Вы можете подтвердить или отменить оплату в целях тестирования.
                            </p>

                            <div class="row">

                                <div class="col-6">

                                    <x-form action="{{ route('payments.complete', $payment->uuid) }}" method="POST">

                                        <x-button color="success" class="w-100">
                                            {{ __('Подтвердить') }}
                                        </x-button>


                                    </x-form>

                                </div>

                                <div class="col-6">

                                    <x-form action="{{ route('payments.cancel', $payment->uuid) }}" method="POST">

                                        <x-button color="danger" class="w-100">
                                            {{ __('Отменить') }}
                                        </x-button>
                                        
                                    </x-form>

                                </div>

                            </div>


                           

                        </x-card-body>
                    </x-card>
                </div>
            </div>
        </div>


    </section>

    
@endsection

