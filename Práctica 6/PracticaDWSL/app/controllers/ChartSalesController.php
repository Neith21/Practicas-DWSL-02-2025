<?php
require_once(dirname(__FILE__) . "/../../config/config.php");
require_once(dirname(__FILE__) . "/../../core/database.php");
require_once(dirname(__FILE__) . "/../models/ChartSalesModel.php");

class ChartSalesController {
    private $db;
    private $chartSalesModel;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->chartSalesModel = new ChartSalesModel($this->db);
    }

    public function index() {
        include(dirname(__FILE__) . '/../views/chartSales/chartSales.php');
    }

    public function generateChart() {
        if (isset($_POST['start_date']) && isset($_POST['end_date'])) {

            $fechaInicio = $_POST['start_date'];
            $fechaFin = $_POST['end_date'];

            $salesData = $this->chartSalesModel->getSales($fechaInicio, $fechaFin);

            $nombres_productos = [];
            $cantidad_vendida = [];
            
            foreach ($salesData as $row) {
                $nombres_productos[] = $row['producto_nombre']; 
                $cantidad_vendida[] = (int)$row['cantidad_vendida']; 
            }

            header('Content-Type: application/json');
            echo json_encode([
                'labels' => $nombres_productos,
                'data'   => $cantidad_vendida
            ]);
        }
    }
}