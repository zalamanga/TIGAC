<?php

namespace App\DataTables;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProductDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'product.action')
            ->addIndexColumn()
            ->editColumn('description', function($row) {
                // You can customize the HTML output for the column
                return '<div style="width: 500px;">' . $row->description . '</div>';
            })
            ->rawColumns(['description']) 
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Product $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('product-table')
                    ->columns($this->getColumns())
                    ->autoWidth('false')
                    ->minifiedAjax()
                    ->dom('lfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    // ->parameters([
                    //     'autoWidth' => false
                    // ])
                    ;
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::computed('DT_RowIndex')->title('No')->orderable(false)->searchable(false),
            Column::make('name'),
            Column::make('sku'),
            Column::make('description'),
            Column::make('product_category_id'),
            Column::make('rating'),
            Column::make('price'),
            Column::make('discount_percent'),
            Column::make('is_active'),
            Column::make('is_hot_item'),
            Column::make('stock'),
            Column::make('action')
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Product_' . date('YmdHis');
    }
}
