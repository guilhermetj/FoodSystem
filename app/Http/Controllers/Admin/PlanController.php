<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\http\Requests\StoreUpdatePlan;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{

    private $repository;

    public function __construct(Plan $plan)
    {
        $this->repository = $plan;
    }

    public function index()
    {
        $plans = $this->repository->latest()->paginate();

        return view('admin.pages.plans.index', [
            'plans' => $plans,
        ]);
    }
    public function create()
    {
        return view('admin.pages.plans.create');
    }
    public function store(StoreUpdatePlan $request)
    {
        $data = $request->all();
        $data['url'] = Str::kebab($request->name);
        $this->repository->create($data);

        return redirect()
        ->route('plans.index')
        ->with('message', 'Plano Adicionado com sucesso');
    }
    public function show($url)
    {
        $plan = $this->repository->where('url', $url)->first();

        if (!$plan)
            return redirect()->back();

        return view('admin.pages.plans.show', [
            'plan' => $plan,
        ]);
    }
    public function destroy($url)
    {
        $plan = $this->repository->where('url', $url)->first();

        if (!$plan)
        return redirect()->back();

        $plan->delete();

        return redirect()
                        ->route('plans.index')
                        ->with('message', 'Registro deletado com sucesso');

    }
    public function edit($url)
    {
        $plan = $this->repository->where('url', $url)->first();

        if (!$plan)
            return redirect()->back();

        return view('admin.pages.plans.edit', [
            'plan' => $plan,
        ]);
    }
    public function update(StoreUpdatePlan $request, $url)
    {
        $plan = $this->repository->where('url', $url)->first();

        if (!$plan)
        return redirect()->back();

        $plan->update($request->all());

        return redirect()
                        ->route('plans.index')
                        ->with('message', 'Registro Editado com sucesso');

    }
    public function search(Request $request)
    {
        $filters = $request->except('_token');

        $plans = $this->repository->search($request->filter);

        return view('admin.pages.plans.index', [
            'plans' => $plans,
            'filters' =>$filters,
        ]);
    }

}
