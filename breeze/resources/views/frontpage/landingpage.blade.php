<x-home-layout>
   {{-- slider --}}

  {{-- slider end --}}
  <div class="py-12">
   <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
       <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
           <div class="p-6 bg-white border-b border-gray-200">
               <main class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                  <div class="flex items-baseline justify-between border-b border-gray-500 pt-2 pb-6">
                     <h1 class="text-4xl font-bold tracking-tight text-gray-900">Original Shoes </h1>
                     <div class="flex items-center">
                        <div date-rangepicker class="flex items-center">
                           <div class="relative">
                              <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                 <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAcNJREFUSEvtlu1twjAQhu8U9miYBJikIGGSLUq3SDBS6SSlkzTdg8TVmRiMcXIXoYg/9U8n9nPn974QnrTwSVwQg/M8T+F0SgExBWOqYr8/PmJ0L9jCmmZpjHnrgFSI+FnsdtuhRnSC8/V6bhC/hBcONiAKzjebbeDlARF/oWmOMJlU1pi6nhuAGQAsnXGI+C71/g4ceFqhMas+PXOllgaApEjJADRmIdH/Dpwp9eMuKbUWBR/FgqlrkoXgVan1lJPo5uJMqQ/3dFLLHaD1nM7TOpRar/rgIdh5eyy1XnBWh98zpcjrucTrEGysTgCrQuvDULAflJgk06IozoEYWRew/1Tcoa7L/MDkpLqCvRSSBlVoQBtkJBdwqXUFewWDs1bkMSPXFXxOCZG1neBzTtvI5uQaK6qBk6s7jwdGdlDxhuVxWIEwSRZ9KXEpHp5MtMd526bsrWJ3tZppe5EuxnobBdNmtDsBfLsBwOvTL353al0QtUiuH1OE2q7DLKpQNJG4FsnCpRPIa5cBfqEIGkUvXNT27PP7MxdtdMxdUrgYzL21/10CHwVsX8ivYpGRaDSwB5/FhoJRwX3y/IOHBO9D//4BKy4qLj/Tm9UAAAAASUVORK5CYII="/>
                              </div>
                              <input name="start" type="text" class="bg-gray-50 border border- gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w- full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text- white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Produk">
                           </div>
                        </div>
                        <button type="button" class="inline-block mx-4 px-6 py-2 border-2 border-blue-600 text-blue-600 font-medium text-xs leading-tight uppercase rounded-r-md hover:bg-indigo-100 hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-
                           150 ease-in-out">Check</button>
                     </div>
                  </div>
                  <section class="">
                    @foreach ($produk as $key=>$item)
                    <div class="md:flex font-sans pt-8 mb-10">
                       <div class="md:shrink-0 transition-transform transform-origin-top-left group-hover:scale-110">
                          <img src="{{ $item->img_produk }}" alt="" class="w-full md:h-full md:w-96 inset-0 h-full object-cover rounded-lg" loading="lazy" />
                       </div>
                       <form class="p-6">
                          <div class="flex flex-wrap">
                             <h1 class="flex-auto font-bold text-slate-900">{{ $item->toko->nm_toko }}</h1>
                             <div class="w-full flex-none mt-2 order-1 text-3xl font-bold text-violet-600">
                                {{ $item->nama_produk }}
                             </div>
                             <div class="text-sm font-medium text-slate-400 flex "> Rekomendasi
                                <svg width="20" height="20" fill="currentColor" aria-hidden="true" class="text-red-600">
                                   <path fill-rule="evenodd" clip-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" />
                                </svg>
                             </div>
                          </div>
                          <div class="flex items-baseline mt-4 mb-2 pb-6 border-b border-slate-200">
                             {{ $item->desk_produk }}
                           </div>
                           <div class="flex">
                              <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAgVJREFUSEvtV1tOg0AUPUNdSLsIMX7ZBk1mF8pKWlYi7mISJe2fERdhF2IZc4GBOzMMjdikmtikCeE+zn2eGQTO9BNnwsUocCHLB0DPpwRXIdpd4HO/Utf7Ifsg8IsstwJYTgHtbXQWocqHwAeBC/m2AcT6Z6DGWmeJutq4vjzgrXydV5h9tIr7RMULerbf986aduCRdCIcFia7Qpbko24Tf28C8IB5thXE6k5d7kj5Wb4vI+gtPYfeA0gTFeekY1fNz9oC5llpYHer4pWJkDtKVGzZ9dnZAHxO3KwtB2OKTNaVvw+qKasbbJsIVamWzXBITSs64GOlKWSpGyC/bIUsqcfUa/jVsAa1awUDHh4Sf7CQJypO+ZRyYLekoaHsgPnwuFlxx+6UOltA4jzCIWPT3VWDBxXsMfVEAMQ6RCIee5GcUAIkQ3Yk72zd/lvAdtYefXjObA2dAeJ+KEh3BduAe/MhYJO56SvpCOi1aKpA/7yCeDL7TkOqIW5aOTmvq8V3fxTYVZxCnyHS+VvAoaNy6BQ6Scb8MBgpe0cQY/z+rVLz0yYE7K7MqTIeocyeFjll/gObXT9GIGkF0V3UzCXAEAbvcwRNjFWfTrT/RhahWpor1CiBNDeH/soyhTQCNt4ZHrr6BDl3YjDWmnml5k5pIieCWGa8r1zwO78kTpFxyMfZMv4CvAWyLt6w9wUAAAAASUVORK5CYII=" class="mb-5 px-2"/>
                              {{ $item->lokasi }}
                           </div>
                           <div class="flex-auto font-bold text-slate-900 mb-2">
                             Rp. {{ $item->harga }} 
                           </div>
                             <div class="flex space-x-4 mb-5 text-sm font-medium">
                             <div class="flex-auto flex space-x-4">
                                <button class="h-10 px-6 font-semibold rounded-full bg-violet-600 text-white" type="">
                                  <a href="keranjang">Pesan Sekarang</a>
                                </button>
                                <button class="h-10 px-6 font-semibold rounded-full border border-slate-300 text-slate-900">
                                  <a href="notflix">Detail</a>
                                </button>
                             </div>
                          </div>
                          <p class="text-sm text-slate-500 mb-2">Original Shoes</p>
                         
                       </form>
                    </div>
                    @endforeach
                    <div class=" font-sans pt-8 text-center">
                       <a href="#" class="inline-flex items-center py-2 px-4 text-sm font- medium text-gray-500 bg-white rounded-lg border border-gray-300 hover:bg-gray-100 hover:text- gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                       Previous
                       </a>
                       <!-- Next Button -->
                       <a href="#" class="inline-flex items-center py-2 px-4 ml-3 text-sm font- medium text-gray-500 bg-white rounded-lg border border-gray-300 hover:bg-gray-100 hover:text- gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                       Next
                       </a>
                    </div>
                  </section>
               </main>
           </div>
       </div>
   </div>

   {{-- Modal form untuk cek availibility --}}
   <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="exampleModalLg" tabindex="-1" aria-labelledby="exampleModalLgLabel" aria-modal="true" role="dialog">
       <div class="modal-dialog modal-lg relative w-auto pointer-events-none">
           <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current"></div>
       </div>
   </div>
</div>

    
 </x-home-layout>
