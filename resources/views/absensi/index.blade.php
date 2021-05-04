<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Absensi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="mb-10">
                <a href="{{ route('absensi.create') }}"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    + Add Absensi
                </a>
            </div>
            @if ($data)
            <div class="w-full mx-auto mb-4">
                <a href="{{ route('absensi') }}"
                    class="bg-green-500 mx-auto hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Export
                </a>
            </div>
            @endif
            <div class="bg-white">
                <table class="bg-green-500 border-separate border  border-green-500 table-auto w-full">
                    <thead>
                        <tr>
                            <th class="border border-white px-6 py-4">Name</th>
                            <th class="border border-white px-6 py-4">Code Anak</th>
                            <th class="border border-white px-6 py-4">Role</th>
                            <th class="border border-white px-6 py-4">Pembimbing</th>
                            <th class="border border-white px-6 py-4">Foto</th>
                            <th class="border border-white px-6 py-4">Video</th>
                            <th class="border border-white px-6 py-4">Quiz</th>
                            <th class="border border-white px-6 py-4">Sunday Date</th>
                            <th class="border border-white px-6 py-4">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-green-200">
                        @forelse ($data as $child)
                        <tr>
                            <td class="border border-white px-6 py-4 text-center">{{ $child->children->name }}</td>
                            <td class="border border-white px-6 py-4 text-center">{{ $child->children->code }}</td>
                            <td class="border border-white px-6 py-4 text-center">{{ $child->children->role }}</td>
                            <td class="border border-white px-6 py-4 text-center">{{ $child->pembimbing->name }}</td>
                            <td class="border border-white px-6 py-4 text-center">{{ $child->image }}</td>
                            <td class="border border-white px-6 py-4 text-center">{{ $child->video }}</td>
                            <td class="border border-white px-6 py-4 text-center">{{ $child->quiz }}</td>
                            <td class="border border-white px-6 py-4 text-center">{{ $child->sunday_date }}</td>
                            <td class="border border-white px-6 py-4 text-center">

                                <form action="{{ route('absensi.destroy',$child->id) }}" method="POST"
                                    class="inline-block">
                                    {!! method_field('delete') . csrf_field() !!}
                                    <button type="submit"
                                        class="  bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 mx-2 rounded">Remove</button>

                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="border text-center p-5 ">Tidak Ada Data</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="text-center mt-5">
                {{ $data->links() }}

            </div>
        </div>
    </div>
</x-app-layout>