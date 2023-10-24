<x-guest-layout>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight flex justify-center">
        {{ __('Tambah Barang') }}
    </h2>

    <form method="POST" action="{{ route('barang') }}" enctype="multipart/form-data">
        @csrf

        <!-- Jenis -->
        <div class="mt-4">
            <x-input-label for="jenis" :value="__('Jenis')" />
            <select id="jenis" name="jenis" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full">
                <option value="0" selected>-</option>
                @foreach ($jeniss as $item)
                <option value="{{$item->id}}">{{$item->nama}}</option>
                @endforeach
            </select>

            <x-input-error :messages="$errors->get('jenis')" class="mt-2" />
        </div>

        <!-- Kondisi -->
        <div class="mt-4">
            <x-input-label for="kondisi" :value="__('Kondisi')" />
            <select id="kondisi" name="kondisi" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full">
                <option value="0" selected>-</option>
                @foreach ($kondisis as $item)
                <option value="{{$item->id}}">{{$item->nama}}</option>
                @endforeach
            </select>

            <x-input-error :messages="$errors->get('jenis')" class="mt-2" />
        </div>

        <!-- Keterangan -->
        <div class="mt-4">
            <x-input-label for="keterangan" :value="__('Keterangan')" />
            <textarea id="keterangan" name="keterangan" rows="3" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"></textarea>
            <x-input-error :messages="$errors->get('keterangan')" class="mt-2" />
        </div>

        <!-- Kecacatan -->
        <div class="mt-4">
            <x-input-label for="kecacatan" :value="__('Kecacatan')" />
            <textarea id="kecacatan" name="kecacatan" rows="3" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"></textarea>
            <x-input-error :messages="$errors->get('kecacatan')" class="mt-2" />
        </div>

        <!-- Jumlah -->
        <div class="mt-4">
            <x-input-label for="jumlah" :value="__('Jumlah')" />
            <x-text-input id="jumlah" class="block mt-1 w-full" type="text" name="jumlah" :value="old('jumlah')" autofocus autocomplete="jumlah" />
            <x-input-error :messages="$errors->get('jumlah')" class="mt-2" />
        </div>

        <!-- Gambar -->
        <div class="mt-4">
            <x-input-label for="gambar" :value="__('Gambar')" />
            <input id="gambar" name="gambar" type="file" class="block w-full text-sm text-slate-500 file:text-sm file:font-semibold file:py-2 file:px-4 file:bg-violet-50 file:text-violet-700 file:rounded-full file:border-0 file:mr-4 hover:file:bg-violet-100" />
            <x-input-error :messages="$errors->get('gambar')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a href="/barang">
                <x-primary-button type="button">
                    {{ __('Kembali') }}
                </x-primary-button>
            </a>
            <x-primary-button type="submit" class="ml-4">
                {{ __('Tambah') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>