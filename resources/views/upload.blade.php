@extends('_layout.app-container')

@section('content')
    <main class="relative w-full h-dvh overflow-hidden">
        <nav class="w-full font-poppins h-20 border-b-2 border-gray-100 flex items-center p-4">
            <div class="flex gap-3 items-center">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/1f/Insignia_of_the_Indonesian_Army.svg/170px-Insignia_of_the_Indonesian_Army.svg.png"
                    class="w-10 m-auto" />
                <p class="text-black font-semibold text-2xl">Sipenrit</p>
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

            <input type="hidden" value="{{ App\Models\User::where('id', Cookie::get('id'))->first()->id }}"
                name="user-id" />

            <div class="w-full lg:w-[80%] overflow-scroll h-full p-4 lg:py-6 bg-gray-100 shadow-sm">
                <div class="w-full lg:w-[50%] m-auto bg-red-500 p-4 lg:p-6 text-white rounded-lg">
                    <p>Jika Document Belum Siap Semua, Silahkan Upload yang sudah tersedia saja</p>
                </div>
                @if (App\Models\User::where('id', Cookie::get('id'))->first()->active == 'nonactive')
                    <div class="w-full lg:w-[50%] m-auto p-6 rounded-lg">
                        <p class="text-lg font-semibold font-poppins text-black">Upload Document</p>
                        <div>
                            <form class="mb-10" id="uploadForm" action="{{ route('upload.post') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @include('components.file-input', ['label' => 'DCPP', 'name' => 'dcpp'])

                                @include('components.file-input', [
                                    'label' => 'Permohonan',
                                    'name' => 'permohonan',
                                ])

                                @include('components.file-input', [
                                    'label' => 'Foto INPANSING',
                                    'name' => 'foto_inpasing',
                                ])

                                @include('components.file-input', [
                                    'label' => 'Foto KEP KP AKHIR / KP HAR',
                                    'name' => 'foto_kep_kp_akhir',
                                ])

                                @include('components.file-input', [
                                    'label' => 'Foto KEP MPP',
                                    'name' => 'foto_kep_mpp',
                                ])

                                @include('components.file-input', [
                                    'label' => 'Foto Kartu Asabri',
                                    'name' => 'foto_kartu_asabri',
                                ])

                                @include('components.file-input', [
                                    'label' => 'Foto KPI/KPS',
                                    'name' => 'foto_kpi',
                                ])

                                @include('components.file-input', [
                                    'label' => 'Foto KU.107',
                                    'name' => 'foto_ku_107',
                                ])

                                @include('components.file-input', [
                                    'label' => 'Foto SURAT NIKAH Legalisir KUA',
                                    'name' => 'foto_surat_nikah',
                                ])

                                @include('components.file-input', [
                                    'label' => 'Foto KK Legaliris Lurah',
                                    'name' => 'foto_kk',
                                ])

                                @include('components.file-input', [
                                    'label' => 'Foto KTP Legaliris Lurah',
                                    'name' => 'foto_ktp',
                                ])

                                @include('components.file-input', [
                                    'label' => 'Foto AKTE KELAHIRAN legalisir K. Cat. Sipil',
                                    'name' => 'foto_surat_kelahiran',
                                ])

                                @include('components.file-input', [
                                    'label' =>
                                        'Foto Surat Keterangan Kuliah Anak Tunjangan Legalisir Universitas',
                                    'name' => 'surat_keterangan_kuliah_anak',
                                ])

                                @include('components.file-input', [
                                    'label' => 'Foto KU.I Mengetahui Lurah',
                                    'name' => 'ku_i',
                                ])

                                @include('components.file-input', [
                                    'label' => 'Foto Tanda Jasa KEP NARARYA',
                                    'name' => 'foto_tanda_jasa',
                                ])

                                @include('components.file-input', [
                                    'label' => 'Foto Kartu NPWP',
                                    'name' => 'foto_kartu_npwp',
                                ])

                                <div class="bg-white my-4 p-4 rounded-lg">
                                    <p class="mb-2">Foto Rekening Tabungan Bank BTN<span class="text-red-500">*</span></p>

                                    <label for="file-input" class="sr-only">Choose file</label>
                                    <input type="file" name="foto_rekening_buku_tabungan_btn" id="file-input"
                                        class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none file:bg-gray-50 file:border-0 file:me-4 file:py-3 file:px-4">

                                    <div class="flex lg:flex-row flex-col gap-2 mt-4">
                                        <div class="w-full lg:w-[50%]">
                                            <p class="mb-2">No Telephone</p>
                                            <input placeholder="Nomor Telephone"
                                                class=" p-2 border-2 rounded-lg border-gray-200 w-full outline-blue-400"
                                                name="telephone_btn">
                                        </div>

                                        <div class="w-full lg:w-[50%]">
                                            <p class="mb-2">No Rekening</p>
                                            <input placeholder="Nomor Rekening"
                                                class=" p-2 border-2 rounded-lg border-gray-200 w-full outline-blue-400"
                                                name="rekening_btn">
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-white my-4 p-4 rounded-lg">
                                    <p class="mb-1">PASS PHOTO 4x6 Suami<span class="text-red-600">*</span></p>
                                    <p class="text-sm opacity-70 mb-2"><span class="text-red-600">!</span> Foto Pangkat
                                        Terakhir
                                        dan tampak jelas pangkat dan lokasinya</p>

                                    <label for="file-input" class="sr-only">Choose file</label>
                                    <input type="file" name="pasphoto_berwarna_suami" id="file-input"
                                        class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none file:bg-gray-50 file:border-0 file:me-4 file:py-3 file:px-4">
                                </div>

                                <div class="bg-white my-4 p-4 rounded-lg">
                                    <p class="mb-1">PASS PHOTO 4x6 Istri<span class="text-red-600">*</span></p>
                                    <p class="text-sm opacity-70 mb-2"><span class="text-red-600">!</span> Pakaian Persit
                                        dan
                                        berlencana persit</p>

                                    <label for="file-input" class="sr-only">Choose file</label>
                                    <input type="file" name="pasphoto_berwarna_istri" id="file-input"
                                        class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none file:bg-gray-50 file:border-0 file:me-4 file:py-3 file:px-4">
                                </div>

                                <button
                                    class="p-3 bg-green-500 w-full rounded-lg mt-2 mb-10 text-white font-semibold">Upload
                                    Document</button>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="w-full lg:w-[50%] m-auto pb-20">
                        <div class="flex justify-between flex-col lg:flex-row items-center">
                            <p class="font-semibold my-4 lg:my-10 text-xl font-poppins text-black">Document Pengajuan
                                Pensiun</p>
                            <div class="flex gap-4 lg:gap-6 lg:my-10 mb-0">
                                <button id="print"
                                    class="bg-gray-600 w-full flex mb-4 lg:mb-0 gap-4 font-semibold items-center px-6 py-3 rounded-md text-white"><svg
                                        stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512"
                                        height="18px" width="18px" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M128 0C92.7 0 64 28.7 64 64v96h64V64H354.7L384 93.3V160h64V93.3c0-17-6.7-33.3-18.7-45.3L400 18.7C388 6.7 371.7 0 354.7 0H128zM384 352v32 64H128V384 368 352H384zm64 32h32c17.7 0 32-14.3 32-32V256c0-35.3-28.7-64-64-64H64c-35.3 0-64 28.7-64 64v96c0 17.7 14.3 32 32 32H64v64c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V384zM432 248a24 24 0 1 1 0 48 24 24 0 1 1 0-48z">
                                        </path>
                                    </svg> Print</button>
                            </div>
                        </div>

                        @foreach ($ii as $i)
                            <div class="m-auto p-4 rounded-lg bg-white border border-gray-200 mb-2">
                                <div class="flex justify-between items-center mb-4">
                                    <p class="uppercase text-xl font-semibold text-black">
                                        {{ str_replace('_', ' ', $i) }}</p>
                                    @if ($document[$i] == null)
                                        <a href="" class="text-red-500">Upload</a>
                                    @else
                                        <a href="{{ asset('') }}storage/document/{{ $document[$i] }}"
                                            download="{{ $document[$i] }}" class="text-green-500">Download</a>
                                    @endif
                                </div>

                                @if ($document[$i] == null)
                                    <div class="w-full h-96 flex justify-center items-center">
                                        <div class="opacity-80 flex flex-col items-center">
                                            <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24"
                                                stroke-linecap="round" stroke-linejoin="round" height="200px" width="200px"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M3 7v4a1 1 0 0 0 1 1h3"></path>
                                                <path d="M7 7v10"></path>
                                                <path
                                                    d="M10 8v8a1 1 0 0 0 1 1h2a1 1 0 0 0 1 -1v-8a1 1 0 0 0 -1 -1h-2a1 1 0 0 0 -1 1z">
                                                </path>
                                                <path d="M17 7v4a1 1 0 0 0 1 1h3"></path>
                                                <path d="M21 7v10"></path>
                                            </svg>
                                            <p>Document Belum Di Upload</p>

                                            <a href="/upload/{{ $i }}"
                                                class="py-2 px-3 bg-blue-500 rounded text-white mt-3">Upload
                                                Document</a>
                                        </div>
                                    </div>
                                @else
                                    @if ($i == 'foto_rekening_buku_tabungan_btn')
                                        <div class="flex gap-4 pb-4">
                                            <div class="w-[50%] bg-gray-50 p-4 rounded-sm">
                                                <p>No Telephone</p>
                                                <p>{{ $document->telephone_btn }}</p>
                                            </div>
                                            <div class="w-[50%] bg-gray-50 p-4 rounded-sm">
                                                <p>No Rekening</p>
                                                <p>{{ $document->rekening_btn }}</p>
                                            </div>
                                        </div>
                                    @endif
                                    <img class="m-auto w-full rounded-md"
                                        src="{{ asset('') }}storage/document/{{ $document[$i] }}" />
                                @endif
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

        <div id="print-area"></div>
    </main>

    <style>
        #progress-div {
            display: none;
            width: 100%;
            background-color: #f3f3f3;
            border: 1px solid #ccc;
            margin-top: 20px;
            height: 25px;
        }

        #progress-bar {
            height: 25px;
            background-color: #4caf50;
            width: 0%;
            border-radius: 5px;
            text-align: center;
            color: white;
        }
    </style>
