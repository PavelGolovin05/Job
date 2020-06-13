<?php

namespace App\Http\Controllers;

use App\Resume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResumeController extends Controller
{
    public function createResumeAction(Request $request)
    {
        $resume = new Resume([
            'date_birth' => $request->get('date_birth'),
            'sex' => $request->get('sex'),
            'phone' => $request->get('phone'),
            'education_id' => $request->get('education'),
            'university_id' => $request->get('university'),
            'specialization' => $request->get('specialization'),
            'city_id' => $request->get('city'),
            'year_of_graduation' => $request->get('year_of_graduation'),
            'user_id' => Auth::user()->id,
        ]);
        $resume->save();

        return redirect()->back()->with('message', 'Резюме успешно создано!');
    }
}
