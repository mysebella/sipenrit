@extends('_layout.app-container')

@section('content')
    <main class="w-full h-dvh grid bg-white lg:bg-gray-100 place-items-center">
        <div class="p-4 bg-white flex w-96 flex-col items-center rounded-lg">

            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/1f/Insignia_of_the_Indonesian_Army.svg/170px-Insignia_of_the_Indonesian_Army.svg.png"
                class="w-40 m-auto" />
            <p class="text-black text-center my-4 text-xl font-medium">Selamat datang di SIPENRIT</p>

            <form class="mt-2" action="{{ route('login') }}" method="POST">
                @csrf
                <p class="my-2 text-black">NRP</p>
                <input name="nrp" placeholder="NRP" type="text" required
                    class="p-3 w-full mb-2 outline-blue-400 border border-gray-100 rounded-lg">

                <button class="p-3 bg-blue-400 w-full rounded-lg mt-2 text-white font-semibold">Masuk</button>
            </form>

            <div class="mt-4">
                <p class="text-black">Belum punya account? <a href="{{ route('register.view') }}"
                        class="text-blue-500">daftar disini</a></p>
            </div>
        </div>
    </main>
@endsection
