<?php

namespace App\Tables;

use Illuminate\Http\Request;
use ProtoneMedia\Splade\SpladeTable;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\Facades\Splade;

use App\Models\User;

class UserTable extends AbstractTable
{
    protected $data, $route;

    public function __construct()
    {
        $this->data = new User;
        $this->route = 'panel.users';
    }

    public function authorize(Request $request): bool
    {
        return true;
    }

    public function for(): mixed
    {
        return $this->data->query();
    }

    public function configure(SpladeTable $table): void
    {
        $table->withGlobalSearch(columns: ['name', 'email'])
            ->defaultSort('name')
            ->column(key: 'name', label: ___('Name'), sortable: true)
            ->column(key: 'email', label: ___('Username (Surel)'), sortable: true, classes: 'w-72')
            ->column(key: 'password', label: ___('Sandi'), alignment: 'center', classes: 'w-28')
            ->column(key: 'phone', label: ___('Telepon/WA'), classes: 'w-48')
            ->column(key: 'address', label: ___('Alamat'), hidden: true)
            ->column(key: 'action', label: ___('Tindakan'), alignment: 'right', classes: 'w-44')
            // ->rowModal(function($item) { # ->rowSlideover(), ->rowLink()
            //     return route("{$this->route}.edit", $item->id);
            // })
            ->bulkAction(
                label: ___('Hapus Pilihan'), 
                after: function (array $selectedIds) {
                    $this->data->whereIn('id', $selectedIds)->delete();
                    Splade::toast(___("Beberapa berhasil dihapus."));
                },
                confirm: ___('Hapus Beberapa Data?'),
                confirmText: ___('Apa kamu yakin ingin menghapus data yang dipilih?'),
                confirmButton: ___('Hapus'),
                cancelButton: ___('Batalkan')
            )
            ->export()
            ->paginate(10);
    }
}
