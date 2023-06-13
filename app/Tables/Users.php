<?php

namespace App\Tables;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class Users extends AbstractTable
{
    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the user is authorized to perform bulk actions and exports.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        return true;
    }

    /**
     * The resource or query builder.
     *
     * @return mixed
     */
    public function for()
    {
        $globalSearch = AllowedFilter::callback('global', function ($query, $value) {
            $query->where(function ($query) use ($value) {
                Collection::wrap($value)->each(function ($value) use ($query) {
                    $query
                        ->orWhere('username', 'LIKE', "%{$value}%")
                        ->orWhere('first_name', 'LIKE', "%{$value}%")
                        ->orWhere('last_name', 'LIKE', "%{$value}%")
                        ->orWhere('email', 'LIKE', "%{$value}%");
                });
            });
        });
        return QueryBuilder::for(User::class)
            ->defaultSort('id')
            ->allowedSorts(['id', 'username', 'first_name', 'last_name', 'email', 'created_at'])
            ->allowedFilters(['username', 'first_name', 'last_name', 'email', $globalSearch]);
    }

    /**
     * Configure the given SpladeTable.
     *
     * @param \ProtoneMedia\Splade\SpladeTable $table
     * @return void
     */
    public function configure(SpladeTable $table)
    {
        $table
            ->withGlobalSearch(columns: ['id', 'username', 'first_name', 'last_name', 'email'])
            ->column('id', sortable: true)
            ->column('username', sortable: true)
            ->column('first_name', sortable: true, hidden: true)
            ->column('last_name', sortable: true, hidden: true)
            ->column('email', sortable: true)
            ->column('created_at', sortable: true, hidden: true)
            // ->rowLink(function (User $user) {
            //     return route('admin.users.edit', $user);
            // })
            ->column('action')
            ->paginate(15);
    }
}
