

<x-layout>
    <x-card class="p-10">
        <header>
            <h1 class="text-3xl text-center font-bold my-6 uppercase">
                Manage Gigs
            </h1>
        </header>

        <table class="w-full table-auto rounded-sm">
            <tbody>
                @unless($listings->isEmpty())

                    @foreach ($listings as $listing)
                        <tr class="border-gray-300">
                            {{-- I added a logo with the job title. --}}
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <img src="{{$listing->logo ? asset('storage/' . $listing->logo) : asset('/images/no-image.png')}}" alt="Company Logo" width="100" height="100">
                            </td>
                            
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <a href="/listings/{{$listing->id}}"> {{$listing->title}} </a>
                            </td>
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <a href="/listings/{{$listing->id}}/edit" class="text-blue-400 px-6 py-2 rounded-xl">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    Edit
                                </a>
                            </td>
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                
                                <form method="POST" action="/listings/{{$listing->id}}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-500"><i class="fa-solid fa-trash"></i>Delete</button>
                    
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    
                    @else
                        <tr class="border-gray-300">
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <p class="text-center">No Listing Found</p>
                            </td>
                        </tr>
                    
                @endunless
                
                
            </tbody>
        </table>
    </x-card>

</x-layout>