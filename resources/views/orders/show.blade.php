@extends('templates.main')

@section('main.content')

    <section>

        <div class="container">

            <h4 class="mb-3">
                {{ __('Мои Заказы') }}
            </h4>

            <div class="card">

                <div class="card-body">

                    <h5 class="card-title-mb-0">

                        Детали Заказа

                    </h5>

                </div>

          

                <ul class="list-group list-group-flush">
                    
                    <li class="list-group-item">

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

                    </li>

                    <li class="list-group-item">

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

                    </li>


                    <li class="list-group-item">

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

                    </li>

                </ul>

                <div class="card-body">


                    <form action="" method="POST">
                        @csrf

                        <button type='submit' class="btn btn-primary">

                            {{ __('Перейти к оплате') }}
    
                        </button>

                    </form>
                    

                </div>

            </div>

        </div>

    </section>

@endsection