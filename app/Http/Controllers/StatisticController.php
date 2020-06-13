<?php

namespace App\Http\Controllers;

use App\Professions;
use App\Vacancies;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function indexAction()
    {
        $professions = Professions::all();
        $text = '';
        $counts = '';
        foreach ($professions as $profession){
            $text .= '"'.$profession->name .'",';

            $value = Vacancies::where('profession_id', $profession->id)->count('id');

            $counts .= $value .',';
        };
        return view('statistic',compact('text','counts', 'professions'));;
    }

    public function chosenProfessionAction(Request $request)
    {
        $professions = Professions::all();
        $profession = Professions::where('id', $request->get('profession'))->first();
        $text = '';
        $counts = '';

            $text .= '"'.$profession->name .'",';

            $value = Vacancies::where('profession_id', $profession->id)->count('id');

            $counts .= $value .',';
        return view('statistic',compact('text','counts', 'professions'));;
    }
}
