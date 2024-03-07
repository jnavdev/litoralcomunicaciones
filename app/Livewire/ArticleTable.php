<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Columns\DateColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;
use App\Models\Article;

class ArticleTable extends DataTableComponent
{
    public function builder(): Builder
    {
        return Article::query()
            ->with('category')
            ->orderBy('id', 'DESC')
            ->select('articles.*');
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
            ImageColumn::make('Imágen', 'image')
                ->location(
                    fn ($row) => asset("storage/{$row->image}")
                )
                ->attributes(fn ($row) => [
                    'class' => 'rounded',
                    'alt' => 'Imágen ' . $row->title,
                    'style' => 'width: 120px;'
                ]),
            Column::make("Título", "title")
                ->sortable()
                ->searchable(),
            Column::make("Categoría", "category.name")
                ->sortable()
                ->searchable(),
            DateColumn::make("Creación", "created_at")
                ->sortable()
                ->outputFormat('d-m-Y'),
            Column::make('Acciones')
                ->label(function ($row, Column $column) {
                    return view('admin.articles.table_actions', compact('row'));
                }),
        ];
    }
}
