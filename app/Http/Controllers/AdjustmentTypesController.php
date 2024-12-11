<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAdjustmentTypesRequest;
use App\Http\Requests\UpdateAdjustmentTypesRequest;
use App\Models\AdjustmentType;
class AdjustmentTypesController extends Controller
{


    public function index()
    {
        $adjustmenttypes=AdjustmentType::all();
        return view('adjustmenttypes.index', compact( 'adjustmenttypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adjustmenttypes.create');
    }

    public function store(StoreAdjustmentTypesRequest $request)
    {
        AdjustmentType::create($request->validated());
        return redirect()->route('adjustment-types.index')->with('success', value: 'Adjustment Type created successfully.');
    }


    public function show(string $id)
    {

    }


    public function edit(string $id)
    {
        $adjustmenttype=AdjustmentType::find($id);
        return view('adjustmenttypes.edit', compact('adjustmenttype'));
    }


    public function update(UpdateAdjustmentTypesRequest $request, string $id)
    {
      $adjustmenttype=AdjustmentType::find($id);
      $adjustmenttype->update($request->validated());

      return redirect()->route('adjustment-types.index')->with('success', 'Adjustment Type Updated successfully!');
    }


    public function destroy(string $id)
    {
        AdjustmentType::destroy($id);
        return redirect()->route('adjustment-types.index')->with('success', 'Adjustment Type Deleted successfully!');;
    }
}
