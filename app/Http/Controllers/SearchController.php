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
        $products = Product::query()->latest()->paginate(3);

        return view('search.index', compact('products'));
    }

    public function pagination(Request $request)
    {
        $products = Product::query()->latest()->paginate(3);

        return view('search.index_pagination', compact('products'))->render();
    }

    public function search(Request $request)
    {
        $products = $this->getSearchResults($request->search_string, "desc");

        if ($products->count() >= 1) {
            $view = view('search.index_pagination', compact('products'))->render();
            return response()->json(['status' => 'success', 'view' => $view]);
        }

        return response()->json(['status' => 'nothing_found']);
    }

    public function sortByAsc(Request $request)
    {
        $products = $this->getSearchResults($request->search_string, $request->sort);

        if ($products->count() >= 1) {
            return view('search.index_pagination', compact('products'))->render();
        }

        return response()->json(['status' => 'nothing_found']);
    }

    public function sortByDesc(Request $request)
    {
        $products = $this->getSearchResults($request->search_string, $request->sort);

        if ($products->count() >= 1) {
            return view('search.index_pagination', compact('products'))->render();
        }

        return response()->json(['status' => 'nothing_found']);
    }

    private function getSearchResults($search, $orderBy = "desc")
    {
        if (!empty($search)) {
            $products = (new SearchProductData)->run($orderBy, $search);
        } else {
            $products = (new SearchProductData)->default($search);
        }
        return $products;
    }
}
