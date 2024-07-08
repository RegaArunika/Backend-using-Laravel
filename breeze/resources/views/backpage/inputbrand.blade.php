<x-admin-layout>
    <section class="pb-20 pt-5">
        <div class="relative overflow-x-auto shadow-md p-4 bg-white">        
            <form enctype="multipart/form-data" action="{{ isset($toko) ? route('toko.update', $toko->id_toko) : route('toko.store') }}" method="POST">
                @csrf
                @if(isset($toko))
                    @method('PUT')
                @endif
            
                <div>
                    <label for="nm_toko">Nama Toko</label>
                    <input type="text" id="nm_toko" name="nm_toko" value="{{ isset($toko) ? $toko->nm_toko : old('nm_toko') }}" required>
                </div>
            
                <div>
                    <label for="desk_toko">Deskripsi Toko</label>
                    <textarea id="desk_toko" name="desk_toko" required>{{ isset($toko) ? $toko->desk_toko : old('desk_toko') }}</textarea>
                </div>
            
                <div>
                    <button type="submit">{{ isset($toko) ? 'Update' : 'Create' }}</button>
                </div>
            </form>
        </div>
    </section>
</x-admin-layout>
