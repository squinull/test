<?php

namespace App\Services;

use App\Models\Feature;

class FeatureService
{
    public function getAllFeatures()
    {
        return Feature::all();
    }

    public function createFeature(array $data)
    {
        return Feature::create($data);
    }

    public function getFeatureById($id)
    {
        return Feature::findOrFail($id);
    }

    public function updateFeature($id, array $data)
    {
        $feature = Feature::findOrFail($id);
        $feature->update($data);
        return $feature;
    }

    public function deleteFeature($id)
    {
        $feature = Feature::findOrFail($id);
        $feature->delete();
    }
}
