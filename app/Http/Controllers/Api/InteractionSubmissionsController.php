<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FormBlockInteraction;
use Illuminate\Http\Request;

class InteractionSubmissionsController extends Controller
{
    public function show(FormBlockInteraction $interaction)
    {
        $this->authorize('view', $interaction);

        return response()->json(['responses' => $interaction->formSessionResponses], 200);
    }
}
