@extends('app')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="form-container">
    <form class='from-metrics' id="metricsForm">
        <div class="form-url">
            <label class="form-label" for="InputUrl" >URL</label>
            <input type="text" class="form-input" id="InputUrl" name="url" placeholder='ej: https://www.broobe.com/es/'>
        </div>
        <div class="form-categories">
            <label class="form-label">CATEGORIES</label>
            <div class="form-check-group">
                @foreach ($categories as $category)
                <div class="form-check">
                    <input type="checkbox" class="category-checkbox" name="categories[]" value="{{ $category->name }}" id="Check{{ $category->name }}">
                    <label for="Check{{ $category->name }}">{{ $category->name }}</label>
                </div>
                @endforeach
            </div>
        </div>
        <div class="form-strategies">
            <label class="form-label" for="SelectStrategy">STRATEGY</label>
            <select name="strategy" id="SelectStrategy" class="form-select">
                @foreach ($strategies as $strategy)
                    <option value="{{ $strategy->id }}">{{ $strategy->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-btn-container">
        <button type="button" class="form-btn" id="runMetricButton">Get metrics</button>
        </div>
    </form>
    <div class="loadingContainer">
        <img id="loading" src="images/loading.gif" style="display: none;" alt="Loading...">
    </div>
    <div class="div-results" id="results">
    </div>
    <div class="form-btn-container" >
        <button type="button" class="form-btn" id="saveMetric" hidden>Save Metric Run</button>
    </div>
    <div class='message-container' id='message-container'>

    </div>
</div>

@endsection
