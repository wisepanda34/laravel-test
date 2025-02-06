<?php

namespace App\Http\Controllers\Team;

use App\Http\Requests\Post\StoreRequest;
use App\Http\Controllers\Team\BaseController;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated(); // в классе StoreRequest прописано правило для валидации 

        $this->service->store($data);



        return redirect()->route('teams.index')->with('success', 'Team added successfully!');
    }
}
