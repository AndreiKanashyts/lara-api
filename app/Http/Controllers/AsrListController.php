<?php

namespace App\Http\Controllers;

use App\Http\Requests\AsrList\StoreRequest;
use App\Http\Requests\AsrList\UpdateRequest;
use App\Http\Resources\AsrList\AsrListResource;
use App\Models\AsrList;
use Illuminate\Http\Request;

class AsrListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $asrLists = AsrList::all();
        return AsrListResource::collection($asrLists);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $asrList = AsrList::create($data);

        return AsrListResource::make($asrList);
    }

    /**
     * Display the specified resource.
     */
    public function show(AsrList $asrList)
    {
        return AsrListResource::make($asrList);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, AsrList $asrList)
    {
        $data = $request->validated();
        $asrList->update($data);
        // $asrList = $asrList->fresh();

        return AsrListResource::make($asrList);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AsrList $asrList)
    {
        $asrList->delete();
        return response()->json([
            'message' => 'done'
        ]);
    }

    /**
     * Search for a _CommutationId.
     */
    public function search(string $_CommutationId)
    {
        if (empty($_CommutationId)) {
            return response()->json(['error' => '_CommutationId parameter is required.'], 400);
        }

        $asrList = AsrList::where('_CommutationId', 'like', '%' . $_CommutationId . '%')->get();

        return AsrListResource::make($asrList);
    }
}
