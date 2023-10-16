@extends('layout.master')

@section('content')
    <h3>Schools Members Report</h3>
    <div class="mb-3">
        <label for="countries" class="form-label">Showing members for countries</label>
        <select class="form-select" multiple name="countries[]" id="countries" required>
            @foreach ($schools->pluck('country') as $country)
                <option selected>{{ $country }}</option>
            @endforeach
        </select>
    </div>
    <canvas id="schoolsGraph" width="400" height="100" role="img"></canvas>
@endsection

@section('javascript')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <script>
        const schoolData = @json($schools)

        $('select#countries').click(function() {
            chart.data = graphData();
            chart.update();
        });

        function graphData() {
            let data = [];
            let countries = $('select#countries').val();
            $.each(schoolData, function (index, school) {
                if (countries.includes(school.country)) {
                    data.push(school.members_count);
                }
                else {
                    data.push(0);
                }
            });

            return {
                labels: @json($schools->pluck('name')),
                datasets: [{
                    data: data
                    // Should probably set a nice set of colours for the system to use here, but keeping it simple
                }]
            };
        }

        const config = {
            type: 'bar',
            data: graphData(),
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
        const chart = new Chart(ctx, config);
    </script>
@endsection
