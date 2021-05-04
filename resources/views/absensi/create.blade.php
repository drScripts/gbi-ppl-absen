<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" id="hai">
            {!! __('Children &raquo; Add Absensi') !!}
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

                <form action="{{ route('absensi.store') }}" class="w-full" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full mt-8 px-3">
                            <label for="grid-name"
                                class="block uppercase tracking-wide text-lg text-gray-700 text-xs font-bold mb-2">
                                Children Name
                            </label>
                            <select name="children_id" id="grid-name"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 rounded-xl focus:outline-none focus:bg-white"
                                required>
                                @if (old('children_id'))
                                <option class="rounded-xl" value="{{ old('children_id') }}">{{ old('children_name') }}
                                </option>
                                @else
                                <option class="rounded-xl" value="">Select Children Name</option>
                                @endif
                                @foreach ($childrens as $children)
                                <option class="rounded-xl" value="{{ $children->id }}">{{ $children->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="w-full mt-8 px-3">
                            <label for="grid-quiz"
                                class="block uppercase tracking-wide text-lg text-gray-700 text-xs font-bold mb-2">
                                Children Quiz
                            </label>
                            <select name="quiz" id="grid-quiz"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 rounded-xl focus:outline-none focus:bg-white"
                                required>
                                @if (old('children_id'))
                                <optgroup label="Your Selected Before">
                                    <option class="rounded-xl" value="{{ old('quiz') }}">{{ old('quiz') }}
                                    </option>
                                </optgroup>
                                @else
                                <option class="rounded-xl" value="">Select Children Quiz</option>
                                @endif
                                <optgroup label="Options">
                                    <option class="rounded-xl" value="yes">Yes</option>
                                    <option class="rounded-xl" value="no">No</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="grid grid-flow-col mt-20 auto-cols-max mx-auto">
                            <label
                                class="inline-block mx-8 w-64 h-64 flex flex-col items-center px-4 py-6 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-gray-500"
                                style="background-image: url( )" id='foto-label'>
                                <div class="my-auto mx-auto">
                                    <svg class="w-8 mb-3 h-8 mx-auto" fill="currentColor"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path
                                            d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                                    </svg>
                                    <span class="text-center text-base leading-normal">Select a Image</span>
                                    <input name='foto' type='file' id='image-path' class="hidden" accept="image/*" />
                                </div>
                            </label>
                            <label
                                class="  w-64 h-64 flex flex-col items-center px-4 py-6 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-gray-500"
                                id='video-label'>
                                <div class="my-auto mx-auto">
                                    <svg id='video-svg' class="w-8 mb-3 h-8 mx-auto" fill="currentColor"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path
                                            d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                                    </svg>
                                    <span id='video-name' class=" text-base leading-normal">Select a Video</span>
                                    <input name='video' type='file' id='video-path' class="hidden" accept="video/*" />
                                </div>
                            </label>
                        </div>
                        <div class="w-full flex flex-wrap mt-10 ml-auto mb-6">
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
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                
                var reader = new FileReader();
                
                reader.onload = function (e) { 
                    $('#foto-label').css('background-image','url(' + e.target.result + ')');
                    $('#foto-label').css('background-size','contain'); 
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#image-path").change(function(){
            $('#foto-label').removeClass('bg-white');
            readURL(this);
        });
        $("#video-path").change(function(){
            var name = this.files[0].name;
            $('#video-name').text(name);
            $('#video-svg').remove();
        });  
    </script>

</x-app-layout>