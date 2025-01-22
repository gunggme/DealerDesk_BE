<?php

namespace App\Http\Controllers;

use App\Models\PresetData;
use App\Http\Resources\PresetDataResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PresetDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $preset_data = PresetData::all();
        return PresetDataResource::collection($preset_data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'preset_name' => 'required|string|max:20',
                'time_table_data' => 'required|json',
                'prize_array_data' => 'required|json',
                'buy_in_price' => 'required|string',
                'starting_chip' => 'required|string',
            ]);

            $presetData = $request->all();
            PresetData::create($presetData);
            
            return response()->json(['message' => 'Preset data created successfully'], 200)
                ->header('Access-Control-Allow-Origin', '*')
                ->header('Access-Control-Allow-Methods', 'POST, OPTIONS')
                ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error creating preset data',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(PresetData $presetData)
    {
        return new PresetDataResource(PresetData::findOrFail($presetData->id));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PresetData $presetData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PresetData $presetData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PresetData $presetData)
    {
        //
    }
}
