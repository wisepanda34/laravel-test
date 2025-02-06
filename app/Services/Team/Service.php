<?php

namespace App\Services\Team;

use App\Models\Team;

class Service
{
  public function store($data)
  {
    // dd($data);
    $team = Team::create([
      'title' => $data['title'],
      'country_id' => $data['country_id'] ?? null,
    ]);

    if (!empty($data['achievements'])) {
      $team->achievements()->attach($data['achievements']);
    }
  }

  public function update($team, $data)
  {
    $team->update([
      'title' => $data['title'],
      'country_id' => $data['country_id'],
    ]);

    $team->achievements()->sync($data['achievements'] ?? []);
  }
}
