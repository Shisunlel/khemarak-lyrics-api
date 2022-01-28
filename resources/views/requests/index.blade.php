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

                    <div class="shadow-sm overflow-scroll my-8">
                        <table class="border-collapse table-auto w-full text-sm">
                            @if (empty($requests->first()))
                                <p>No new request</p>
                            @else
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
                                        Contributor</th>
                                    <th
                                        class="border-b dark:border-slate-600 font-medium p-4 pr-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
                                        Lyrics</th>
                                    <th
                                        class="border-b dark:border-slate-600 font-medium p-4 pr-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
                                        Approved</th>
                                    <th
                                        class="border-b dark:border-slate-600 font-medium p-4 pr-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-slate-800">
                                @forelse ($requests as $request)
                                    <tr>
                                        <td
                                            class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                                            {{ $request->id }}</td>
                                        <td
                                            class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
                                            {{ $request->song_title }}</td>
                                        <td
                                            class="border-b border-slate-100 dark:border-slate-700 p-4 pr-8 text-slate-500 dark:text-slate-400">
                                            {{ $request->artist }}</td>
                                        <td
                                            class="border-b border-slate-100 dark:border-slate-700 p-4 pr-8 text-slate-500 dark:text-slate-400">
                                            {{ $request->album }}</td>
                                        <td
                                            class="border-b border-slate-100 dark:border-slate-700 p-4 pr-8 text-slate-500 dark:text-slate-400">
                                            {{ $request->contributor }}</td>
                                        <td
                                            class="border-b border-slate-100 dark:border-slate-700 p-4 pr-8 text-emerald-500 text-ellipsis overflow-hidden">
                                            {{ $request->lyrics }}</td>
                                        <td
                                            class="border-b border-slate-100 dark:border-slate-700 p-4 pr-8 text-slate-500 dark:text-slate-400">
                                            {{ $request->is_approved ? 'Yes' : 'No' }}</td>
                                        <td
                                            class="border-b border-slate-100 dark:border-slate-700 p-4 pr-8 text-slate-50 dark:text-black">
                                            <button
                                                class="accept-button bg-yellow-400 hover:bg-yellow-600 rounded p-2 mb-2">Accept</button>
                                            <button
                                                class="reject-button bg-rose-500 hover:bg-rose-600 rounded p-2">Reject</button>
                                        </td>
                                    </tr>
                                @empty
                                    <p>No data available</p>
                                @endforelse
                            </tbody>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--  accept request --}}
    <x-modal :modal="'modal'">
        <x-slot name="title">Accept Request</x-slot>
        <form id="store" action="{{ route('songs.store') }}" method="POST">
            @csrf
            <input type="hidden" name="request_id" value="">
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
            <x-button id="final-approved" form="store"
                class="bg-emerald-600 hover:bg-emerald-700 focus:ring-emerald-500 ml-2">
                Approve
            </x-button>
            <x-button type="button"
                class="hide-button">
                Cancel
            </x-button>
        </x-slot>
    </x-modal>

    {{-- reject request --}}
    <x-modal :modal="'reject-modal'">
        <x-slot name="title">Reject Request</x-slot>
        <form id="delete" method="POST">
            @method('DELETE')
            @csrf
            <p class="text-sm text-gray-500">
                Are you sure you want to reject this request? This request will be permanently removed. This action cannot be undone.
            </p>
        </form>
        <x-slot name="button">
            <x-button id="confirm-reject" form="delete"
                class="bg-rose-600 hover:bg-rose-700 focus:ring-rose-500 ml-2">
                Reject
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
            const rejectModal = document.getElementById('reject-modal')
            const approvedButton = document.getElementsByClassName('accept-button')
            const rejectButton = document.getElementsByClassName('reject-button')
            const hide = document.getElementsByClassName('hide-button')

            Array.from(approvedButton).forEach(element => {
                element.addEventListener('click', function() {
                    const child = this.parentElement.parentElement.children;
                    populateForm(child)
                    // child[1] title child[2] album child[5] lyrics
                    modal.classList.remove('hidden')
                })
            });

            Array.from(rejectButton).forEach(e => {
                e.addEventListener('click', function () { 
                    const child = this.parentElement.parentElement.children
                    const id = child[0].innerText
                    const form = document.querySelector('#delete')
                    const token = document.querySelector('input[name="_token"]')
                    form.action = `requests/${id}`
                    token.value = '{{ csrf_token() }}'
                    rejectModal.classList.remove('hidden')
                 })
            })


            Array.from(hide).forEach(element => {
                element.addEventListener('click', () => {
                    modal.classList.add('hidden')
                    rejectModal.classList.add('hidden')
                })
            });

            const resetText = function(e) {
                for (let i of e) {
                    i.value = ''
                }
            }

            function populateForm(child) {
                const request = document.querySelector('input[name="request_id"')
                const title = document.querySelector('input[name="title"]')
                const artst = document.querySelector('input[name="artist"]')
                const album = document.querySelector('input[name="album"]')
                const lyrics = document.querySelector('textarea[name="lyrics"]')

                resetText([request, title, artist, album, lyrics])

                request.value = child[0].innerText
                title.value = child[1].innerText
                artist.value = child[2].innerText
                album.value = child[3].innerText
                lyrics.value = child[5].innerHTML
            }
        </script>
    @endpush
</x-app-layout>
