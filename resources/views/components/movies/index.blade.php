<x-app-layout>
    <x-slot name="header" class="border-white">
        <h2 class="font-semibold text-xl leading-tight">
            {{-- {{ __('Index') }} --}}
        </h2>
    </x-slot>
    {{-- Top bar --}}
    <div class="content-start">
        <div class="flex justify-center border h-f" style="width: 79%; margin: 0 auto; padding: 2 2">
            <index-component class="py-2" style="width: 100%;" />
        </div>
    </div>
    <div>
        
    </div>
    {{--  --}}
</x-app-layout>