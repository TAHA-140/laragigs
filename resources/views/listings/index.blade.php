
<x-layout>
    {{-- The Hero --}}
    @include('partials._hero')
    {{-- The Search Bar --}}
    @include('partials._search')

    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">


        @unless(count($listings) == 0)
            {{-- Loop through each listing and display --}}
            @foreach ($listings as $listing)
                <x-listing-card :listing="$listing"/>
            @endforeach

            {{-- If no listings are found, display a message --}}
            @else
                <p>No listings found</p>
        @endunless

    </div>

    {{-- This will allow you to navigate between the pages using paginate in the ListingController --}}
    <div class="mt-6 p-4">
        {{$listings->links()}}
    </div>

</x-layout>