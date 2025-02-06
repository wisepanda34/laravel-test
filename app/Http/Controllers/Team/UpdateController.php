<?php

namespace App\Http\Controllers\Team;

use App\Models\Team;
use App\Http\Requests\Post\UpdateRequest;
use App\Http\Controllers\Team\BaseController;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Team $team)
    {
        $data = $request->validated(); // в классе UpdateRequest прописано правило для валидации 

        $this->service->update($team, $data);

        return redirect()->route('teams.index')->with('success', 'Team updated successfully!');
    }
}
