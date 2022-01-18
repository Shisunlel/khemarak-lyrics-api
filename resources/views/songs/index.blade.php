<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('common.songs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-row justify-between mb-4">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">@lang('common.songs')</h2>
                        <a href="{{ route('songs.create') }}"
                            class="p-2 large bg-indigo-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
                            Add New
                        </a>
                    </div>
                    <div class="content">
                        <div class="header flex justify-between">
                            <h2>#</h2>
                            <h2>Title</h2>
                            <h2>Artist</h2>
                            <h2>Album</h2>
                            <h2>Cover</h2>
                            <h2>Length</h2>
                            <h2>Lyrics</h2>
                        </div>
                        
                        <div class="body mt-6">
                            @forelse ($songs as $song)
                                <div class="flex justify-between p-2">
                                    <p>{{ $loop->index + 1 }}</p>
                                    <p>{{ $song->title }}</p>
                                    <p>{{ $song->artist->name }}</p>
                                    <p>{{ $song->album->name }}</p>
                                    <img src="{{ $song->album->cover ?: $song->artist->image }}" class="h-20">
                                    <p>{{ $song->length }}</p>
                                    <p>{{ $song->lyrics }}</p>
                                </div>
                            @empty
                                <p>No data available</p>
                            @endforelse


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
