@extends('backend.dashboard.layouts.app')

@section('content')
    <h1>Attendance List</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Date</th> 
                <th>Day</th>
                <th>Check-In Time</th>
                <th>Check-Out Time</th>
                <th>Duration</th>
            </tr>
        </thead>
        <tbody>
            @foreach($attendances as $attendance)
                <tr>
                    <td>{{ $attendance->id }}</td>
                    <td>{{ $attendance->date }}</td>
                    <td>{{ $attendance->day }}</td>
                    <td>{{ $attendance->check_in_time }}</td>
                    <td>{{ $attendance->check_out_time }}</td>
                    <td>{{ $attendance->duration }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection