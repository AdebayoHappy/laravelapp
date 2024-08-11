@props(['house'])

<x-cardcomponent>
    <div class="flex">
        <img
            class="hidden w-48 mr-6 md:block"
            src="{{$house->logo ? asset('storage/'.$house->logo) : asset('images/no-image.png')}}"
            alt=""
        />
        <div>
            <h3 class="text-2xl">
                <a href="/house/{{$house->id}}">{{$house->title}}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{$house->company}}</div>
            <x-housing-tags :tagsCsv="$house->tags"/>
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i>{{$house->location}}
            </div>
        </div>
    </div>
</x-cardcomponent>