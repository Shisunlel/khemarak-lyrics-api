<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Song Requests') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex flex-row justify-between mb-4">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">@lang('common.song_request')</h2>
                    <a href="{{ route('requests.create') }}"
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
                        <h2>Contributor</h2>
                        <h2>Lyrics</h2>
                        <h2>Approved</h2>
                    </div>
                    
                    <div class="body mt-6">
                        @forelse ($requests as $request)
                            <div class="flex justify-between p-2">
                                <p>{{ $loop->index + 1 }}</p>
                                <p>{{ $request->song_title }}</p>
                                <p>{{ $request->artist }}</p>
                                <p>{{ $request->album }}</p>
                                <p>{{ $request->contributor }}</p>
                                <p>{{ $request->lyrics }}</p>
                                <p>{{ $request->is_approved ? 'Yes' : 'No' }}</p>
                            </div>
                        @empty
                            <p>No data available</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
