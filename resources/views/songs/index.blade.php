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
                        <div class="shadow-sm overflow-scroll my-8">
                            <table class="border-collapse table-auto w-full text-sm">
                                <thead class="bg-white dark:bg-slate-800">
                                    <tr>
                                        <th
                                            class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
                                            #</th>
                                        <th
                                            class="border-b dark:border-slate-600 font-medium p-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
                                            Title</th>
                                        <th
                                            class="border-b dark:border-slate-600 font-medium p-4 pr-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
                                            Artist</th>
                                        <th
                                            class="border-b dark:border-slate-600 font-medium p-4 pr-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
                                            Album</th>
                                        <th
                                            class="border-b dark:border-slate-600 font-medium p-4 pr-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
                                            Cover</th>
                                        <th
                                            class="border-b dark:border-slate-600 font-medium p-4 pr-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
                                            Length</th>
                                        <th
                                            class="border-b dark:border-slate-600 font-medium p-4 pr-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
                                            Lyrics</th>
                                        <th
                                            class="border-b dark:border-slate-600 font-medium p-4 pr-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-slate-800">
                                    @forelse ($songs as $song)
                                        <tr>
                                            <td
                                                class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                                                {{ $song->id }}</td>
                                            <td
                                                class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
                                                {{ $song->title }}</td>
                                            <td
                                                class="border-b border-slate-100 dark:border-slate-700 p-4 pr-8 text-slate-500 dark:text-slate-400">
                                                {{ $song->artist->name }}</td>
                                            <td
                                                class="border-b border-slate-100 dark:border-slate-700 p-4 pr-8 text-slate-500 dark:text-slate-400">
                                                {{ isset($song->album) ? $song->album->name : '' }}</td>
                                            <td
                                                class="border-b border-slate-100 dark:border-slate-700 p-4 pr-8 text-slate-500 dark:text-slate-400">
                                                <img src="{{ isset($song->album) ? $song->album->cover ?: $song->artist->image ?: '' : '' }}" class="h-20">
                                            <td
                                                class="border-b border-slate-100 dark:border-slate-700 p-4 pr-8 text-emerald-500 text-ellipsis overflow-hidden">
                                                {{ $song->length }}</td>
                                            <td
                                                class="border-b border-slate-100 dark:border-slate-700 p-4 pr-8 text-slate-500 dark:text-slate-400">
                                                {{ $song->lyrics }}</td>
                                            <td
                                                class="border-b border-slate-100 dark:border-slate-700 p-4 pr-8 text-slate-50 dark:text-black">
                                                <button
                                                    class="edit-button bg-yellow-400 hover:bg-yellow-600 rounded p-2 mb-2">Edit</button>
                                                <button
                                                    class="remove-button bg-rose-500 hover:bg-rose-600 rounded p-2">Remove</button>
                                            </td>
                                        </tr>
                                    @empty
                                        <p>No data available</p>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-modal>
        <x-slot name="title">Edit Song</x-slot>
        <form id="update" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="mt-2">
                <x-label for="title">Title</x-label>
                <input type="text" name="title" id="title" class="py-2 px-1 mt-2 w-full">
            </div>
            <div class="mt-2">
                <x-label for="artist">Artist</x-label>
                <input type="text" name="artist" id="artist" class="py-2 px-1 mt-2 w-full">
            </div>
            <div class="mt-2">
                <x-label for="album">Album</x-label>
                <input type="text" name="album" id="album" class="py-2 px-1 mt-2 w-full">
            </div>
            <div class="mt-2">
                <x-label for="lyrics">Lyrics</x-label>
                <textarea name="lyrics" id="lyrics" rows="10" cols="30" class="py-2 px-1 mt-2 w-full"></textarea>
            </div>
        </form>
        <x-slot name="button">
            <x-button id="final-approved" form="update"
                class="bg-emerald-600 hover:bg-emerald-700 focus:ring-emerald-500 ml-2">
                Approve
            </x-button>
            <x-button type="button"
                class="hide-button">
                Cancel
            </x-button>
        </x-slot>
    </x-modal>

    @push('script')
        <script>
            const modal = document.getElementById('modal')
            const approvedButton = document.getElementsByClassName('edit-button')
            const hide = document.getElementsByClassName('hide-button')

            Array.from(approvedButton).forEach(element => {
                element.addEventListener('click', function() {
                    const child = this.parentElement.parentElement.children;
                    populateForm(child)
                    // child[1] title child[2] artist child[3] album child[4] cover child[6] lyrics
                    modal.classList.remove('hidden')
                })
            });


            Array.from(hide).forEach(element => {
                element.addEventListener('click', () => {
                    modal.classList.add('hidden')
                })
            });

            const resetText = function(e) {
                for (let i of e) {
                    i.value = ''
                }
            }

            function populateForm(child) {
                const form = document.querySelector('#update')
                const token = document.querySelector('input[name="_token"]')
                const title = document.querySelector('input[name="title"]')
                const artst = document.querySelector('input[name="artist"]')
                const album = document.querySelector('input[name="album"]')
                const lyrics = document.querySelector('textarea[name="lyrics"]')
                const id = child[0].innerText

                resetText([title, artist, album, lyrics])

                form.action = `songs/${id}`;
                token.value = '{{ csrf_token() }}'
                title.value = child[1].innerText
                artist.value = child[2].innerText
                album.value = child[3].innerText
                lyrics.value = child[6].innerHTML
            }
        </script>
    @endpush
</x-app-layout>
