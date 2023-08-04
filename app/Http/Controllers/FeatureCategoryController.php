<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\FeatureCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FeatureCategoryController extends Controller
{
    public function index()
    {
        $featureCategories = FeatureCategory::with('category')->get();
        return response()->json($featureCategories, 200);
    }

    public function store(Request $request)
    {
        FeatureCategory::truncate();
        $categories =  $request->categories;

        foreach ($categories as $value) {

            FeatureCategory::create([
                'category_id' => $value['id'],
            ]);
        }

        $featureCategory = FeatureCategory::with('category')->get();

        return response()->json(['message' => 'Feature category created successfully', 'data' => $featureCategory], 200);
    }

    public function show($id)
    {
        $featureCategory = FeatureCategory::with('category')->find($id);

        if (!$featureCategory) {
            return response()->json(['message' => 'Feature category not found'], 404);
        }

        return response()->json($featureCategory, 200);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|exists:categories,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $featureCategory = FeatureCategory::find($id);

        if (!$featureCategory) {
            return response()->json(['message' => 'Feature category not found'], 404);
        }

        $featureCategory->update([
            'category_id' => $request->category_id,
        ]);

        return response()->json(['message' => 'Feature category updated successfully', 'data' => $featureCategory], 200);
    }

    public function destroy($id)
    {
        $featureCategory = FeatureCategory::find($id);

        if (!$featureCategory) {
            return response()->json(['message' => 'Feature category not found'], 404);
        }

        $featureCategory->delete();

        return response()->json(['message' => 'Feature category deleted successfully'], 200);
    }
}
