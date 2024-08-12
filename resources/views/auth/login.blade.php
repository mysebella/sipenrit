@extends('_layout.app-container')

@section('content')
    <main class="w-full h-dvh grid bg-white lg:bg-gray-100 place-items-center">
        <div class="p-4 bg-white flex w-96 flex-col items-center rounded-lg">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/1f/Insignia_of_the_Indonesian_Army.svg/170px-Insignia_of_the_Indonesian_Army.svg.png"
                class="w-40 m-auto" />

            <div class="my-4">
                <p class="text-black text-center text-xl font-medium">Selamat datang di SIPENRIT</p>
                <p class="text-black text-center">(Sistem Informasi Pensiunan Prajurit)</p>
            </div>

            <form class="mt-2" action="{{ route('login') }}" method="POST">
                @csrf
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

@section('javascript')
    <script>
        Swal.fire({
            icon: 'info',
            text: "Pertama kali mengunakan aplikasi ini?",
            showDenyButton: true,
            confirmButtonText: "Iya",
            denyButtonText: `Tidak`
        }).then((result) => {
            if (result.isConfirmed) {
                document.location = "/auth/register"
            } else if (result.isDenied) {
                Swal.fire("", "Silahkan Masuk Mengunakan NRP yang di daftarkan", "info");
            }
        });
    </script>
@endsection
