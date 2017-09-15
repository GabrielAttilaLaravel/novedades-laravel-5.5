<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;

class ProfileController extends Controller
{
    public function update(UpdateProfileRequest $request)
    {
        $profile = auth()->user()->profile;

        // enviamos los datos de la peticion que han sido previamente validados y lo
        // llamamos con (validate'D') ojo con 'D' al final
        $profile->fill($request->validated());

        // guardamos los datos
        $profile->save();
    }
}
