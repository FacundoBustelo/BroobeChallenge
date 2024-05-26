<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MetricHistoryRun;
use App\Models\Strategy;


class Metric_history_runsController extends Controller
{
    public function index()
    {
        $metricHistoryRuns = MetricHistoryRun::with('strategy')->get();

        return view('metricHistory', compact('metricHistoryRuns'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'url'=> 'required',
            'strategy'=> 'required',
            'metrics'=> 'required'

        ]);

        $data = $request->all();
        $metricHistoryRun= new MetricHistoryRun;

        $metricHistoryRun->url=$data['url'];
        $metricHistoryRun->strategy_id=$data['strategy'];
        $metrics = $data['metrics'];

        foreach ($metrics as $metric) {
            $metricHistoryRun->{$metric['category'] . '_metric'} = $metric['score'];
        }
        $metricHistoryRun->save();
        return response()->json(['status' => 'success','message'=>'Metric saved on database']);
    }
}
