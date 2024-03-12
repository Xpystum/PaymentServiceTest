@php($currencies = App\Services\Currencies\Database\Models\Currency::getCached())

<div class="dropdown">

    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
      {{ currency() }}
    </button>

    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
      <li>
        @foreach ($currencies as $currency)
            <li>
                <a href="{{ route('currency', $currency->id) }}" class="dropdown-item">
                    {{ $currency->id }}
                </a>
            </li>
        @endforeach
      </li>
    </ul>
</div>