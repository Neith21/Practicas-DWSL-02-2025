<?php
require_once(dirname(__FILE__) . "/../../core/database.php");

class ChartSalesModel
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

public function getSales($fechaInicio, $fechaFin) {
    $query = "
        SELECT
            producto_nombre,
            COUNT(producto_nombre) AS cantidad_vendida
        FROM
            ventas
        WHERE
            DATE(fecha_venta) BETWEEN :fechaInicio AND :fechaFin
        GROUP BY
            producto_nombre
        ORDER BY
            cantidad_vendida DESC
        LIMIT 10;
    ";

    $stmt = $this->conn->prepare($query);
    $stmt->execute([':fechaInicio' => $fechaInicio, ':fechaFin' => $fechaFin]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
}
