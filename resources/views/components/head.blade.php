 <div class="w-full lg:w-[60%] m-auto p-6 rounded-lg bg-white border border-gray-200 shadow-sm">
     <div class="flex lg:flex-row flex-col items-center justify-center">
         <div class="flex lg:flex-row flex-col items-center justify-center">
             <div class="flex flex-col m-auto lg:text-start text-center items-center gap-3 lg:gap-6">
                 <div style="background-image: url('{{ asset('storage/profile/' . $user->profile) }}'); background-size: cover;"
                     class="w-32 h-32 rounded-full bg-gray-200 ">
                 </div>
                 <div class="text-center">
                     <p>Selamat Datang</p>
                     <p class="text-xl font-poppins font-semibold text-black">{{ $user->rank }}
                         {{ $user->name }}
                     </p>
                     <p class="text-red-500 mt-1">Pensiun Pada Tanggal
                         {{ $user->pension }}</p>
                 </div>
             </div>
         </div>
     </div>

     <p class="my-6 lg:mt-10 lg:mb-4 text-xl font-semibold font-poppins text-black">
         informasi
     </p>

     <div class="flex gap-x-4 lg:flex-row flex-col">
         <div class="w-full mb-4 lg:mb-0 lg:w-2/4 bg-gray-50 p-4 rounded-lg">
             <p class="opacity-80">Pangkat</p>
             <p class="text-lg">{{ $user->rank }}</p>
         </div>
         <div class="w-full mb-4 lg:mb-0 lg:w-2/4 bg-gray-50 p-4 rounded-lg">
             <p class="opacity-80">NRP</p>
             <p class="text-lg">{{ $user->nrp }}</p>
         </div>
     </div>

     <div class="flex mt-0 lg:mt-4 gap-x-4 lg:flex-row flex-col">
         <div class="w-full mb-4 lg:mb-0 lg:w-2/4 bg-gray-50 p-4 rounded-lg">
             <p class="opacity-80">Pensiun</p>
             <p class="text-lg">{{ $user->pension }}</p>
         </div>
         <div class="w-full mb-4 lg:mb-0 lg:w-2/4 bg-gray-50 p-4 rounded-lg">
             <p class="opacity-80">Tanggal Lahir</p>
             <p class="text-lg">{{ $user->birth }}</p>
         </div>
     </div>

     @if ($showButton)
         <a href="{{ route('upload') }}"
             class=" block text-center p-3 bg-green-500 w-full rounded-lg mt-3 text-white font-semibold">
             Upload atau Lihat Document Pensiun
         </a>
     @endif
 </div>
