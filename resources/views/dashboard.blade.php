@extends('layouts.v_sidebar')

@section('content')
    <style>
        .content {
            margin: 50px;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
            border-radius: 20px;
        }

        .chart {
            margin: 20px;
            width: 80%;
            /* ปรับความกว้างของ chart div เพื่อให้สอดคล้องกับการลดขนาด */
            max-width: 800px;
            height: auto;
        }

        /* Adjust size for chart3 */
        #chart3-container {
            width: 50%;
            /* You can adjust the height as needed */
            height: 250px;
            max-width: 600px;
            height: auto;
        }

        .box-chart {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap; /* Allow charts to wrap */
        }
    </style>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Bar charts</title>

        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js"></script>
    </head>

    <body>

        <div class="content">
            <h1 style="text-align: center; color:#333;">ข้อมูลผู้สมัครงานและสหกิจ</h1>

            <div class="box-chart">
                <div class="chart">
                    <canvas id="chart"></canvas>
                </div>

                <div class="chart">
                    <canvas id="chart2"></canvas>
                </div>

                <!-- Apply size adjustments to chart3 -->
                <div class="chart" id="chart3-container">
                    <canvas id="chart3"></canvas>
                </div>

            </div>

        </div>

        <script>
            var ctx = document.getElementById('chart').getContext('2d');
            var userChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($labels) !!},
                    datasets: {!! json_encode($datasets) !!}
                },
            });
        </script>

    </body>

    </html>
@endsection
