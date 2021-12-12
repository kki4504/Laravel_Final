<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                
            </h2>
            <button onclick=location.href="{{ route('movies.index') }}" 
                    type="button"
                    style="width:60px;height:35px"
                    class="bg-black font-bold border-2 border-white rounded-lg hover:bg-white hover:text-black"
                    >
                    검색
            </button>
        </div>
    </x-slot>
    <div style="width: 79%; margin: 0 auto;" class="m-6 p-6">
        {{-- file보내는 form에서 method="post enctype="multipart" --}}
        <form class="row g-3" 
              action="{{ route('movies.update', ['id' => $result->id]) }}"
              method="post" 
              enctype="multipart/form-data">    
              @method('patch')
              @csrf
            <div class="col-12 m-2">
                <div style="font-size: xx-large" class="font-bold">영화제목</div>
                <div class="ml-5" style="font-size: x-large">{{ $result->title }}</div>
            </div>
            <div class="col-12 m-2 mt-4">
                <div style="font-size: xx-large" class="font-bold">코멘트</div>
                <textarea 
                    class="form-control" 
                    name="content" 
                    id="content" 
                    cols="30" rows="10" 
                    >{{ $result->content }}</textarea>
                @error('content')
                    <div class="text-red-800">
                        <span>{{ $message }}</span>
                    </div>
                @enderror
            </div>
            <div class="col-12 m-2">
              <button type="submit" 
                style="width:80px;height:35px" 
                class="bg-black font-bold border-2 border-white rounded-lg hover:bg-white hover:text-black">글수정</button>
            </div>
        </form>
    </div>
</x-app-layout>
