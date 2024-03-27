<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationRequest;
use App\Models\Announcement;
use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function store(ApplicationRequest $request)
    {
        $validatedData = $request->validated();

        $application = new Application();
        $application->announcement_id = $validatedData['announcement_id'];
        $application->volunteer_id = $validatedData['volunteer_id'];
        $application->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Application submitted successfully.',
            'application' => $application,
        ]);
    }
}