<?php

namespace App\Http\Controllers;

use App\DataTables\ProductDataTable;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(ProductDataTable $dataTable)
    {
        $title = 'Product List';


        $data = [
            'title' => $title
        ];

        return $dataTable->render("pages.admin.product.index", $data);
    }
}
