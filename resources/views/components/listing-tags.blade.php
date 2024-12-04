
{{-- Define 'tagsCsv' as a property that can be passed to this component --}}
@props(['tagsCsv'])

{{-- fetch the tags from the data base and add them to an array --}}
@php
 $tags = explode(',', $tagsCsv);   
@endphp

{{-- loop through the array and list them in a list  --}}
<ul class="flex">
    @foreach ($tags as $tag)
        
    
    <li class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
        <a href="/?tag={{$tag}}">{{$tag}}</a>
    </li>
    @endforeach
</ul>

