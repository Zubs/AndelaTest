<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ToSlugController extends Controller
{
    public function __invoke(Request $request)
    {
        $fields = $request->validate([
            'activity' => ['string', 'required']
        ]);

        $activity = preg_replace('/<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/i', '', $fields['activity']);
        $activity = preg_replace('/script/', '', $activity);

        return response()->json([
            'slug' => Str::slug($activity)
        ]);
    }
}
