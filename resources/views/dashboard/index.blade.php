@extends('_layout.app-container')

@section('content')
    <main class="relative w-full h-dvh overflow-hidden">
        <nav class="w-full font-poppins h-20 border-b-2 border-gray-100 flex justify-between items-center p-4">
            <div class="flex gap-3 items-center">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/1f/Insignia_of_the_Indonesian_Army.svg/170px-Insignia_of_the_Indonesian_Army.svg.png"
                    class="w-10 m-auto" />
                <p class="text-black font-semibold text-2xl">Admin Sipenrit</p>
            </div>
            <a href="{{ route('logout') }}"
                class=" text-red-500 w-10 items-center flex justify-center h-10 border-2 border-red-500 rounded-md hover:bg-red-500 hover:text-white">
                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="20px"
                    width="20px" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V256c0 17.7 14.3 32 32 32s32-14.3 32-32V32zM143.5 120.6c13.6-11.3 15.4-31.5 4.1-45.1s-31.5-15.4-45.1-4.1C49.7 115.4 16 181.8 16 256c0 132.5 107.5 240 240 240s240-107.5 240-240c0-74.2-33.8-140.6-86.6-184.6c-13.6-11.3-33.8-9.4-45.1 4.1s-9.4 33.8 4.1 45.1c38.9 32.3 63.5 81 63.5 135.4c0 97.2-78.8 176-176 176s-176-78.8-176-176c0-54.4 24.7-103.1 63.5-135.4z">
                    </path>
                </svg>
            </a>
        </nav>

        <div class="w-full flex h-dvh">
            <div class="w-[20%] h-full border-r-2 border-gray-100 shadow-sm text-black hidden lg:block">
                <ul>
                    <a class="block" href="{{ route('dashboard') }}">
                        <li class="p-6 border-b border-gray-100 hover:bg-gray-50">Daftar Anggota</li>
                    </a>
                </ul>
            </div>

            <div class="w-[30%] h-full border-r-2 border-gray-100 shadow-sm text-black hidden lg:block">
                <div class="p-6">
                    <p class="text-xl text-black font-poppins font-semibold">Daftar Pengajuan</p>
                </div>


                <ul>
                    @foreach ($users as $a)
                        <a class="block" href="{{ route('dashboard.show', ['nrp' => $a->nrp]) }}">
                            <li class="p-6 flex justify-between items-center border-b border-gray-100 hover:bg-gray-50">
                                <div>
                                    <p>
                                        {{ $a->rank }} {{ $a->name }}
                                    </p>
                                    <p class="text-sm text-green-600">Pensiun {{ $a->pension }}</p>
                                </div>
                                <p class="bg-red-400 px-3 py-1 rounded-sm text-white">New</p>
                            </li>
                        </a>
                    @endforeach

                    @if (count($users) == 0)
                        <div class="h-96 grid place-items-center">
                            <div class="opacity-80">
                                <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24"
                                    stroke-linecap="round" stroke-linejoin="round" height="200px" width="200px"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3 7v4a1 1 0 0 0 1 1h3"></path>
                                    <path d="M7 7v10"></path>
                                    <path d="M10 8v8a1 1 0 0 0 1 1h2a1 1 0 0 0 1 -1v-8a1 1 0 0 0 -1 -1h-2a1 1 0 0 0 -1 1z">
                                    </path>
                                    <path d="M17 7v4a1 1 0 0 0 1 1h3"></path>
                                    <path d="M21 7v10"></path>
                                </svg>
                                <p>Belum ada yang mendaftar</p>
                            </div>
                        </div>
                    @endif
                </ul>
            </div>


            <input type="hidden" value="{{ @$user->id }}" name="user-id" />


            <div class="w-full lg:w-[70%] h-full p-4 lg:py-10 bg-gray-100 shadow-sm overflow-y-scroll">
                @if ($path === 'show')
                    @include('components.head', ['user' => $user, 'showButton' => false])
                    @if ($user->active == 'active')
                        <div class="w-full lg:w-[60%] m-auto pb-20">
                            <div class="flex justify-between flex-col my-4 lg:my-0 lg:flex-row items-center">
                                <p class="font-semibold my-4 lg:my-10 text-xl font-poppins text-black">Document <br
                                        class="hidden lg:block" />Pengajuan Pensiun
                                </p>
                                <div class="flex gap-4 lg:gap-4 lg:my-10 mb-0">
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
                                        <a href="{{ asset('') }}storage/document/{{ $user->document[0][$i] }}"
                                            download="{{ $user->document[0][$i] }}" class="text-green-500">Download</a>

                                    </div>

                                    @if ($user->document[0][$i] == null)
                                        <div class="w-full h-96 flex justify-center items-center">
                                            <div class="opacity-80">
                                                <svg stroke="currentColor" fill="none" stroke-width="2"
                                                    viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round"
                                                    height="200px" width="200px" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M3 7v4a1 1 0 0 0 1 1h3"></path>
                                                    <path d="M7 7v10"></path>
                                                    <path
                                                        d="M10 8v8a1 1 0 0 0 1 1h2a1 1 0 0 0 1 -1v-8a1 1 0 0 0 -1 -1h-2a1 1 0 0 0 -1 1z">
                                                    </path>
                                                    <path d="M17 7v4a1 1 0 0 0 1 1h3"></path>
                                                    <path d="M21 7v10"></path>
                                                </svg>
                                                <p>Document Belum Di Upload</p>
                                            </div>
                                        </div>
                                    @else
                                        @if ($i == 'foto_rekening_buku_tabungan_btn')
                                            <div class="flex gap-4 pb-4">
                                                <div class="w-[50%] bg-gray-50 p-4 rounded-sm">
                                                    <p>No Telephone</p>
                                                    <p>{{ $user->document[0]['telephone_btn'] }}</p>
                                                </div>
                                                <div class="w-[50%] bg-gray-50 p-4 rounded-sm">
                                                    <p>No Rekening</p>
                                                    <p>{{ $user->document[0]['rekening_btn'] }}</p>
                                                </div>
                                            </div>
                                        @endif
                                        <img class="m-auto w-full rounded-md"
                                            src="{{ asset('') }}storage/document/{{ $user->document[0][$i] }}" />
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div style="margin-top: 16px;"
                            class="w-full lg:w-[60%] m-auto p-10 rounded-lg bg-white border border-gray-200 shadow-sm">
                            <div class="flex flex-col items-center opacity-70">
                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 496 512"
                                    height="200px" width="200px" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm144 386.4V280c0-13.2-10.8-24-24-24s-24 10.8-24 24v151.4C315.5 447 282.8 456 248 456s-67.5-9-96-24.6V280c0-13.2-10.8-24-24-24s-24 10.8-24 24v114.4c-34.6-36-56-84.7-56-138.4 0-110.3 89.7-200 200-200s200 89.7 200 200c0 53.7-21.4 102.5-56 138.4zM205.8 234.5c4.4-2.4 6.9-7.4 6.1-12.4-4-25.2-34.2-42.1-59.8-42.1s-55.9 16.9-59.8 42.1c-.8 5 1.7 10 6.1 12.4 4.4 2.4 9.9 1.8 13.7-1.6l9.5-8.5c14.8-13.2 46.2-13.2 61 0l9.5 8.5c2.5 2.3 7.9 4.8 13.7 1.6zM344 180c-25.7 0-55.9 16.9-59.8 42.1-.8 5 1.7 10 6.1 12.4 4.5 2.4 9.9 1.8 13.7-1.6l9.5-8.5c14.8-13.2 46.2-13.2 61 0l9.5 8.5c2.5 2.2 8 4.7 13.7 1.6 4.4-2.4 6.9-7.4 6.1-12.4-3.9-25.2-34.1-42.1-59.8-42.1zm-96 92c-30.9 0-56 28.7-56 64s25.1 64 56 64 56-28.7 56-64-25.1-64-56-64z">
                                    </path>
                                </svg>
                                <p class="text-center my-6">{{ $user->name }} Belum mengupload document</p>
                            </div>
                        </div>
                    @endif
                @else
                    <div class="w-full my-4 lg:w-[50%] m-auto py-10 rounded-lg bg-white border border-gray-200 shadow-sm">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/1f/Insignia_of_the_Indonesian_Army.svg/170px-Insignia_of_the_Indonesian_Army.svg.png"
                            class="w-40 m-auto" />
                        <p class="text-center text-xl my-4">Selamat Datang Di SIPENRIT</p>
                    </div>
                    <div class="w-full my-4 lg:w-[50%] m-auto py-10 rounded-lg bg-white border border-gray-200 shadow-sm">
                        <p class="text-6xl text-center font-semibold text-green-500">
                            {{ count(App\Models\User::where('role', '!=', 'admin')->get()) }}
                        </p>
                        <p class="text-center text-xl my-4">Jumlah Personil Mendaftar</p>
                    </div>
                @endif
            </div>
        </div>

        <div id="print-area"></div>
    </main>
@endsection

@section('javascript')
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
                console.log(data)
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
