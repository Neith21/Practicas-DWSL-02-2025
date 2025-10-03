<?php include '../templates/header.php'; ?>

<style>
    .chart-container {
        position: relative;
        height: 60vh;
        width: 80vw;
        max-width: 900px;
        margin: auto;
    }
    .form-container {
        background-color: #ffffff;
        border-radius: 10px;
        padding: 25px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        max-width: 900px;
        width: 100%;
        margin-top: 20px;
    }
    .error-message {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
        padding: 1rem;
        border-radius: 5px;
        text-align: center;
        font-weight: bold;
        display: none;
        margin-bottom: 15px;
    }
</style>

<div class="container d-flex flex-column align-items-center justify-content-center py-5">
    
    <div class="chart-container">
        <canvas id="myLineChart"></canvas> </div>

    <div class="form-container">
        <div id="errorMessage" class="error-message"></div>
        
        <form id="chartForm" class="p-3">
            <h3 class="text-center mb-4">Filtrar Ventas por Fecha</h3>
            <div class="row g-3 align-items-end">
                <div class="col-md">
                    <label for="startDate" class="form-label">Fecha de Inicio:</label>
                    <input type="date" id="startDate" name="startDate" class="form-control" required>
                </div>
                <div class="col-md">
                    <label for="endDate" class="form-label">Fecha de Fin:</label>
                    <input type="date" id="endDate" name="endDate" class="form-control" required>
                </div>
                <div class="col-md-auto">
                    <button type="button" id="drawGraphic" class="btn btn-primary w-100">Generar Gráfico</button>
                </div>
            </div>
        </form>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    
<script>
$(document).ready(function() {
    let myChart;

    $('#drawGraphic').on('click', function() {
        const startDate = $('#startDate').val();
        const endDate = $('#endDate').val();
        const errorMessage = $('#errorMessage');

        if (!startDate || !endDate) {
            errorMessage.text('Por favor, selecciona ambas fechas.').show();
            return;
        }
        if (new Date(startDate) > new Date(endDate)) {
            errorMessage.text('La fecha de inicio no puede ser mayor que la fecha de fin.').show();
            return;
        }

        errorMessage.hide();

        $.ajax({
            url: 'chartSales.php',
            type: 'POST',
            data: {
                action: 'generateChart',
                start_date: startDate,
                end_date: endDate
            },
            dataType: 'json',
            success: function(response) {
                if (myChart) {
                    myChart.destroy();
                }

                const ctx = document.getElementById('myLineChart').getContext('2d');
                
                myChart = new Chart(ctx, {
                    type: 'line', 
                    data: {
                        labels: response.labels,
                        datasets: [{
                            label: 'Total de Ventas',
                            data: response.data,
                            fill: true,
                            borderColor: 'rgb(75, 192, 192)',
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            tension: 0.1
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            title: {
                                display: true,
                                text: 'Top 10 Productos Más Vendidos',
                                font: { size: 18 }
                            },
                            subtitle: {
                                display: true,
                                text: `Rango: ${startDate} a ${endDate}`,
                                padding: { bottom: 15 }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: 'Total Vendido ($)'
                                }
                            }
                        }
                    }
                });
            },
            error: function(xhr, status, error) {
                console.error("Error en la petición AJAX:", error);
                errorMessage.text('No se pudieron cargar los datos del gráfico. Inténtalo de nuevo.').show();
            }
        });
    });
});
</script>

<?php include '../templates/footer.php'; ?>