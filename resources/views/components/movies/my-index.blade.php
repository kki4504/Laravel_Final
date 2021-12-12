<x-app-layout>
    <x-slot name="header" class="border-white">
        <h2 class="font-semibold text-xl leading-tight">
        </h2>
    </x-slot>
    <div class="justify-center flex flex-wrap">
        @foreach ( $results as $result )
        <div class="m-6 p-6">
            <div class="card bg-black">  
                <div class="card-image" style="height:300; width:200">
                    <a style="hover:text-white text-decoration:none">
                        <slot name="image">
                            <img src="https://image.tmdb.org/t/p/w200{{ $result->image }}">
                        </slot>
                    </a>
                </div>
                <div class="ml-1 mt-3">
                    <div class="card-title">
                        {{ $result->title }}
                    </div>
                </div>
                <div class="ml-1 mt-3">
                    <div class="card-title">
                        {{ $result->content }}
                    </div>
                </div>
                <a href="{{ route('movies.edit', ['id' => $result->id]) }}" class=" text-center text-xl border-2 border:white rounded hover:bg-white hover:text-black">수정</a>
                <form id="form" style="width: 100%" name="" method="post" 
                    onsubmit="event.preventDefault(); confirmDelete(event)"
                    action="{{ route('movies.destroy', ['id' => $result->id]) }}">
                    @csrf
                    @method('delete')
                    {{-- <input type="hidden" name="_method" value="delete"> --}}
                    <button style="width: 100%" class="text-xl border-2 border:white rounded hover:bg-white hover:text-black">삭제</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
    
</x-app-layout>