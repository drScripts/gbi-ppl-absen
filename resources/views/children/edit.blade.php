<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Children &raquo; {{ $children->name }} &raquo; Edit
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
                <form action="{{ route('children.update',$children->id) }}" class="w-full" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label for="grid-name"
                                class="bloc uppercase tracking-wide text-lg text-gray-700 text-xs font-bold mb-2">
                                Children Name
                            </label>
                            <input id='grid-name' value="{{ old('name') ?? $children->name }}" name="name"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 rounded-xl focus:outline-none focus:bg-white"
                                placeholder="Children Name" type="text" required>
                        </div>
                        <div class="w-full mt-8 px-3">
                            <label for="grid-code"
                                class="bloc uppercase tracking-wide text-lg text-gray-700 text-xs font-bold mb-2">
                                Children Code
                            </label>
                            <input id="grid-code" value="{{ old('code') ?? $children->code }}" name="code"
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
                                <option class="rounded-xl" value="{{ old('role')  }}">{{ old('role') }}</option>
                                @elseif ($children->role)
                                <optgroup label="Default">
                                    <option class="rounded-xl" value="{{ $children->role  }}">{{ $children->role }}
                                    </option>
                                </optgroup>
                                @endif
                                <optgroup label="Pilihan">
                                    <option class="rounded-xl" value="Madya">Madya</option>
                                    <option class="rounded-xl" value="Pratama">Pratama</option>
                                </optgroup>
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
                                @elseif ($children->id_pembimbing)
                                <optgroup label="Default">
                                    <option class="rounded-xl" value="{{ $children->id_pembimbing }}">
                                        {{ $children->pembimbing->name }}</option>
                                </optgroup>
                                @endif
                                <optgroup label="Pilihan">
                                    @foreach ($pembimbings as $pembimbing)
                                    <option class="rounded-xl" value="{{ $pembimbing->id }}">{{ $pembimbing->name }}
                                    </option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>
                        <div class="flex flex-wrap mt-10 ml-auto mb-6">
                            <div class="w-full px-3 text-right">
                                <button type="submit"
                                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                    Edit User
                                </button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>