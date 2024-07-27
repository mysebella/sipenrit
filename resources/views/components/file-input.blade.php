<div class="bg-white my-4 p-4 rounded-lg border-">
    <p class="mb-2">{{ $label }}<span class="text-red-500">*</span></p>
    <label for="file-input" class="sr-only">Choose file</label>
    <input type="file" name="{{ $name }}" id="file-input"
        class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none file:bg-gray-50 file:border-0 file:me-4 file:py-3 file:px-4">
</div>
