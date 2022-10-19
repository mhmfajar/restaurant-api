<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\FoodRequest;
use App\Http\Resources\FoodResource;
use App\Models\Food;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return FoodResource::collection(Food::query()->orderBy('id', 'ASC')->get()->all());
    }

    public function indexFoodOrder()
    {
        return FoodResource::collection(Food::query()->where('status', true)->orderBy('id', 'ASC')->get()->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\FoodRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FoodRequest $request)
    {
        $food = Food::query()->create($request->validated());

        return new FoodResource($food);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show(Food $food)
    {
        return new FoodResource($food);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\FoodRequest  $request
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(FoodRequest $request, Food $food)
    {
        $food->update($request->validated());

        return new FoodResource($food);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {
        $food->delete();

        return response()->noContent();
    }
}
