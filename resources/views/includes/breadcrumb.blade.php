@if(isset($breadcrumb))
    <ul class="nav col-md-4 p-2 pl-3 breadcrumb">
        @foreach($breadcrumb as $label => $url)
            
            <li class='nav-item'>
                @if($url != 'false')
                    <a href="{{ route($url) }}">
                        {{ $label }}
                    </a>

                    <i class="bi bi-chevron-right p-2"></i>

                @else
                    <span>{{ $label }}</span>
                @endif
            </li> 
            
        @endforeach
    </ul>
@endif