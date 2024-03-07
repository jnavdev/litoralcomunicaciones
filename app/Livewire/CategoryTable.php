<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Columns\DateColumn;
use App\Models\Category;

class CategoryTable extends DataTableComponent
{
    public function builder(): Builder
    {
        return Category::query()->orderBy('id', 'DESC');
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("#", "id")
                ->sortable(),
            Column::make("Nombre", "name")
                ->sortable()
                ->searchable(),
            DateColumn::make("Creación", "created_at")
                ->sortable()
                ->outputFormat('d-m-Y'),
            Column::make('Acciones')
                ->label(function ($row, Column $column) {
                    return view('admin.categories.table_actions', compact('row'));
                }),
        ];
    }
}
