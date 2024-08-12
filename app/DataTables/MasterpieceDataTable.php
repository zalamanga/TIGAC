<?php

namespace App\DataTables;

use App\Models\Masterpiece;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class MasterpieceDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'components.datatables.masterpiece.action-button')
            ->addColumn('is_active', 'components.datatables.masterpiece.active-switch')
            ->addColumn('thumbnail_preview', 'components.datatables.masterpiece.media-preview')
            ->addIndexColumn()
            ->setRowId('id')
            ->rawColumns(['action', 'is_active', 'thumbnail_preview']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Masterpiece $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('masterpiece-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('lfrtip')
            ->orderBy(1)
            ->selectStyleSingle();
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::computed('DT_RowIndex')->title('No')->orderable(false)->searchable(false),
            Column::make('name'),
            Column::make('detail_link'),
            Column::make('thumbnail_preview'),
            Column::make('thumbnail_short_description'),
            Column::make('is_active'),
            Column::computed('action'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Masterpiece_' . date('YmdHis');
    }
}
