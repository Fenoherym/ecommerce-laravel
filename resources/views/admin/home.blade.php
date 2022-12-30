@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-4">
                <div class="card shadow-sm p-3 mb-5 bg-body rounded" style="display: flex; height:90px; width:270px; justify-content:center; align-items:center; border-left: 2px solid rgb(31, 221, 31); border-radius: 10px">
                    <p style="font-size: 18px">
                        nombre de visiteurs par adresse IP:
                        {{ $visiteurs->count() }}
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm p-3 mb-5 bg-body rounded text-center" style="display: flex; height:90px; width:270px; justify-content:center; align-items:center; border-left: 2px solid rgb(31, 221, 31); border-radius: 10px">
                    <p style="font-size: 18px">
                        nombre de visiteurs par session:
                        @php
                            $count = 0;
                        @endphp
                        @foreach ($sessions as $session)
                            @php
                                $session_data[] = $session->count;
                                $count = $count + $session->count
                            @endphp
                        @endforeach
                        {{ $count }}
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm p-3 mb-5 bg-body rounded" style="display: flex; height:90px; width:270px; justify-content:center; align-items:center; border-left: 2px solid rgb(31, 221, 31); border-radius: 10px">
                    <p style="font-size: 18px">
                        nombre de clients:
                        {{ $users->count() }}
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6" style="height: 500px !important;">
                <canvas id="myChart" style="height: 500px !important; "></canvas>
            </div>
            <div class="col-md-6">
                <canvas id="myChart2"></canvas>
            </div>
        </div>

    </div>
@endsection
@section('extra-js')
<script>
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Janvier', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Decembre'],
            datasets: [{
                label: '# Nombre de visiteurs par adresse IP',
                data: [<?= $nbr_janvier ?>,<?= $nbr_fevrier ?>,<?= $nbr_mars ?>, <?= $nbr_avril ?>
                , <?= $nbr_mai ?>, <?= $nbr_juin ?>, <?= $nbr_juillet ?>, <?= $nbr_aout ?>, <?= $nbr_septembre ?>, <?= $nbr_octobre ?>, <?= $nbr_novembre ?>, <?= $nbr_decembre ?>],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }, options: { maintainAspectRatio: false, }

    });
    const ctx2 = document.getElementById('myChart2').getContext('2d');
    const myChart2 = new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: ['Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Janvier', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Decembre'],
            datasets: [{
                label: '# Nombre de visiteurs a chaque session',
                data: [<?= $session_data[0] ?>,<?= $session_data[1] ?>,<?= $session_data[2] ?>, <?= $session_data[3] ?>
                , <?= $session_data[4] ?>, <?= $session_data[5] ?>, <?= $session_data[6] ?>, <?= $session_data[7] ?>, <?= $session_data[8] ?>, <?= $session_data[9] ?>, <?= $session_data[10] ?>, <?= $session_data[11]?>],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                }
            }
        },
        options: { maintainAspectRatio: false, }
    });
</script>

@endsection
