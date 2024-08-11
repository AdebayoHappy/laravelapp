<x-housing>
@include('partials/_hero')
@include('partials/_search')
<div
class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4"
>
@unless (count($Houses) === 0)
@foreach($Houses as $house)
  <x-housing-card :house="$house" />
@endforeach

@else
<p>No Houses found</p>
@endunless

</div>

<div class="mt-6 p4">
  {{$Houses->links()}}
</div>
</x-housing>