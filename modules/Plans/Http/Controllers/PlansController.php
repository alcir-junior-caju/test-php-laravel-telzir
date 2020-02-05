<?php

namespace Modules\Plans\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Plans\Models\Plan;
use Illuminate\Support\Facades\Session;
use Modules\Plans\Http\Request\PlanRequest;

class PlansController extends Controller
{
    private $plan;

    public function __construct(Plan $plan)
    {
        $this->plan = $plan;
    }

    public function index()
    {
        $plans = $this->plan->orderBy('id', 'desc')->get();
        return view('Plan::index')->with('plans', $plans);
    }

    public function store(PlanRequest $request)
    {
        $data = $request->all();
        $this->plan->create($data);

        $plan = $this->plan->all()->last();

        Session::flash('message_type', BOOTSTRAP_SUCCESS);
        Session::flash('message', "O Plano <strong>({$plan->name})</strong> foi cadastrado corretamente!");

        return redirect()->route('admin.plans.index');
    }

    public function update(PlanRequest $request, $id)
    {
        $plan = $this->plan->findOrFail($id);
        $plan->update($request->all());

        Session::flash('message_type', BOOTSTRAP_SUCCESS);
        Session::flash('message', "O Plano <strong>({$plan->name})</strong> foi alterado corretamente!");

        return redirect()->route('admin.plans.index');
    }

    public function destroy($id)
    {
        $plan = $this->plan->findOrFail($id);
        $plan->delete();

        Session::flash('message_type', BOOTSTRAP_SUCCESS);
        Session::flash('message', "O Plano <strong>({$plan->name})</strong> foi excluido corretamente!");

        return redirect()->route('admin.plans.index');
    }
}
