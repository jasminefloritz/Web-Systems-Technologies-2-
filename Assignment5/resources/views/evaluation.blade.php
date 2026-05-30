<!DOCTYPE html>
<html>
<head>
    <title>Student Evaluation System</title>
</head>
<body>

<h2>Student Evaluation Result</h2>

@if($name && $prelim && $midterm && $final)

    @php
        $average = ($prelim + $midterm + $final) / 3;
    @endphp

    <p><strong>Name:</strong> {{ $name }}</p>
    <p><strong>Average:</strong> {{ number_format($average, 2) }}</p>

    {{-- Letter Grade --}}
    @if($average >= 90)
        <p><strong>Letter Grade:</strong> A</p>
    @elseif($average >= 80)
        <p><strong>Letter Grade:</strong> B</p>
    @elseif($average >= 70)
        <p><strong>Letter Grade:</strong> C</p>
    @elseif($average >= 60)
        <p><strong>Letter Grade:</strong> D</p>
    @else
        <p><strong>Letter Grade:</strong> F</p>
    @endif

    {{-- Remarks --}}
    @if($average >= 75)
        <p><strong>Remarks:</strong> Passed</p>
    @else
        <p><strong>Remarks:</strong> Failed</p>
    @endif

    {{-- Academic Award --}}
    @if($average >= 98)
        <p><strong>Award:</strong> With Highest Honors</p>
    @elseif($average >= 95)
        <p><strong>Award:</strong> With High Honors</p>
    @elseif($average >= 90)
        <p><strong>Award:</strong> With Honors</p>
    @else
        <p><strong>Award:</strong> No Award</p>
    @endif

@else
    <p>No data submitted.</p>
@endif

</body>
</html>
