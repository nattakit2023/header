<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-3"><canvas id="chart_job"></canvas></div>
    <div class="col-md-2"></div>
    <div class="col-md-3"><canvas id="chart_pms"></canvas></div>

</div>

<script>
    $(document).ready(function() {
        const chart_job = document.getElementById('chart_job');
        new Chart(chart_job, {
            type: 'pie',
            data: {
                labels: [
                    'Installation',
                    'Uninstall',
                    'PM',
                    'CM'
                ],
                datasets: [{
                    label: 'Job Order',
                    data: [<?= $service[0] ?>, <?= $service[1] ?>, <?= $service[2] ?>, <?= $service[3] ?>],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.8)',
                        'rgba(255, 99, 132, 0.8)',
                        'rgba(255, 205, 86, 0.8)',
                        'rgba(255, 159, 64, 0.8)',
                    ],

                }]
            },
        });
        const chart_pms = document.getElementById('chart_pms');
        new Chart(chart_pms, {
            type: 'pie',
            data: {
                labels: [
                    'On Service',
                    'Delay Working',
                    'OverDue'
                ],
                datasets: [{
                    data: [<?= $pms[0] ?>, <?= $pms[1] ?>, <?= $pms[2] ?>],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.8)',
                        'rgba(255, 205, 86, 0.8)',
                        'rgba(255, 99, 132, 0.8)',
                    ],

                }]
            },
        });
    });
</script>