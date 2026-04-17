<?php

namespace App\Http\Controllers;

use App\Mail\GiftCreated;
use App\Models\Gift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class GiftController extends Controller
{
    public function index()
    {
        $gifts = Gift::all();
        return view('gifts.index', compact('gifts'));
    }

    public function create()
    {
        return view('gifts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|min:3|max:50',
            'url'     => 'nullable|url:http,https',
            'details' => 'nullable|string',
            'price'   => 'required|numeric|min:0|decimal:0,2',
        ]);

        $gift = Gift::create($request->only(['name', 'url', 'details', 'price']));

        Mail::to('fanarkt08@gmail.com')->send(new GiftCreated($gift->name,(float) $gift->price));

        return redirect()->route('gifts.index');
    }

    public function show(Gift $gift)
    {
        return view('gifts.show', compact('gift'));
    }

    public function edit(Gift $gift)
    {
        return view('gifts.edit', compact('gift'));
    }

    public function update(Request $request, Gift $gift)
    {
        $request->validate([
            'name'    => 'required|string|min:3|max:50',
            'url'     => 'nullable|url:http,https',
            'details' => 'nullable|string',
            'price'   => 'required|numeric|min:0|decimal:0,2',
        ]);

        $gift->update($request->only(['name', 'url', 'details', 'price']));

        return redirect()->route('gifts.show', $gift);
    }

    public function destroy(Gift $gift)
    {
        $gift->delete();
        return redirect()->route('gifts.index');
    }
}
