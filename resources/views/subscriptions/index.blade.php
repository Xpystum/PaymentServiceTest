@extends('templates.main')

@section('main.content')

    <section>

        <x-container>

            <div class="d-flex justify-content-between mb-3">

                <h4 class="mb-0">
                    {{ __('Мои Подписки') }}
                </h4>

                <div>

                    <x-button-ref class="btn-sm" href="{{ route('subscriptions.create') }}">
                        {{ __('Подписаться') }}
                    </x-button-ref>

                </div>


            </div>

         

            @if($subscriptions->isEmpty())

                {{ __('Нет ни одной записи') }}

            @else

                <div class="table-responsive">

                    <table class="table">

                        <tr>

                            <th>
                                {{ __('Номер Подписки') }}
                            </th>

                            <th>
                                {{ __('Сумма') }}
                            </th>


                            <th>
                                {{ __('Статус') }}
                            </th>

                            <th>
                                
                            </th>

                        </tr>

                        @foreach ($subscriptions as $subscription)
                            
                            <tr>

                                <td>
                                    {{ $subscription->uuid }}
                                </td>

                                <td>

                                    {{ money($subscription->price, $subscription->currency_id) }} 
                                   
                                </td>

                                <td>

                                    <div class="text-{{$subscription->status->color()}}">

                                        {{ $subscription->status->name() }}

                                    </div>
                                   
                                </td>

                                <td>
                                    
                                    <a href="{{ route('subscriptions.show', $subscription->uuid) }}">
                                    
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                        </svg>

                                    </a>

                                </td>

                            </tr>

                        @endforeach

                    </table>

                </div>

            @endif


        </x-container>

    </section>

@endsection