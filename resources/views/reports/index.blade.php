@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>Report of this organization</h1>
            <p>
                Reports vary by size, format, and function. You need to be flexible and adjust your report to the needs of the audience. Reports are typically organized around six key elements:
            </p>
            <ol>
                <li>Who the report is about and/or prepared for</li>
                <li>What was done, what problems were addressed, and the results, including conclusions and/or recommendations</li>
                <li>Where the subject studied occurred</li>
                <li>When the subject studied occurred</li>
                <li>Why the report was written (function), including under what authority, for what reason, or by whose request</li>
                <li>How the subject operated, functioned, or was used</li>
            </ol>
            <p>
                Pay attention to these essential elements when you consider your stakeholders. That may include the person(s) the report is about, whom it is for, and the larger audience of the organization. Ask yourself who the key decision makers are, who the experts will be, and how your words and images may be interpreted. While there is no universal format for a report, there is a common order to the information. Each element supports the main purpose or function, playing an important role in the transmission of information.
            </p>

            <h2>Summary:</h2>
            <ul class="list-group">
                <li class="list-group-item">Total Organizations:------------------------------------------------> {{ $organizations}}</li>
                <li class="list-group-item">Total Projects:-----------------------------------------------------> {{ $projects }}</li>
                <li class="list-group-item">Total Tasks: ------------------------------------------------------->{{ $tasks }}</li>
                <li class="list-group-item">Total Departments:--------------------------------------------------> {{ $departments }}</li>
                <li class="list-group-item">Total Users: ------------------------------------------------------->{{ $allUsers }}</li>
                <li class="list-group-item">Total Admin Users:--------------------------------------------------> {{$adminRole}}</li>
            </ul>
            <a href= "{{route('reports.generateReport')}}" class="btn btn-primary m-5 ">Print report</a>
        </div>

    </div>
</div>

@endsection
