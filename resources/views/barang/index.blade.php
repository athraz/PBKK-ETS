<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            @if (session('status'))
            <div class="font-semibold text-xl text-gray-800 leading-tight">
                {{ session('status') }}
            </div>
            @else
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Berikut Barang yang Tersedia!') }}
            </h2>
            @endif
            
            <a href="/barang/create">
                <x-primary-button>
                    {{ __('Tambah Barang') }}
                </x-primary-button>
            </a>
        </div>
    </x-slot>

    <div class="flex flex-wrap justify-center p-4">
        @foreach($barangs as $barang)
        <div class="w-1/2 p-4">
            <div class="bg-white shadow-lg rounded-lg p-4" style="display: flex; flex-direction: column; overflow: hidden;">
                <div class="flex" style="height: 100%;">
                    <div class="w-1/2" style="height: 100%; overflow: hidden;">
                        <img src="{{asset('storage/foto-barang/'.$barang->gambar)}}" class="w-full h-auto object-cover rounded-lg" style="max-height: 100%;">
                    </div>
                    <div class="w-1/2 p-4" style="height: 100%; overflow: hidden;">
                        <p class="text-gray-600">Jenis: {{$barang->jenis->nama}}</p>
                        <p class="text-gray-600">Kondisi: {{$barang->kondisi->nama}}</p>
                        <p class="text-gray-600">Keterangan: {{strlen($barang->keterangan) > 50 ? substr($barang->keterangan, 0, 50) . "..." : $barang->keterangan}}</p>
                        @if (isset($barang->kecacatan))
                        <p class="text-gray-600">Kecacatan: {{strlen($barang->kecacatan) > 50 ? substr($barang->kecacatan, 0, 50) . "..." : $barang->kecacatan}}</p>
                        @endif
                        <p class="text-gray-600 mb-2">Jumlah: {{$barang->jumlah}}</p>
                        <a href="/barang/{{$barang->id}}">
                            <x-primary-button>
                                {{ __('Detail') }}
                            </x-primary-button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</x-app-layout>