<x-app-layout>
    <x-slot name="header">
        <div style="
            background: linear-gradient(to bottom, transparent, rgba(0, 0, 0, 1)),
                        url(https://image.tmdb.org/t/p/w1280{{ $result->backdrop_path }});
            background-position: center;
            height: 452px;
            ">
        </div>
    </x-slot>    
    
    <div class="flex h-f" style="width: 60%; margin: 0 auto 30% auto;">      
        <show-movie-component :result="{{ json_encode($result) }}"></show-movie-component>
    </div>
    <div class="mt-15" style="width: 85%; margin: 0 auto;">
        <recommend-component :id="{{ $result->id }}" />
    </div>
</x-app-layout>