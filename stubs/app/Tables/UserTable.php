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
            ->column(key: 'name', sortable: true)
            ->column(key: 'email', sortable: true)
            ->rowModal(function($item) {
                return route("{$this->route}.edit", $item->id);
            })
            ->bulkAction(
                label: __('Delete Selected'), 
                after: function (array $selectedIds) {
                    $this->data->whereIn('id', $selectedIds)->delete();
                    Splade::toast(__("Some items deleted successfully"));
                },
                confirm: __('Delete items'),
                confirmText: __('Are you sure you want to delete selected item?'),
                confirmButton: __('Delete'),
                cancelButton: __('Cancel'),
            )
            ->paginate(10);
    }
}
