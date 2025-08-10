<div class="w-full">
        <label for="{{ $name }}" class="block mb-2 text-sm font-medium text-gray-100">{{$title}}</label>
        <input value="{{ $dt ? $dt->{$name} : old($name) }}" type="datetime-local" name="{{ $name }}" 
        id="{{ $name }}" 
        class="bg-[#2a2d4a] border border-gray-600 text-gray-100 text-sm rounded-lg focus:ring-[#4A69FF] focus:border-[#4A69FF] block w-full p-2.5" required>
    @error($name)
            <p class="mt-3 italic text-red-500 "> {{ $message }} </p>
    @enderror
</div>