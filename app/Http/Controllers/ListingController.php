<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function index()
    {
        return view('pages.listings.index');
    }

    public function create()
    {
        return view('pages.listings.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('listings.index');
    }

    public function show()
    {
        return view('pages.listings.show');
    }

    public function saved()
    {
        return view('pages.listings.saved');
    }

    public function edit($id)
    {
        return view('pages.listings.edit');
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('listings.index');
    }

    public function destroy($id)
    {
        return redirect()->route('listings.index');
    }
}
