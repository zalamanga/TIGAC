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
            ->addColumn('action', 'components.datatables.product.action')
            ->addIndexColumn()
            ->editColumn('name', function($row) {
                return '<div style="width: 150px;">' . $row->name . '</div>';
            })
            ->editColumn('description', function($row) {
                return '<div style="width: 500px;">' . $row->description . '</div>';
            })
            ->editColumn('product_category', function($row) {
                return $row->productCategory->name;
            })
            ->editColumn('product_variant', function($row) {
                $productVariants = [];

                foreach ($row->variants as $variant) {
                    array_push($productVariants, $variant->name);
                }

                return $productVariants;
            })
            ->editColumn('sku', function($row) {
                $sku = $row->sku == null ? 'SKU tidak ditemukan' : $row->sku;

                return $sku;
            })
            ->editColumn('price', function($row) {
                return 'Rp.' . number_format($row->price,2,",",".");
            })
            ->addColumn('is_active', 'components.datatables.product.active-switch')
            ->addColumn('is_hot_item', 'components.datatables.product.hot-item-switch')
            ->rawColumns(['description', 'name', 'is_active', 'is_hot_item', 'action']) 
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
                    ->parameters([
                        'autoWidth' => false,
                        'initComplete' => 'function() {
                            $("#product-table thead th").css("padding-right", "75px");
                            $("#product-table").css("table-layout", "auto");
                        }',
                    ])
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
            // Column::make('description'),
            Column::make('product_category'),
            Column::make('product_variant'),
            Column::make('price')->title('Base Price'),
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
