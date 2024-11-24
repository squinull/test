<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReleaseRequest;
use App\Http\Requests\UpdateReleaseRequest;
use App\Http\Resources\ReleaseResource;
use App\Models\Release;
use App\Services\ReleaseService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ReleaseController extends Controller
{
    protected ReleaseService $releaseService;

    public function __construct(ReleaseService $releaseService)
    {
        $this->releaseService = $releaseService;
    }

    public function index(): JsonResponse
    {
        $releases = $this->releaseService->getAllReleases();
        return response()->json(ReleaseResource::collection($releases));
    }

    public function store(StoreReleaseRequest $request): JsonResponse
    {
        $release = $this->releaseService->createRelease($request->validated());
        return response()->json(['message' => 'Release created successfully', 'release' => new ReleaseResource($release)], 201);
    }

    public function show($id): JsonResponse
    {
        $release = $this->releaseService->getReleaseById($id);
        return response()->json(new ReleaseResource($release));
    }

    public function update(UpdateReleaseRequest $request, $id): JsonResponse
    {
        $release = $this->releaseService->updateRelease($id, $request->validated());
        return response()->json(['message' => 'Release updated successfully', 'release' => new ReleaseResource($release)]);
    }

    public function destroy($id): JsonResponse
    {
        $this->releaseService->deleteRelease($id);
        return response()->json(['message' => 'Release deleted successfully']);
    }
}
