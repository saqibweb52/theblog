<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Post') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            Create Post
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Create an amazing artical!
        </p>
    </header>



    <form method="post"  class="mt-6 space-y-6">
      @csrf
      @method('PUT')
       
        <div>
            <label class="block font-medium text-sm text-gray-700" for="title">
    Title
</label>
            <input value="{{$post->title}}" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="title" name="title" type="text"  required>
                    </div>

        <div>
            <label class="block font-medium text-sm text-gray-700" for="post">
    Post
</label>
            <textarea  style=resize:none; rows="4" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="body" name="body" type="text"  required>{{$post->body}}</textarea>
            
                    </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
    Upload
</button>

                    </div>
    </form>

    @if (session()->has('posted'))
      {{session('posted')}}
    @endif
</section>
                </div>
            </div>      
              
</x-app-layout>
