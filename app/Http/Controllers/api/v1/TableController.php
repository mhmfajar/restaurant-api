<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\TableRequest;
use App\Http\Resources\TableResource;
use App\Models\Table;

class TableController extends Controller
{
    public function index()
    {
        return TableResource::collection(Table::all());
    }

    public function show(Table $table)
    {
        return new TableResource($table);
    }

    public function update(TableRequest $request, Table $table)
    {
        $table->update($request->validated());

        return new TableResource($table);
    }
}
