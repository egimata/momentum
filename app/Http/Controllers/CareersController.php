<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Lang;
use App\Career;
use Carbon\Carbon;

class CareersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (Lang::locale() == 'al'){
            $title = "Karriera ne Momentum Group";
            $description = "Vende vakante te Momentum Group.";
        }else if (Lang::locale() == 'en'){
            $title = "Momentum Group Career";
            $description = "Vacancies in Momentum Group.";
        }else if (Lang::locale() == 'it'){
            $title = "Carriera in Momentum Group";
            $description = "Offerte di Lavoro in Momentum Group.";
        }

        $careers = Career::orderBy('expirationdate', 'asc')->where('expirationdate', '>=', Carbon::today())->get();
        return view('careers.index')->with('careers', $careers)->with('title', $title)->with('description', $description)->with('lang', Lang::locale());

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
           //
           if (Lang::locale() == 'al'){
            $title = "Karriera ne Momentum Group";
            $description = "Vende vakante te Momentum Group.";
        }else if (Lang::locale() == 'en'){
            $title = "Momentum Group Career";
            $description = "Vacancies in Momentum Group.";
        }else if (Lang::locale() == 'it'){
            $title = "Carriera in Momentum Group";
            $description = "Offerte di Lavoro in Momentum Group.";
        }

        $career = Career::find($id);
        return view('careers.show')->with('career', $career)->with('title', $title)->with('description', $description)->with('lang', Lang::locale());

    }

        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function test($id)
    {
        //
           //
           if (Lang::locale() == 'al'){
            $title = "Karriera ne Momentum Group";
            $description = "Vende vakante te Momentum Group.";
        }else if (Lang::locale() == 'en'){
            $title = "Momentum Group Career";
            $description = "Vacancies in Momentum Group.";
        }else if (Lang::locale() == 'it'){
            $title = "Carriera in Momentum Group";
            $description = "Offerte di Lavoro in Momentum Group.";
        }

        $career = Career::find($id);
        return view('careers.test')->with('career', $career)->with('title', $title)->with('description', $description)->with('lang', Lang::locale());

    }

}
