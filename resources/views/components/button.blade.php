@props(['color' => 'primary', 'size' => ''])

<button {{ $attributes->merge([

    'type' => 'submit',

])->class([

    "btn btn-{$color}", ($size? "btn-{$size}" : '')
    
]) }}>

    {{ $slot }}

</button>