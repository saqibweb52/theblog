<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <table class="w-full whitespace-no-wrapw-full whitespace-no-wrap">
      @if (session()->has('posted'))
        {{session('posted')}}
      @endif
        <thead>
            <tr class="text-center font-bold">
                <td class="border px-6 py-4">Name</td>
                <td class="border px-6 py-4">Title</td>
                <td class="border px-6 py-4">Post</td>
                <td class="border px-6 py-4">Date</td>
                <td class="border px-6 py-4">Action</td>
                
            </tr>
        </thead>
        
 @foreach ($posts as $p)
     
 
            <tr class="text-center font-bold">
                <td class="border px-6 py-4">{{$p->user->name}}</td>
                <td class="border px-6 py-4">{{$p->title}}</td>
                <td class="border px-6 py-4">{{$p->body}}</td>
                <td class="border px-6 py-4">{{$p->created_at}}</td>
                <td class="border px-6 py-4">
                    @can('isAdmin', $posts)
                <a href="{{url('editpost',$p->id)}}"><i class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Edit</i></a>
                <a href="{{url('deletepost',$p->id)}}"><i class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">Delete</i></a>
                @endcan
            </td>
            </tr>
            @endforeach
    </table>
 
    
</x-app-layout>
