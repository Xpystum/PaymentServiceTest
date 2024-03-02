<form {{ $attributes->merge([
    
    'action' => '',

]) }} >

    @csrf
    {{ $slot }}

</form>