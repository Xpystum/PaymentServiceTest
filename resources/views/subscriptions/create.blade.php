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

                        {{__('Создание подписки')}}

                    </h5>

                </x-card-body>


                    <x-card-body>

                        <x-form action="{{ route('subscriptions.store') }}" method="POST">

                            <x-button  type="submit" >

                                {{ __('Оформить подписку') }}
        
                            </x-button>

                        </x-form>

                    </x-card-body>

            </x-card>

        </x-container>

    </section>

@endsection