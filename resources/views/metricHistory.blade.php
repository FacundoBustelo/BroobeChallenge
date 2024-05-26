@extends('app')
@section('content')

@if ($metricHistoryRuns->isEmpty())
        <p>No metric history available.</p>
    @else
        <table class="history-metric-table">
            <thead>
                <tr>
                    <th>URL</th>
                    <th>Strategy</th>
                    <th>Accessibility Metric</th>
                    <th>Best_Practices Metric</th>
                    <th>Performance Metric</th>
                    <th>SEO Metric</th>
                    <th>PWA Metric</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($metricHistoryRuns as $metricHistoryRun)
                    <tr>
                        <td>{{ $metricHistoryRun->url }}</td>
                        <td>{{ $metricHistoryRun->strategy->name }}</td>
                        <td>{{ $metricHistoryRun->accessibility_metric ?? '--'}}</td>
                        <td>{{ $metricHistoryRun['best-practices_metric'] ?? '--'}}</td>
                        <td>{{ $metricHistoryRun->performance_metric ?? '--'}}</td>
                        <td>{{ $metricHistoryRun->seo_metric ?? '--'}}</td>
                        <td>{{ $metricHistoryRun->pwa_metric ?? '--'}}</td>
                        <td>{{ $metricHistoryRun->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection

