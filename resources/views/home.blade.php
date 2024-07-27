@extends('_layout.app-container')

@section('content')
    <main class="relative w-full h-dvh overflow-hidden overflow-y-scroll">
        <nav class="w-full font-poppins h-20 border-b-2 border-gray-100 flex justify-between items-center p-4">

            <div class="flex gap-3 items-center">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/1f/Insignia_of_the_Indonesian_Army.svg/170px-Insignia_of_the_Indonesian_Army.svg.png"
                    class="w-10 m-auto" />
                <p class="text-black font-semibold text-2xl">Sipenrit</p>
            </div>

            <div class="flex gap-4">
                @if ($user->role == 'admin')
                    <a href="{{ route('dashboard') }}"
                        class=" text-blue-500 px-6 items-center flex justify-center h-10 border-2 border-blue-500 rounded-md hover:bg-blue-500 hover:text-white">
                        Dashboard
                    </a>
                @endif
                <a href="{{ route('logout') }}"
                    class=" text-red-500 w-10 items-center flex justify-center h-10 border-2 border-red-500 rounded-md hover:bg-red-500 hover:text-white">
                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="20px"
                        width="20px" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V256c0 17.7 14.3 32 32 32s32-14.3 32-32V32zM143.5 120.6c13.6-11.3 15.4-31.5 4.1-45.1s-31.5-15.4-45.1-4.1C49.7 115.4 16 181.8 16 256c0 132.5 107.5 240 240 240s240-107.5 240-240c0-74.2-33.8-140.6-86.6-184.6c-13.6-11.3-33.8-9.4-45.1 4.1s-9.4 33.8 4.1 45.1c38.9 32.3 63.5 81 63.5 135.4c0 97.2-78.8 176-176 176s-176-78.8-176-176c0-54.4 24.7-103.1 63.5-135.4z">
                        </path>
                    </svg>
                </a>
            </div>
        </nav>

        <div class="w-full flex h-dvh">
            <div class="w-[20%] h-full border-r-2 border-gray-100 shadow-sm text-black hidden lg:block">
                <ul>
                    <a class="block" href="{{ route('home') }}">
                        <li class="p-6 border-b border-gray-100 hover:bg-gray-50">Informasi Pribadi</li>
                    </a>
                    <a class="block" href="{{ route('upload') }}">
                        <li class="p-6 border-b border-gray-100 hover:bg-gray-50">Document Pensiun</li>
                    </a>
                </ul>
            </div>
            <div class="w-full lg:w-[80%] h-full p-4 lg:py-10 bg-gray-100 shadow-sm">
                @include('components.head', ['user' => $user, 'showButton' => true])
            </div>
        </div>
    </main>
@endsection
