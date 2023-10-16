@extends('layout.master')

@section('content')
    <h3>Schools Members Report</h3>
    <canvas id="schoolsGraph" width="400" height="100" role="img"></canvas>
@endsection

@section('javascript')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <script>
        const data = {
            labels: @json($schools->pluck('name')),
            datasets: [{
                data: @json($schools->pluck('members_count'))
                // Should probably set a nice set of colours for the system to use here, but keeping it simple
            }]
        };

        const config = {
            type: 'bar',
            data: data,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                }
            },
        };

        const ctx = document.getElementById('schoolsGraph').getContext('2d');
        new Chart(ctx, config);
    </script>
@endsection
