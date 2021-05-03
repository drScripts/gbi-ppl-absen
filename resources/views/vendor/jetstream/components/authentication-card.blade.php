<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
    <a href="{{ route('dashboard') }}">
        <img src="{{ asset('storage/Artboard 1.png') }}" class="h-44 w-auto" alt="">
    </a>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>