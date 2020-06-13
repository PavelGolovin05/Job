<?php

namespace App\Http\Controllers;

use App\Cities;
use App\Employments;
use App\MyVacancies;
use App\Professions;
use App\Schedules;
use App\Vacancies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class VacanciesController extends Controller
{
    public function createVacancyAction(Request $request)
    {
        $vacancy = new Vacancies([
            'name' => $request->get('name'),
            'salary_min' => $request->get('salary_min'),
            'salary_max' => $request->get('salary_max'),
            'schedule_id' => $request->get('schedule'),
            'employment_id' => $request->get('employment'),
            'experience' => $request->get('experience'),
            'profession_id' => $request->get('profession'),
            'city_id' => $request->get('city'),
            'requirements' => $request->get('requirements'),
            'description' => $request->get('description'),
            'publication_date' => date("Y-m-d"),
            'user_id' => Auth::user()->id,
            'phone' => $request->get('phone'),
        ]);
        $vacancy->save();

        return redirect()->back()->with('message', 'Вакансия успешно добавлена!');
    }

    public function vacancyAction($id)
    {
        $added = false;

        $isMyVacancy = false;

        $vacancy = Vacancies::join('schedules', 'schedules.id', 'vacancies.schedule_id')
            ->join('employments', 'employments.id', 'vacancies.employment_id')
            ->join('professions', 'professions.id', 'vacancies.profession_id')
            ->join('cities', 'cities.id', 'vacancies.city_id')
            ->join('users', 'users.id', 'vacancies.user_id')
            ->where('vacancies.id',$id)
            ->select('vacancies.id', 'vacancies.name', 'salary_min', 'salary_max', 'schedules.name as schedule', 'employments.name as employment',
                'cities.name as city', 'professions.name as profession', 'publication_date', 'description', 'requirements',
                'users.company_name as company', 'users.photo_link', 'vacancies.phone', 'vacancies.user_id as user')
            ->first();

        if(Auth::user()) {
            $already_added = MyVacancies::where('user_id', Auth::user()->id)
                ->where('vacancy_id', $id)
                ->select('id')->first();
            if($already_added != null) {
                $added = true;
            }
            if($vacancy->user == Auth::user()->id) {
                $isMyVacancy = true;
            }
        }


        return view('vacancy', compact('vacancy', 'added', 'isMyVacancy'));
    }

    public function myVacanciesAction()
    {
        $my = true;//для отображения ондной и той же вьюшки для моих вакансий и расшернного поиска, чтобы менялся текст

        if(Auth::user()->is_employer) {

            $vacancies = Vacancies::join('schedules', 'schedules.id', 'vacancies.schedule_id')
                ->join('employments', 'employments.id', 'vacancies.employment_id')
                ->join('professions', 'professions.id', 'vacancies.profession_id')
                ->join('cities', 'cities.id', 'vacancies.city_id')
                ->join('users', 'users.id', 'vacancies.user_id')
                ->where('vacancies.user_id', Auth::user()->id)
                ->select('vacancies.id', 'vacancies.name', 'salary_min', 'salary_max', 'schedules.name as schedule', 'employments.name as employment',
                    'cities.name as city', 'professions.name as profession', 'publication_date',
                    'users.company_name as company', 'users.photo_link')
                ->paginate(4);
        }
        else {
            $vacancies = Vacancies::join('schedules', 'schedules.id', 'vacancies.schedule_id')
                ->join('employments', 'employments.id', 'vacancies.employment_id')
                ->join('professions', 'professions.id', 'vacancies.profession_id')
                ->join('cities', 'cities.id', 'vacancies.city_id')
                ->join('users', 'users.id', 'vacancies.user_id')
                ->join('my_vacancies', 'my_vacancies.vacancy_id', 'vacancies.id')
                ->where('my_vacancies.user_id', Auth::user()->id)
                ->select('vacancies.id', 'vacancies.name', 'salary_min', 'salary_max', 'schedules.name as schedule', 'employments.name as employment',
                    'cities.name as city', 'professions.name as profession', 'publication_date',
                    'users.company_name as company', 'users.photo_link')
                ->paginate(4);
        }

        return view('myVacancies', compact('vacancies', 'my'));
    }

    public function findVacanciesAction(Request $request)
    {
        $name = $request->get('name');

        $vacancies = Vacancies::join('schedules', 'schedules.id', 'vacancies.schedule_id')
            ->join('employments', 'employments.id', 'vacancies.employment_id')
            ->join('professions', 'professions.id', 'vacancies.profession_id')
            ->join('cities', 'cities.id', 'vacancies.city_id')
            ->join('users', 'users.id', 'vacancies.user_id')
            ->where('vacancies.name', 'LIKE', "%$name%")
            ->select('vacancies.id', 'vacancies.name', 'salary_min', 'salary_max', 'schedules.name as schedule', 'employments.name as employment',
                'cities.name as city', 'professions.name as profession', 'publication_date',
                'users.company_name as company', 'users.photo_link')
            ->paginate(4);
        if($vacancies->total() == 0 || $vacancies == null) {
            return redirect()->back()->with('message', 'Нету вакансий с таким названием!');
        }
        dd($vacancies);
        return view('home', compact('vacancies'));
    }

    public function advancedSearchAction(Request $request)
    {
        $my = false; //для отображения ондной и той же вьюшки для моих вакансий и расшернного поиска, чтобы менялся текст
        $name = $request->get('name');
        $salary = $request->get('salary');
        $city = $request->get('city');
        $profession = $request->get('profession');
        $schedule = Schedules::where('name', $request->get('schedule'))->select('id')->first();
        $employment = Employments::where('name', $request->get('employment'))->select('id')->first();
        $experience = $request->get('experience');
        DB::enableQueryLog();
        if($name == null) {

            $vacancies = Vacancies::join('schedules', 'schedules.id', 'vacancies.schedule_id')
                ->join('employments', 'employments.id', 'vacancies.employment_id')
                ->join('professions', 'professions.id', 'vacancies.profession_id')
                ->join('cities', 'cities.id', 'vacancies.city_id')
                ->join('users', 'users.id', 'vacancies.user_id')
                ->where('salary','>=', $salary)
                ->where('city_id', $city)
                ->where('profession_id', $profession)
                ->where('schedule_id', $schedule->id)
                ->where('employment_id', $employment->id)
                ->where('experience', '<=', $experience)
                ->select('vacancies.id', 'vacancies.name', 'salary_min', 'salary_max', 'schedules.name as schedule', 'employments.name as employment',
                    'cities.name as city', 'professions.name as profession', 'publication_date',
                    'users.company_name as company', 'users.photo_link')
                ->paginate(4);
            //dd(DB::getQueryLog());
        }
        else {
            $vacancies = Vacancies::join('schedules', 'schedules.id', 'vacancies.schedule_id')
                ->join('employments', 'employments.id', 'vacancies.employment_id')
                ->join('professions', 'professions.id', 'vacancies.profession_id')
                ->join('cities', 'cities.id', 'vacancies.city_id')
                ->join('users', 'users.id', 'vacancies.user_id')
                ->where('vacancies.name', 'LIKE', "%$name%")
                ->orWhere('salary','>=', $salary)
                ->orWhere('city_id', $city)
                ->orWhere('profession_id', $profession)
                ->orWhere('schedule_id', $schedule)
                ->orWhere('employment_id', $employment)
                ->orWhere('experience', '<=', $experience)
                ->select('vacancies.id', 'vacancies.name', 'salary_min', 'salary_max', 'schedules.name as schedule', 'employments.name as employment',
                    'cities.name as city', 'professions.name as profession', 'publication_date',
                    'users.company_name as company', 'users.photo_link')
                ->paginate(4);
        }
        if($vacancies->total() == 0 || $vacancies == null) {
            return redirect()->back()->with('message', 'Нету вакансий с таким названием!');
        }

        return view('myVacancies', compact('vacancies', 'my'));
    }

    public function addVacancyAction(Request $request)
    {
        $check = MyVacancies::where('user_id', Auth::user()->id)
            ->where('vacancy_id', $request->get('vacancy'))
            ->select('id')->first();

        if($check != null) {
            return redirect()->back()->with('message', 'Вы уже добавили эту вакансию ранее!');
        }
        $my_vacancy = new MyVacancies([
            'vacancy_id' => $request->get('vacancy'),
            'user_id' => Auth::user()->id,
        ]);
        $my_vacancy->save();

        return redirect()->back()->with('message', 'Вакансия добавлена в избранное!');
    }

    public function removeVacancyAction(Request $request)
    {
        $id = $request->get('vacancy');
        if(Auth::user()->is_employer) {
            $my_vacancy = MyVacancies::where('vacancy_id', $id)->delete();
            $vacancy = Vacancies::where('id', $id)->first();
            $vacancy->delete();
            return redirect('/')->with('message', 'Вакансия удалена!');;
        }
        else {
            $my_vacancy = MyVacancies::where('vacancy_id', $id)
                ->where('user_id', Auth::user()->id)->first();
            $my_vacancy->delete();
            return redirect()->back()->with('message', 'Вакансия удалена!');
        }
    }
}
