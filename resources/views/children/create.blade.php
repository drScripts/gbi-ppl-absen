<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {!! __('Children &raquo; Create') !!}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                @if ($errors->any())
                <div class="mb-5" role="alert">
                    <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                        There's Something Wrong
                    </div>
                    <div class="border boder-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700 font-bold">
                        @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                        @endforeach
                    </div>
                </div>
                @endif

                <form action="{{ route('children.store') }}" class="w-full" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label for="grid-name"
                                class="bloc uppercase tracking-wide text-lg text-gray-700 text-xs font-bold mb-2">
                                Children Name
                            </label>
                            <input id='grid-name' value="{{ old('name') }}" name="name"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 rounded-xl focus:outline-none focus:bg-white"
                                placeholder="Children Name" type="text" required>
                        </div>
                        <div class="w-full mt-8 px-3">
                            <label for="grid-code"
                                class="bloc uppercase tracking-wide text-lg text-gray-700 text-xs font-bold mb-2">
                                Children Code
                            </label>
                            <input id="grid-code" value="{{ old('code') }}" name="code"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 rounded-xl focus:outline-none focus:bg-white"
                                placeholder="Children Code" type="text" required>
                        </div>
                        <div class="w-full mt-8 px-3">
                            <label for="grid-role"
                                class="bloc uppercase tracking-wide text-lg text-gray-700 text-xs font-bold mb-2">
                                Children Role
                            </label>
                            <select name="role" id="grid-role"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 rounded-xl focus:outline-none focus:bg-white"
                                required>
                                @if (old('role'))
                                <option class="rounded-xl" value="{{ old('role') }}">{{ old('role') }}</option>
                                @endif
                                <option class="rounded-xl" value="Madya">Madya</option>
                                <option class="rounded-xl" value="Pratama">Pratama</option>
                            </select>
                        </div>
                        <div class="w-full mt-8 px-3">
                            <label for="grid-pembimbing"
                                class="bloc uppercase tracking-wide text-lg text-gray-700 text-xs font-bold mb-2">
                                Children Pembimbing
                            </label>
                            <select name="id_pembimbing" id="grid-pembimbing"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 rounded-xl focus:outline-none focus:bg-white"
                                required>
                                @if (old('role'))
                                <option class="rounded-xl" value="{{ old('role') }}">{{ old('role') }}</option>
                                @endif
                                @foreach ($pembimbings as $pembimbing)
                                <option class="rounded-xl" value="{{ $pembimbing->id }}">{{ $pembimbing->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex flex-wrap mt-10 ml-auto mb-6">
                            <div class="w-full px-3 text-right">
                                <button type="submit"
                                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                    Add User
                                </button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>


    </div>
</x-app-layout>