<?php

namespace Laravel\Breeze\Tables;

use App\Models\User;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\SpladeTable;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\Facades\Splade;

class UserTable extends AbstractTable
{
    /**
     * Create a new instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the user is authorized to perform bulk actions and exports.
     */
    public function authorize(Request $request): bool
    {
        return true;
    }

    /**
     * The resource or query builder.
     */
    public function for(): mixed
    {
        return User::query();
    }

    /**
     * Configure the given SpladeTable.
     */
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
                    User::whereIn('id', $selectedIds)->delete();
                    Splade::toast("Some items deleted successfully");
                },
                confirm: 'Delete items',
                confirmText: 'Are you sure you want to delete selected item?',
                confirmButton: 'Delete',
                cancelButton: 'Cancel',
            )
            ->paginate(10);
    }
}
