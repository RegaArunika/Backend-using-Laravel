<x-admin-layout>
    <section class="pb-20 pt-5">
        <div class="relative overflow-x-auto shadow-md p-4 bg-white">        
            <form enctype="multipart/form-data" action="{{ (isset($produk)) ? route('produk.update', $produk->id_produk) : route('produk.store') }}" method="POST">
                @csrf
                @if(isset($produk)) @method('PUT') @endif
                <div></div>
                <div class="mb-6">
                    <label for="kode_produk" class="block mb-2 text-sm font-semibold text-gray-900 dark:text-white">Kode</label>
                    <input type="text" id="kode_produk" name="kode_produk" value="{{ (isset($produk)) ? $produk->kode_produk : old('kode_produk') }}" class="px-2 shadow-sm py-2 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Kode ......." required>
                    @error('kode_produk')
                        <div class="text-xs text-red-800">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="nama_produk" class="block mb-2 text-sm font-semibold text-gray-900 dark:text-white">Nama</label>
                    <input type="text" id="nama_produk" name="nama_produk" value="{{ (isset($produk)) ? $produk->nama_produk : old('nama_produk') }}" class="px-2 shadow-sm py-2 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Nama Sepatu....." required>
                    @error('nama_produk')
                        <div class="text-xs text-red-800">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="id_toko" class="block mb-2 text-sm font-semibold text-gray-900 dark:text-white">Toko</label>
                    <select id="id_toko" name="id_toko" class="px-2 shadow-sm py-3 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                        <option value="">Pilih Toko</option>
                        @foreach($toko as $item)
                            <option value="{{ $item->id_toko }}" {{ (isset($produk) && $produk->id_toko == $item->id_toko) || old('id_toko') == $item->id_toko ? 'selected' : '' }}>
                                {{ $item->nm_toko }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_toko')
                        <div class="text-xs text-red-800">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="desk_produk" class="block mb-2 text-sm font-semibold text-gray-900 dark:text-white">Deskripsi</label>
                    <textarea name="desk_produk" id="desk_produk" cols="30" rows="10" class="px-2 shadow-sm py-2 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Deskripsi......." required>{{ (isset($produk)) ? $produk->desk_produk : old('desk_produk') }}</textarea>
                    @error('desk_produk')
                        <div class="text-xs text-red-800">{{ $message }}</div>
                    @enderror
                </div>  
                <div class="mb-6">
                    <label for="harga" class="block mb-2 text-sm font-semibold text-gray-900 dark:text-white">Harga</label>
                    <textarea name="harga" id="harga" cols="30" rows="10" class="px-2 shadow-sm py-2 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Rp." required>{{ (isset($produk)) ? $produk->desk_produk : old('desk_produk') }}</textarea>
                    @error('desk_produk')
                        <div class="text-xs text-red-800">{{ $message }}</div>
                    @enderror
                </div> 
                <div class="mb-6">
                    <label for="lokasi" class="block mb-2 text-sm font-semibold text-gray-900 dark:text-white">Lokasi</label>
                    <input type="text" id="lokasi" name="lokasi" value="{{ (isset($produk)) ? $produk->lokasi : old('lokasi') }}" class="px-2 shadow-sm py-2 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="JL...." required>
                    @error('lokasi')
                        <div class="text-xs text-red-800">{{ $message }}</div>
                    @enderror
                </div> 
                <div class="mb-6">
                    <label for="img_produk" class="block mb-2 text-sm font-semibold text-gray-900 dark:text-white">File Gambar</label>
                    <input type="file" id="img_produk" name="img_produk" class="px-2 shadow-sm py-2 bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                    @error('img_produk')
                        <div class="text-xs text-red-800">{{ $message }}</div>
                    @enderror
                </div>                 
                <button type="submit" class="py-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-sm text-sm px-5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </form>
        </div>
    </section>
</x-admin-layout>
