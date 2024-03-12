<nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
    <div class="container">

      <a class="navbar-brand"  href="{{ route('home') }}">
        
        Магазин

      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>


      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a href="{{ route('orders') }}" class="nav-link active" aria-current="pahe">

                    {{ __('Мои Заказы') }}

                </a>
            </li>

            <li class="nav-item">
              <a href="{{ route('subscriptions') }}" class="nav-link active" aria-current="pahe">

                  {{ __('Мои Подписки') }}

              </a>
          </li>
        </ul>

        <ul class="navbar-nav me-end mb-2 mb-lg-0">  
          <x-dropdown />
        </ul>
       
        
      </div>
    </div>
  </nav>