<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {!! __('Pembimbing &raquo; Create') !!}
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

                <form action="{{ route('googleToken.store') }}" class="w-full" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label for="grid-refresh"
                                class="bloc uppercase tracking-wide text-lg text-gray-700 text-xs font-bold mb-2">
                                Refresh Token
                            </label>
                            <input id='grid-refresh' value="{{ old('refresh_token') }}" name="refresh_token"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 rounded-xl focus:outline-none focus:bg-white"
                                placeholder="Refresh Token" type="text" required>
                        </div>
                        <div class="w-full mt-5 px-3">
                            <label for="grid-access"
                                class="bloc uppercase tracking-wide text-lg text-gray-700 text-xs font-bold mb-2">
                                Access Token
                            </label>
                            <input id='grid-access' value="{{ old('access_token') }}" name="access_token"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 rounded-xl focus:outline-none focus:bg-white"
                                placeholder="Access Token" type="text" required>
                        </div>
                        <div class="flex flex-wrap mt-10 ml-auto mb-6">
                            <div class="w-full px-3 text-right">
                                <button type="submit"
                                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                    Add Token
                                </button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>


    </div>
</x-app-layout>