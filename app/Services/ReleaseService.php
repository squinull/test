<?php

namespace App\Services;

use App\Models\Release;

class ReleaseService
{
    public function getAllReleases()
    {
        return Release::all();
    }

    public function createRelease(array $data)
    {
        return Release::create($data);
    }

    public function getReleaseById($id)
    {
        return Release::findOrFail($id);
    }

    public function updateRelease($id, array $data)
    {
        $release = Release::findOrFail($id);
        $release->update($data);
        return $release;
    }

    public function deleteRelease($id)
    {
        $release = Release::findOrFail($id);
        $release->delete();
    }
}
