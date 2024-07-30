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
                <div class="w-full lg:w-[50%] m-auto p-6 rounded-lg">
                    <p class="text-lg font-semibold font-poppins text-black">Upload Document
                        {{ str_replace('_', ' ', $document) }}</p>
                    <div>
                        <form id="uploadForm" action="/upload/update/{{ $document }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            @if ($document === 'foto_rekening_buku_tabungan_btn')
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

                                <button class="w-full p-4 rounded-lg bg-green-500 font-semibold text-white">Kirim</button>
                            @else
                                @include('components.file-input', [
                                    'label' => str_replace('_', ' ', $document),
                                    'name' => $document,
                                ])

                                <button class="w-full p-4 rounded-lg bg-green-500 font-semibold text-white">Kirim</button>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
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
                        text: "Document Berhasil Di Update",
                        icon: "success"
                    }).then(function() {
                        location.href = "/upload";
                    });
                }
            });

        });
    </script>
@endsection
