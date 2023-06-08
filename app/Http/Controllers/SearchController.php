<?php

namespace App\Http\Controllers;

use App\Actions\Search\SearchProductData;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $products = null;

        $search = $request->input('search');


        $orderBy = $request->input('sort', 'asc');

        if (!empty($request->input('search')) && $orderBy === 'desc') {
            $products = (new SearchProductData)->run('desc', $search);
        } else if (!empty($request->input('search')) && $orderBy === 'asc') {
            $products = (new SearchProductData)->run('asc', $search);
        } else {
            $products = (new SearchProductData)->default($search);
        }

        return view('search.index', compact('products', 'search', 'orderBy'));
    }
}
