<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return view('stores.index', [
            'stores' => $request->user()->stores()->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('stores.form', [
            'store' => new Store,
            'page_meta' => [
                'title' => 'Create',
                'description' => 'Create a new store to manage your products and orders.',
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $validatedData = $request->validated();

        $validatedData['logo'] = $request->file('logo')->store('image/store');

        $request->user()->stores()->create($validatedData);

        return redirect()->route('stores.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Store $store)
    {
        $this->authorize('view', $store);

        // You would typically return a view with the store's details here.
        // return view('stores.show', compact('store'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Store $store)
    {
        // Use Laravel's standard authorization. This assumes you have a StorePolicy.
        $this->authorize('update', $store);

        return view('stores.form', [
            'store' => $store,
            'page_meta' => [
                'title' => 'Edit',
                'description' => $store->name . ' Stores',
            ]
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRequest $request, Store $store)
    {
        $this->authorize('update', $store);

        $validatedData = $request->validated();

        if ($request->hasFile('logo')) {
            // Delete the old logo if it exists
            if ($store->logo) {
                Storage::delete($store->logo);
            }
            // Store the new logo and get its path
            $validatedData['logo'] = $request->file('logo')->store('image/store');
        }

        $store->update($validatedData);

        return redirect()->route('stores.index')->with('success', 'Store updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Store $store)
    {
        $this->authorize('delete', $store);

        // Delete the logo if it exists
        if ($store->logo) {
            Storage::delete($store->logo);
        }

        $store->delete();

        return redirect()->route('stores.index')->with('success', 'Store deleted successfully.');
    }
}
