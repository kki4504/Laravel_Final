<div class="m-6 p-6">
    <div class="card bg-black">  
        <div class="card-image" style="height:300; width:200">
            <a style="hover:text-white text-decoration:none">
                <slot name="image">
                    <img src="url{{ $result->image }}">
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
                {{ $result->comment }}
            </div>
        </div>
    </div>
</div>