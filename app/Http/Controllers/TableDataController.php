<?php

namespace App\Http\Controllers;

use App\Models\TableData;
use App\Http\Resources\TableDataResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TableDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $table_data = TableData::all();
        return TableDataResource::collection($table_data);
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
            // 먼저 요청 데이터가 있는지 확인
            if (!$request->hasAny('0')) {
                return response()->json([
                    'message' => '데이터가 없습니다.',
                    'received_data' => $request->all()
                ], 400);
            }

            // 요청 데이터 유효성 검사
            $request->validate([
                '*.table_title' => 'required|string|max:20',
                '*.game_id' => 'nullable|integer',
                '*.max_player' => 'required|integer',
                '*.position_x' => 'required|numeric',
                '*.position_y' => 'required|numeric',
                '*.size_width' => 'required|numeric',
                '*.size_height' => 'required|numeric',
            ]);

            $tableDatas = $request->all();
            
            // 데이터 업데이트 또는 생성만 먼저 실행
            foreach ($tableDatas as $tableData) {
                TableData::updateOrCreate(
                    [
                        'table_title' => $tableData['table_title'],
                        'game_id' => $tableData['game_id'],
                    ],
                    [
                        'table_title' => $tableData['table_title'],
                        'game_id' => $tableData['game_id'],
                        'max_player' => $tableData['max_player'],
                        'position_x' => $tableData['position_x'],
                        'position_y' => $tableData['position_y'],
                        'size_width' => $tableData['size_width'],
                        'size_height' => $tableData['size_height'],
                    ]
                );
            }

            // 삭제 로직은 별도로 처리
            $receivedKeys = collect($tableDatas)->map(function ($item) {
                return $item['table_title'] . '-' . ($item['game_id'] ?? 0);
            })->toArray();

            TableData::whereNotIn(
                DB::raw("CONCAT(table_title, '-', COALESCE(game_id, 0))"),
                $receivedKeys
            )->delete();

            return response()->json([
                'message' => '테이블 데이터가 성공적으로 저장되었습니다.',
                'data' => TableData::all()
            ], 200);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => '유효성 검사 실패',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            \Log::error('TableData 저장 중 오류 발생: ' . $e->getMessage());
            \Log::error('Stack trace: ' . $e->getTraceAsString());
            
            return response()->json([
                'message' => '서버 오류가 발생했습니다.',
                'error' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(TableData $tableData)
    {
        //
        return new TableDataResource(TableData::findOrFail($tableData->id));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TableData $tableData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TableData $tableData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TableData $tableData)
    {
        //
    }
}
