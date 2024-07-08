<x-admin-layout>
    <div class="w-full">
        <div class="flex">
            <a href="{{ route('toko.create') }}">
                <button class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded mt-10">
                    Tambah Data
                </button>
            </a>
            <button class="bg-yellow-500 hover:bg-yellow-400 text-white font-bold py-2 px-4 border-b-4 border-yellow-700 hover:border-yellow-500 rounded mt-10 ml-3">Publish</button>
        </div>
            
            <form action="{{ route('toko.index') }}" method="GET" class="mt-6">
                <h2 class="text-md text-bold font-bold">Search Brand</h2>
                <div class="flex items-center"> <!-- Added 'items-center' class to center items vertically -->
                    <select id="id_produk" name="id_produk" class="bg-gray-50 border p-3 border-gray-300 text-gray-900 text-sm rounded-l-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Pilih Brand</option>
                        @foreach($toko as $item)
                            <option value="{{ $item->id_toko }}" {{ (isset($_GET['id_toko']) && $_GET['id_toko'] == $item->id_toko) ? 'selected' : '' }}>{{ $item->nm_toko }}</option>
                        @endforeach
                    </select>
                    <div class="flex w-full"> <!-- Changed 'div' to 'flex' and 'w-full' to take full width -->
                        <input type="text" name="s" id="search-dropdown" value="{{ (isset($_GET['s'])) ? $_GET['s'] : '' }}" class="w-[300] block py-2 px-2 z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder=" Nama Sepatu...">
                        <button type="submit" class="py-3 px-3 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                            <span class="sr-only">Search</span>
                        </button>
                    </div>
                </div>
            </form>                     
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mt-10 border-collapse border border-gray-400 table-auto">
            <thead class="text-xs text-gray-700 uppercase bg-slate-50 dark:bg-gray-700 dark:text-gray-200">
                <tr>
                    <th scope="col" class="px-6 py-3 border border-gray-400">
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-3 border border-gray-400">
                        Deskripsi
                    </th>

                    <th scope="col" class="px-6 py-3 border border-gray-400">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($toko as $item)
                <tr class="bg-white  border border-gray-400">
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white border border-gray-400">
                        {{ $item->nm_toko }}
                    </td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white border border-gray-400">
                        {{ $item->desk_toko}}
                    </td>
                    <td class="px-6 py-4 flex  ">
                        <a href="{{ route('toko.edit', $item->id_toko) }}"  class="font-medium text-blue-600 dark:text-blue-500 hover:underline mr-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001"/>
                              </svg>
                          </a>
                          <form action="{{ route('toko.destroy', $item->id_toko) }}" class="font-medium text-red-600 dark:text-blue-500 hover:underline mr-2
                             ml-3" method="POST">
                              @csrf @method('DELETE')
                              <button type="submit" onclick="return confirm('Anda Yakin')"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash2-fill" viewBox="0 0 16 16">
                                <path d="M2.037 3.225A.703.703 0 0 1 2 3c0-1.105 2.686-2 6-2s6 .895 6 2a.702.702 0 0 1-.037.225l-1.684 10.104A2 2 0 0 1 10.305 15H5.694a2 2 0 0 1-1.973-1.671L2.037 3.225zm9.89-.69C10.966 2.214 9.578 2 8 2c-1.58 0-2.968.215-3.926.534-.477.16-.795.327-.975.466.18.14.498.307.975.466C5.032 3.786 6.42 4 8 4s2.967-.215 3.926-.534c.477-.16.795-.327.975-.466-.18-.14-.498-.307-.975-.466z"/>
                              </svg>
                              </button>
                          </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="m-4">
            {{-- {{ $toko->appends(request()->query())->links() }} --}}
        </div> 
    </div>         
</x-admin-layout>