<?php

namespace Modules\Calls\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Calls\Models\Call;
use Illuminate\Support\Facades\Session;
use Modules\Calls\Http\Request\CallRequest;

class CallsController extends Controller
{
    private $call;

    public function __construct(Call $call)
    {
        $this->call = $call;
    }

    public function index()
    {
        $calls = $this->call->orderBy('id', 'desc')->get();
        return view('Call::index')->with('calls', $calls);
    }

    public function store(CallRequest $request)
    {
        $data = $request->all();
        $this->call->create($data);

        $call = $this->call->all()->last();

        Session::flash('message_type', BOOTSTRAP_SUCCESS);
        Session::flash(
            'message',
            "A chamada de <strong>(
            {$call->present()->getCall('origin')} para
            {$call->present()->getCall('destination')}
            )</strong> foi cadastrada corretamente!"
        );

        return redirect()->route('admin.calls.index');
    }

    public function update(CallRequest $request, $id)
    {
        $call = $this->call->findOrFail($id);
        $call->update($request->all());

        Session::flash('message_type', BOOTSTRAP_SUCCESS);
        Session::flash(
            'message',
            "A chamada de <strong>(
            {$call->present()->getCall('origin')} para
            {$call->present()->getCall('destination')}
            )</strong> foi alterada corretamente!"
        );

        return redirect()->route('admin.calls.index');
    }

    public function destroy($id)
    {
        $call = $this->call->findOrFail($id);
        $call->delete();

        Session::flash('message_type', BOOTSTRAP_SUCCESS);
        Session::flash(
            'message',
            "A chamada de <strong>(
            {$call->present()->getCall('origin')} para
            {$call->present()->getCall('destination')}
            )</strong> foi excluida corretamente!"
        );

        return redirect()->route('admin.calls.index');
    }
}
