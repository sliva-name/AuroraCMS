<?php

namespace App\Http\Controllers\Cabinet;

use App\Http\Controllers\Controller;
use App\Http\Requests\SkinUploadRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class CabinetController extends Controller
{
    public function index(Request $request)
    {
        return view('cabinet.index');
    }

    public function skinUpload(SkinUploadRequest $request)
    {
        $request->validated();
        $image = $request->file('skin')->storePublicly('skins');
        User::where('id', auth()->user()->id)->update([
            'skin' => $image
        ]);
        return Response::json($image);
    }
}
