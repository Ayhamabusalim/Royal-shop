<?php

namespace App\DataTables;

use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SubCategoryDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->setRowId('id')

            ->addColumn('category_name', function ($subcategory) {
                return $subcategory->category ? $subcategory->category->name : 'N/A';
            })
            ->addColumn('image', function ($row) {
                $imageUrl = asset('images/subcategories/' . $row->image);
                return '<img src="' . $imageUrl . '" width="60" height="60" style="object-fit: cover; border-radius: 8px;" />';
            })


            ->addColumn('action', function ($subcategory) {
                return view('backend.pages.subcategories.component.action', compact('subcategory'))->render();
            })

            ->rawColumns(['image', 'action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(SubCategory $model): QueryBuilder
    {
        return $model->newQuery()->with('category');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('subcategory-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel')
                    ->text('<i class="bi bi-file-earmark-excel"></i> Excel')
                    ->className('btn btn-success btn-sm'),
                Button::make('csv')
                    ->text('<i class="bi bi-filetype-csv"></i> CSV')
                    ->className('btn btn-info btn-sm'),
                Button::make('pdf')
                    ->text('<i class="bi bi-file-earmark-pdf"></i> PDF')
                    ->className('btn btn-danger btn-sm'),
                Button::make('print')
                    ->text('<i class="bi bi-printer"></i> Print')
                    ->className('btn btn-warning btn-sm'),
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            /*  Column::make('id'), */
            Column::computed('image')
                ->exportable(false)
                ->printable(false)
                ->width(100)
                ->addClass('text-center'),
            Column::make('category_name')->title('Category '),

            Column::make('name'),
            Column::make('slug'),
            Column::make('description'),

            Column::make('is_active'),
            Column::make('meta_title'),
            Column::make('meta_description'),
            Column::computed('action')
                ->exportable(true)
                ->printable(true)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'SubCategory_' . date('YmdHis');
    }
}