@endsection

@section('javascript')
    <script>
        $(document).ready(function() {
            $('#uploadForm').ajaxForm({
                beforeSend: function() {
                    Swal.fire({
                        title: 'Uploading...',
                        html: '<div id="swal-progress-bar" style="width: 100%; background: #ccc;"><div style="width: 0%; background: #4caf50; height: 24px; color: #fff; text-align: center;">0%</div></div>',
                        allowOutsideClick: false,
                        showConfirmButton: false
                    });
                },
                uploadProgress: function(event, position, total, percentComplete) {
                    var percentValue = percentComplete + '%';
                    $('#swal-progress-bar div').width(percentValue).html(percentValue);
                },
                success: function() {
                    $('#swal-progress-bar div').width('100%').html('100%');
                },
                complete: function(xhr) {
                    Swal.fire({
                        text: "Document Berhasil Di Upload",
                        icon: "success"
                    }).then(function() {
                        location.reload();
                    });
                }
            });

        });
    </script>

    <script>
        const files = [
            'dcpp',
            'permohonan',
            'foto_inpasing',
            'foto_kep_kp_akhir',
            'foto_kep_mpp',
            'foto_kartu_asabri',
            'foto_kpi',
            'foto_ku_107',
            'foto_surat_nikah',
            'foto_kk',
            'foto_ktp',
            'foto_surat_kelahiran',
            'surat_keterangan_kuliah_anak',
            'ku_i',
            'foto_tanda_jasa',
            'foto_kartu_npwp',
            'foto_rekening_buku_tabungan_btn',
            'pasphoto_berwarna_suami',
            'pasphoto_berwarna_istri',
        ];

        function getDocument(params) {
            const base_url = $('meta[name=base-url]').attr('content')
            fetch(base_url + '/api/document/' + $('input[name=user-id]').val(), {
                method: 'GET'
            }).then(response => response.json()).then(response => {
                const data = response.data
                let html =
                    `
                    <div style="display: grid; place-items: center; width: 100%; height: 100vh;">
                        <div>
                            <p>Nama: ${data.user.name}</p>
                            <p>Pangkat: ${data.user.rank}</p>
                            <p>Pensiun: ${data.user.pension}</p>
                        </div>
                    </div>
                `

                files.map((file) => {
                    if (data[file] != null) {
                        html +=
                            `
                            <div class="page" style='display: flex; flex-direction: column;'>
                                <div style="margin-bottom: 20px; width: 100%;">
                                    <p style="margin-bottom: 14px;">${file === 'foto_rekening_buku_tabungan_btn' ? `<p>Nomor Telephone: ${data.telephone_btn}</p>`:''}</p>
                                    <p style="margin-bottom: 16px;">${file === 'foto_rekening_buku_tabungan_btn' ? `<p>Nomor Rekening: ${data.rekening_btn}</p>`:''}</p>
                                </div>
                                <img src="/storage/document/${data[file]}" />
                                <p class="my-10 uppercase">${file}</p>
                            </div>
                        `
                    }
                })


                $('#print-area').html(html);
            })
        }

        getDocument()

        $('#print').on('click', function() {
            $('#print-area').print()
        })
    </script>
@endsection
