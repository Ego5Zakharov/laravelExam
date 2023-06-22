<?php

namespace App\Http\Controllers;

use App\Actions\Search\SearchProductData;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $orderBy = $request->input('sort', 'asc');

        $products = $this->getSearchResults($search, $orderBy);

        if ($request->ajax()) {
            return response()->json([
                'products' => $products,
                'search' => $search,
                'orderBy' => $orderBy
            ]);
        }

        return view('search.index', compact('products', 'search', 'orderBy'));
    }

    private function getSearchResults($search, $orderBy)
    {
        if (!empty($search)) {
            $products = (new SearchProductData)->run($orderBy, $search);
        } else {
            $products = (new SearchProductData)->default($search);
        }

        return $products;
    }
}
