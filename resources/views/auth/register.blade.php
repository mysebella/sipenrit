@extends('_layout.app-container')

@section('content')
    <main class="w-full h-dvh grid bg-white lg:bg-gray-100 place-items-center">
        <div class="p-4 bg-white w-96 lg:w-[600px] rounded-lg">

            <p class="text-black lg:text-center text-start my-6 font-medium text-xl">Pendaftaran Sipenrit</p>

            <form class="mt-2" method="POST" enctype="multipart/form-data" action="{{ route('register') }}">
                @csrf

                <div class="bg-white my-4 rounded-lg">
                    <p class="mb-2">Foto Background<span class="text-red-500">*</span></p>
                    <label for="file-input" class="sr-only">Choose file</label>
                    <input type="file" name="profile" id="file-input"
                        class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none file:bg-gray-50 file:border-0 file:me-4 file:py-3 file:px-4">
                </div>

                <p class="my-2 text-black">Nama Lengkap</p>
                <input name="name" placeholder="Masukan nama lengkap" type="text" required
                    class="p-3 w-full mb-2 outline-blue-400 border border-gray-100 rounded-lg">

                <p class="my-2 text-black">Tanggal Lahir</p>
                <div class="flex gap-1 lg:gap-4 lg:flex-row flex-col">
                    <input name="day" type="tel" required placeholder="Tanggal"
                        class="p-3 w-full mb-2 outline-blue-400 border border-gray-100 rounded-lg">
                    <select name="month" class="p-3 w-full mb-2 outline-blue-400 border border-gray-100 rounded-lg">
                        <option>Januari</option>
                        <option>Febuari</option>
                        <option>Maret</option>
                        <option>April</option>
                        <option>Mei</option>
                        <option>Juni</option>
                        <option>Juli</option>
                        <option>Agustus</option>
                        <option>September</option>
                        <option>November</option>
                        <option>Desember</option>
                    </select>
                    <input name="year" type="tel" required placeholder="Tahun"
                        class="p-3 w-full mb-2 outline-blue-400 border border-gray-100 rounded-lg">
                </div>

                <p class="my-2 text-black">NRP</p>
                <input name="nrp" placeholder="Masukan NRP" type="number" required
                    class="p-3 w-full mb-2 outline-blue-400 border border-gray-100 rounded-lg">

                <p class="my-2 text-black">Pangkat</p>
                <select name="rank" class="p-3 w-full mb-2 outline-blue-400 border border-gray-100 rounded-lg">
                    <option>Jenderal</option>
                    <option>Letnan Jenderal</option>
                    <option>Mayor Jenderal</option>
                    <option>Brigadir Jenderal</option>
                    <option>Kolonel</option>
                    <option>Letnan Kolonel</option>
                    <option>Mayor</option>
                    <option>Kapten</option>
                    <option>Letnan Satu</option>
                    <option>Letnan Dua</option>
                    <option>Pembantu Letnan Satu</option>
                    <option>Pembantu Letnan Dua</option>
                    <option>Sersan Mayor</option>
                    <option>Sersan Kepala</option>
                    <option>Sersan Satu</option>
                    <option>Sersan Dua</option>
                    <option>Kopral Kepala</option>
                    <option>Kopral Satu</option>
                    <option>Kopral Dua</option>
                    <option>Prajurit Kepala</option>
                    <option>Prajurit Satu</option>
                    <option selected>Prajurit Dua</option>
                </select>
                <button class="p-3 bg-blue-400 w-full rounded-lg mt-2 text-white font-semibold">Masuk</button>
            </form>
        </div>
    </main>
@endsection
