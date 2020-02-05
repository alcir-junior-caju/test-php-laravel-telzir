<?php

namespace Modules\Telzir\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Calls\Models\Call;
use Modules\Plans\Models\Plan;

class TelzirController extends Controller
{
    private $call;
    private $plan;

    public function __construct(Call $call, Plan $plan)
    {
        $this->call = $call;
        $this->plan = $plan;
    }

    public function index()
    {
        $content['calls'] = $this->call->all();
        $content['plans'] = $this->plan->all();

        return view('Telzir::index')->with('content', $content);
    }

    public function calculate(Request $request)
    {
        $data = $request->all();

        $content['calls'] = $this->call->all();
        $content['plans'] = $this->plan->all();

        $values = explode('|', $data['plan']);

        $real = (float) $data['call'] * (int) $data['minutes'];
        $discount = (float) $data['call'] * ((int) $data['minutes'] - $values[0]);

        $result['real'] = $this->numberFormat($real);
        $result['discount'] = $this->numberFormat($discount + ($discount / 100 * $values[1]));

        $content['result'] = $result;

        return view('Telzir::index')->with('content', $content);
    }

    private function numberFormat($value)
    {
        return max(number_format($value, 2, ',', '.'), 0);
    }
}
