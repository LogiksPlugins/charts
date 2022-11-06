<?php
if(!defined('ROOT')) exit('No direct script access allowed');

if(!function_exists('loadChartLib')) {
  function getChartLibList() {
    return [
      "chartjs",
      "sparkline",
      "jqplot",
      "flot",
      "googlechart",
      "gchart",
      "highchart",
      "apexCharts",
      "echarts"
    ];
  }
  function loadChartLib($chartLib=false) {
    if(!$chartLib || $chartLib==null || strlen($chartLib)<=0) $chartLib=getConfig("DEFAULT_CHART_LIB");
    
    if(!in_array(strtolower($chartLib),getChartLibList())) {
      return false;
    }

    switch(strtolower($chartLib)) {
      case "chartjs":
        echo _js("chart");
      break;
      case "jquery.sparkline":case "sparkline":
        echo _js("jquery.sparkline");
      break;
      case "jqplot":
        if(checkVendor("jqplot")) loadVendor("jqplot");
        echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/jqPlot/1.0.9/jquery.jqplot.js"></script>';
      break;
      case "flot":
        if(checkVendor("flot")) loadVendor("flot");
        else echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/flot/4.2.3/jquery.flot.js"></script>';
      break;
      case "googlechart":case "gchart":
        if(checkVendor("googleChart")) loadVendor("googleChart");
        else echo '<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>';
      break;
      case "highchart":
        if(checkVendor("highCharts")) loadVendor("highCharts");
        else echo '<script src="https://code.highcharts.com/highcharts.js"></script>';
      break;
      case "apexcharts":
        if(checkVendor("apexCharts")) loadVendor("apexCharts");
        else echo '<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>';
      break;
      case "echarts":
        if(checkVendor("eCharts")) loadVendor("eCharts");
        else echo '<script src="https://cdn.jsdelivr.net/npm/echarts@5.4.0/dist/echarts.min.js"></script>';
        //else echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/5.4.0/echarts.min.js"></script>';
      break;
    }
    
    $jsFile=dirname(__FILE__)."/plugins/{$chartLib}.js";
    if(file_exists($jsFile)) {
      ?>
      <script type="text/javascript"><?=readfile($jsFile)?></script>
      <?php
    }

    return true;
  }
}
?>