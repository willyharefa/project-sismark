<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class TotalSalesMarketingChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        return $this->chart->lineChart()
            ->setTitle('Penjualan Sales Marketing.')
            ->setSubtitle('PT Mito Energi Indonesia')
            ->setHeight(350)
            ->addData('Digital sales', [70, 29, 77, 28, 55, 45])
            ->setXAxis(['Jan', 'Feb', 'March', 'April', 'May', 'June']);
    }
}
