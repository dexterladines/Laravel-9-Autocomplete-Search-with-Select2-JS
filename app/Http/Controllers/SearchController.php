<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
        return view('searchDemo');
    }

    public function autocomplete(Request $request)
    {
        $data = [];

        if ($request->filled('q')) {
            $data = User::select("name", "id")
                    ->where('name', 'LIKE', '%'. $request->get('q'). '%')
                    ->get();
        }

        return response()->json($data);
    }
}
