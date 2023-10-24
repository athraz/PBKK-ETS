<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Detail Barang #') }}{{$barangs->id}}
            </h2>
            <div class="flex justify-end items-center">
                <a href="/barang/{{$barangs->id}}/edit" class="mx-2">
                    <x-primary-button>
                        {{ __('Ubah Barang') }}
                    </x-primary-button>
                </a>
                <form method="POST" action="/barang/{{ $barangs->id }}" onsubmit="return confirm('Apakah yakin mau hapus barang?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        {{ __('Hapus Barang') }}
                    </button>
                </form>
            </div>
        </div>
    </x-slot>

    <div class="w-1/2 p-4">
        <div class="bg-white shadow-lg rounded-lg p-4" style="display: flex; flex-direction: column; overflow: hidden;">
            <div class="flex" style="height: 100%;">
                <div class="w-1/2" style="height: 100%; overflow: hidden;">
                    <img src="{{asset('storage/foto-barang/'.$barangs->gambar)}}" class="w-full h-auto object-cover rounded-lg" style="max-height: 100%;">
                </div>
                <div class="w-1/2 p-4" style="height: 100%; overflow: hidden;">
                    <p class="text-gray-600">Jenis: {{$barangs->jenis->nama}}</p>
                    <p class="text-gray-600">Kondisi: {{$barangs->kondisi->nama}}</p>
                    <p class="text-gray-600">Keterangan: {{$barangs->keterangan}}</p>
                    @if (isset($barangs->kecacatan))
                    <p class="text-gray-600">Kecacatan: {{$barangs->kecacatan}}</p>
                    @endif
                    <p class="text-gray-600 mb-2">Jumlah: {{$barangs->jumlah}}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>