<?php

namespace App\Http\Controllers;

use App\Models\CannedReply;
use App\Http\Requests\StoreCannedReplyRequest;
use App\Http\Requests\UpdateCannedReplyRequest;

class CannedReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cannedReplies=CannedReply::all();
        return view('canned_replies.index', compact( 'cannedReplies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('canned_replies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCannedReplyRequest $request)
    {
        CannedReply::create($request->validated());
        return redirect()->route('canned-replies.index')->with('success', value: 'Canned Reply created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(CannedReply $cannedReply)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cannedReply=CannedReply::find($id);
        return view('canned_replies.edit', compact('cannedReply'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCannedReplyRequest $request, $id)
    {
        $CannedReply=CannedReply::find($id);
        $CannedReply->update($request->validated());

        return redirect()->route('canned-replies.index')->with('success', 'Canned Reply Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        CannedReply::destroy($id);
        return redirect()->route('canned-replies.index')->with('success', 'Canned Reply Deleted successfully!');
    }
}
