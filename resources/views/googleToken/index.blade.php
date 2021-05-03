<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Google Api Token') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-10">
                <a href="{{ route('googleToken.create') }}"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    + Add Token</a>
            </div>
            <div class="bg-white">
                <table class="bg-green-500 border-separate border  border-green-500 table-auto w-full">
                    <thead>
                        <tr>
                            <th class="border border-white px-6 py-4">Refresh Token</th>
                            <th class="border border-white px-6 py-4">Access Token</th>
                            <th class="border border-white px-6 py-4">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-green-200">
                        @forelse ($tokens as $token)
                        <tr>
                            <td class="border border-white px-6 py-4 text-center text-xs">{{ $token->refresh_token }}
                            </td>
                            <td class="border border-white px-6 py-4 text-center text-xs">{{ $token->access_token }}
                            </td>
                            <td class="border border-white px-6 py-4 text-center">
                                <a href="{{ route('googleToken.edit',$token->id) }}"
                                    class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mx-2 rounded">Edit</a>
                                <form action="{{ route('googleToken.destroy',$token->id) }}" method="POST"
                                    class="inline-block">
                                    {!! method_field('delete') . csrf_field() !!}
                                    <button type="submit"
                                        class="  bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 mx-2 rounded">Remove</button>

                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="border text-center p-5 ">Tidak Ada Data</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="text-center mt-5">
                {{ $tokens->links() }}

            </div>
        </div>
    </div>
</x-app-layout>