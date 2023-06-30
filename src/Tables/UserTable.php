<?php

namespace Novay\Boilerplate\Tables;

use Illuminate\Http\Request;
use ProtoneMedia\Splade\SpladeTable;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\Facades\Splade;

use App\Models\User;

class UserTable extends AbstractTable
{
    protected $model, $route;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function authorize(Request $request): bool
    {
        return true;
    }

    public function for(): mixed
    {
        return $this->model->query();
    }

    public function configure(SpladeTable $table): void
    {
        $table->withGlobalSearch(columns: ['name', 'email', 'phone'])
            ->defaultSort('name')
            ->column(key: 'name', sortable: true)
            ->column(key: 'email', sortable: true)
            ->column(key: 'phone', sortable: true)
            ->column(key: 'action', canBeHidden: false, exportAs: false)
            ->bulkAction(
                label: __('Delete Selected'), 
                after: function (array $selectedIds) {
                    $this->model->whereIn('id', $selectedIds)->delete();
                    Splade::toast("Some items deleted successfully!");
                },
                confirm: 'Delete items',
                confirmText: 'Are you sure you want to delete selected item?',
                confirmButton: 'Delete',
                cancelButton: 'Cancel',
            )
            ->paginate(10);
    }
}
