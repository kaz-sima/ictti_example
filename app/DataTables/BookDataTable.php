<?php
namespace App\DataTables;

use App\Book;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;

class BookDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
        ->editColumn('published', function(Book $book){
            return str_before($book->published, " ");
        })
        /*
        ->addColumn('book_img', function(Book $book){
            $url= asset('storage/'.$book->book_img);
            return '<img src="'.$url.'" width="50">
            ';})
         */
        ->addColumn('action', function (Book $book){
            return '<a href="booksedit/'.$book->id.'" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
            <a href="book/'.$book->id.'" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
           ';
          // })->rawColumns(['book_img', 'action']);
            })->rawColumns(['action']);
    }    
    /**
     * Get query source of dataTable.
     *
     * @param \App\Book $model 
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Book $model)
    {
        return $model->newQuery()
        //->select('id', 'book_img', 'book_title', 'Author', 'publisher', 'published');
        ->select('id', 'book_title', 'Author', 'publisher', 'published');
    }
    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('bookdatatable-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        //Button::make('create'),
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [            
            Column::make('id'),
            //Column::make('book_img'),
            Column::make('book_title'),
            Column::make('Author'),
            Column::make('publisher'),
            Column::make('published'),
            Column::make('action'),            
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Book_' . date('YmdHis');
    }
}
