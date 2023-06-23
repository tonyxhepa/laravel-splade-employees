<?php

namespace App\Tables;

use App\Models\City;
use App\Models\Country;
use App\Models\Department;
use App\Models\Employee;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class Employees extends AbstractTable
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
                        ->orWhere('first_name', 'LIKE', "%{$value}%")
                        ->orWhere('last_name', 'LIKE', "%{$value}%");
                });
            });
        });
        return QueryBuilder::for(Employee::class)
            ->defaultSort('id')
            ->allowedSorts(['id', 'first_name', 'last_name'])
            ->allowedFilters(['id', 'first_name', 'first_name', 'country_id', 'department_id', 'state_id', 'city_id', $globalSearch]);
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
            ->withGlobalSearch(columns: ['first_name', 'last_name'])
            ->column('id', sortable: true)
            ->column('first_name', sortable: true)
            ->column('last_name', sortable: true)
            ->column(key: 'city.name', label: 'City')
            ->column(key: 'department.name', label: 'Departrment')
            ->column('action')
            ->selectFilter(
                key: 'country_id',
                options: Country::pluck('name', 'id')->toArray(),
                label: 'Country'
            )
            ->selectFilter(
                key: 'state_id',
                options: State::pluck('name', 'id')->toArray(),
                label: 'State'
            )
            ->selectFilter(
                key: 'city_id',
                options: City::pluck('name', 'id')->toArray(),
                label: 'City'
            )
            ->selectFilter(
                key: 'department_id',
                options: Department::pluck('name', 'id')->toArray(),
                label: 'Department'
            )
            ->paginate(15);
    }
}
