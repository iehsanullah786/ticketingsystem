<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use App\Models\Tenant;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tenants=Tenant::all();
        return view('tenants.index', compact('tenants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tenants.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'domain_name' => 'required',
            'email' => 'required|email',
            'password' => [
                'required',
                'string',
                'min:8', // at least 8 characters
            ],
        ]);
        $tenant=Tenant::Create($validated);
        $tenant->domains()->create([
            'domain' => $validated['domain_name'].".".config('app.domain')
        ]);
        return redirect(route('tenants'))->with('success', 'Tenant created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)

    {
        $tenant=Tenant::destroy($id);
        
        
        return redirect()->route('tenants.index');

    }
}
