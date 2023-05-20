<?php

namespace App\Http\Controllers\Compra\Brand;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function __invoke(Brand $brand)
    {
        return view('compra.brand.show', compact('brand'));
    }
}
