<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFeatureRequest;
use App\Http\Requests\UpdateFeatureRequest;
use App\Http\Resources\FeatureResource;
use App\Models\Feature;
use App\Services\FeatureService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    protected FeatureService $featureService;

    public function __construct(FeatureService $featureService)
    {
        $this->featureService = $featureService;
    }

    public function index(): JsonResponse
    {
        $features = $this->featureService->getAllFeatures();
        return response()->json(FeatureResource::collection($features));
    }

    public function store(StoreFeatureRequest $request): JsonResponse
    {
        $feature = $this->featureService->createFeature($request->validated());
        return response()->json(['message' => 'Feature created successfully', 'feature' => new FeatureResource($feature)], 201);
    }

    public function show($id): JsonResponse
    {
        $feature = $this->featureService->getFeatureById($id);
        return response()->json(new FeatureResource($feature));
    }

    public function update(UpdateFeatureRequest $request, $id): JsonResponse
    {
        $feature = $this->featureService->updateFeature($id, $request->validated());
        return response()->json(['message' => 'Feature updated successfully', 'feature' => new FeatureResource($feature)]);
    }

    public function destroy($id): JsonResponse
    {
        $this->featureService->deleteFeature($id);
        return response()->json(['message' => 'Feature deleted successfully']);
    }
}
