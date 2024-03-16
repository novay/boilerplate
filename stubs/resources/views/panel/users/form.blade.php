<div class="flex justify-between items-center py-3 px-4 bg-white border-b dark:border-gray-700 rounded-t-lg">
    <h3 class="font-bold text-gray-800 dark:text-white">
        {{ $subtitle }}
    </h3>
</div>
<div class="p-4 pb-6 space-y-4 bg-gray-50">
    <x-splade-input name="name" :label="___('Nama')" data-required placeholder="eg. Novianto Rahmadi"></x-splade-input>
    <x-splade-input name="email" :label="___('Username (Surel)')" data-required placeholder="eg. novay@btekno.id"></x-splade-input>
    @isset($edit)
        <div class="space-y-1">
            <x-splade-input name="password" type="password" :label="___('Password')" :placeholder="___('Minimal 5 karakter')"></x-splade-input>
            <p class="text-xs text-gray-500 ps-0.5">
                {{ ___('Kosongkan bila tidak ada perubahan.') }}
            </p>
        </div>
    @else 
        <x-splade-input name="password" type="password" :label="___('Password')" data-required :placeholder="___('Minimal 5 karakter')"></x-splade-input>
    @endif

    <x-splade-input name="phone" type="number" :label="___('Nomor Telepon/WA')" placeholder="eg. 8115555573" prepend="+62"></x-splade-input>
    <x-splade-textarea name="address" :label="___('Alamat')" :placeholder="___('eg. Perumahan Citra Gading Residence Ruko A20, Sambutan, Samarinda')" rows="3" autosize></x-splade-textarea>
</div>
<div class="flex justify-end items-center gap-x-1.5 py-2 px-2.5 bg-white border-t dark:border-gray-700 rounded-b-lg">
    <button type="button" @click="modal.close" class="py-1.5 px-2.5 inline-flex items-center gap-x-2 text-sm font-medium rounded border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
        {{ ___('Tutup') }}
    </button>
    <x-splade-submit label="{{ isset($edit) ? ___('Simpan Perubahan') : ___('Simpan') }}"></x-splade-submit>
</div>