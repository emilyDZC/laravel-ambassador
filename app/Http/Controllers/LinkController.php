<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Link;
use App\Models\LinkProduct;
use Str;

class LinkController extends Controller
{
    public function index($id)
    {
        return Link::whereUserId($id)->get();
    }

    public function store(Request $request)
    {
        $link = Link::create([
            'user_id' => $request->user()->id,
            'code' => Str::random(6)
        ]);

        foreach ($request->input('products') as $product_id) {
            LinkProduct::create([
                'link_id' => $link->id,
                'product_id' => $product_id
            ]);
        }

        return $link;
    }
}
