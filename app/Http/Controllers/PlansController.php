<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlan;
use App\Plan;
use Illuminate\Http\Request;

class PlansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $plans = Plan::query()
            ->orderBy('name')
            ->get();

        $success = $request->session()->get('success');

        return view('plans.index', compact('plans', 'success'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('plans.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlan $request)
    {
        $request->validated();

        $plan = new Plan;
        $plan->name = $request->name;
        $plan->price = $request->price;
        $plan->description = $request->description;
        $plan->save();

        $request->session()->flash('success', "Plano {$plan->name} cadastrado com sucesso!");

        return redirect('/plans');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function edit(Plan $plan)
    {
        return view('plans.edit', compact('plan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function update(StorePlan $request, Plan $plan)
    {
        $request->validated();

        $plan->name = $request->name;
        $plan->price = $request->price;
        $plan->description = $request->description;
        $plan->save();

        $request->session()->flash('success', "Plano {$plan->name} atualizado com sucesso!");

        return redirect('/plans');
    }
}
