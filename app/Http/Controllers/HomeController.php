<?php

namespace App\Http\Controllers;

use App\Cities;
use App\Educations;
use App\Employments;
use App\Professions;
use App\Resume;
use App\Schedules;
use App\Universities;
use App\User;
use App\Vacancies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function homeAction()
    {
        $vacancies = Vacancies::join('schedules', 'schedules.id', 'vacancies.schedule_id')
            ->join('employments', 'employments.id', 'vacancies.employment_id')
            ->join('professions', 'professions.id', 'vacancies.profession_id')
            ->join('cities', 'cities.id', 'vacancies.city_id')
            ->join('users', 'users.id', 'vacancies.user_id')
            ->select('vacancies.id', 'vacancies.name', 'salary_min', 'salary_max', 'schedules.name as schedule', 'employments.name as employment',
                'cities.name as city', 'professions.name as profession', 'publication_date',
                'users.company_name as company', 'users.photo_link')
            ->paginate(4);

        return view('home', compact('vacancies'));
    }

    public function showProfileAction()
    {
        $user = User::where('id',Auth::user()->id)
            ->select('company_name', 'photo_link', 'is_employer')->first();

        return view('profile', compact('user'));
    }

    public function fillProfileAction(Request $request)
    {
        $changes = false;
        $user = User::where('id',Auth::user()->id)->first();
        if($request->get('company_name') != null) {
            $user->company_name = $request->get('company_name');
            $changes = true;
        }
        if($request->get('photo_link') != null) {
            $user->photo_link = "images/" . $request->get('photo_link');
            $changes = true;
        }
        $user->save();
        if($changes) {
            return redirect()->back()->with('message', 'Данные успешно добавлены!');
        }
        return redirect()->back();
    }

    public function showAdvancedSearchFormAction()
    {
        $schedules = Schedules::all();

        $employments = Employments::all();

        $cities = Cities::all();

        $professions = Professions::all();

        return view('advancedSearch', compact('schedules','employments', 'cities', 'professions'));
    }

    public function showCreateVacancyFormAction()
    {
        $schedules = Schedules::all();

        $employments = Employments::all();

        $cities = Cities::all();

        $professions = Professions::all();

        return view('createVacancy', compact('schedules','employments', 'cities', 'professions'));
    }

    public function showCreateResumeFormAction()
    {
        $created = false;

        $resume = Resume::join('cities', 'cities.id', 'resume.city_id')
            ->join('educations', 'educations.id', 'resume.education_id')
            ->join('universities', 'universities.id', 'resume.university_id')
            ->join('users', 'users.id', 'resume.user_id')
            ->where('user_id', Auth::user()->id)
            ->select('cities.name as city', 'educations.name as education', 'universities.name as university', 'users.company_name as FIO',
                'date_birth', 'sex', 'phone', 'specialization', 'year_of_graduation')
            ->first();
        //dd($resume);
        if($resume != null)
        {
            $created = true;
        }

        $cities = Cities::all();

        $educations = Educations::all();

        $universities = Universities::all();

        return view('resume', compact('cities', 'educations', 'universities', 'created', 'resume'));
    }
}
