<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class AdminTable
{
    /**
     * @template TModel of Model
     *
     * @param  Builder<TModel>  $query
     * @param  list<string>  $searchableColumns
     * @param  list<string>  $sortableColumns
     * @return array{
     *     paginator: LengthAwarePaginator<int, TModel>,
     *     search: string,
     *     sort: string,
     *     direction: 'asc'|'desc'
     * }
     */
    public function paginate(
        Request $request,
        Builder $query,
        array $searchableColumns,
        array $sortableColumns,
        string $defaultSort = 'created_at',
        string $defaultDirection = 'desc',
        int $perPage = 10,
    ): array {
        $search = $request->string('search')->trim()->toString();
        $requestedSort = $request->string('sort')->toString();
        $requestedDirection = $request->string('direction')->toString();
        $sort = in_array($requestedSort, $sortableColumns, true) ? $requestedSort : $defaultSort;
        $direction = in_array($requestedDirection, ['asc', 'desc'], true)
            ? $requestedDirection
            : $defaultDirection;

        if ($search !== '') {
            $query->whereAny($searchableColumns, 'like', "%{$search}%");
        }

        $query->orderBy($sort, $direction);

        if ($sort !== 'id') {
            $query->orderByDesc('id');
        }

        return [
            'paginator' => $query->paginate($perPage)->withQueryString(),
            'search' => $search,
            'sort' => $sort,
            'direction' => $direction,
        ];
    }
}
