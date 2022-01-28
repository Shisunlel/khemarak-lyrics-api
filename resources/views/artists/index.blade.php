<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Artist') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-row justify-between mb-4">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">@lang('common.artists')</h2>
                        <a href="{{ route('artists.create') }}"
                            class="p-2 large bg-indigo-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
                            Add New
                        </a>
                    </div>

                    <div class="content">
                        <div class="header flex justify-between">
                            <h2>#</h2>
                            <h2>Name</h2>
                            <h2>Profile</h2>
                            <h2>Action</h2>
                        </div>
                        <div class="body mt-6">
                            @forelse ($artists as $artist)
                                <div class="flex justify-between p-2">
                                    <p>{{ $artist->id }}</p>
                                    <p>{{ $artist->name }}</p>
                                    <img src="{{ $artist->image }}" class="h-20">
                                    <p>
                                        <button
                                            class="edit-button bg-yellow-400 hover:bg-yellow-600 rounded p-2 mb-2">Edit</button>
                                        <button
                                            class="remove-button bg-rose-500 hover:bg-rose-600 rounded p-2">Remove</button>
                                    </p>
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

    <x-modal :modal="'moda'">
        <x-slot name="title">Edit Artist</x-slot>
        <form id="update" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="mt-2">
                <x-label for="album">Artist Image</x-label>
                <input type="text" name="image" id="image" class="py-2 px-1 mt-2 w-full">
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
                const image = document.querySelector('input[name="image"]')
                const id = child[0].innerText

                resetText([image])

                form.action = `artists/${id}`;
                token.value = '{{ csrf_token() }}'
            }
        </script>
    @endpush
</x-app-layout>
