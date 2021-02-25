@isset
    @forelse($foo as $fooItem)
        {{ $fooItem['abc'] }}
    @empty
        Não existe
    @endforelse
    
@endisset


<!-- @dd($foo) -->