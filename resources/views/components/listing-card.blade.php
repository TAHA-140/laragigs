 
 {{-- Define 'listing' as a property that can be passed to this component --}}
 @props(['listing'])
 
<x-card>
    <div class="flex">
        {{-- if no image is uploaded then use the default image. --}}
        <img class="hidden w-48 mr-6 md:block" src="{{$listing->logo ? asset('storage/' . $listing->logo) : asset('/images/no-image.png')}}" alt=""/>
        <div>
            <h3 class="text-2xl">
                <a href="/listings/{{$listing->id}}">{{$listing->title}}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{$listing->company}}</div>
            {{-- pass the tags to listing tags component --}}
            <x-listing-tags :tagsCsv="$listing->tags"/>

            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> 
                {{$listing->location}}

            </div>
        </div>
    </div>
</x-card>