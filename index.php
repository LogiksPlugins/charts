<?php
if(!defined('ROOT')) exit('No direct script access allowed');

function loadChartLib($chartLib="chartjs") {
  if($chartLib==null || strlen($chartLib)<=0) return;
  
  switch(strtolower($chartLib)) {
    case "chartjs":
      echo _js("chart");
    break;
    case "jquery.sparkline":case "sparkline":
      echo _js("jquery.sparkline");
    break;
    case "jqplot":
      loadVendor("jqplot");
    break;
    case "flot":
      loadVendor("flot");
    break;
    case "googlechart":case "gchart":
      loadVendor("googleChart");
    break;
    case "highchart":
      loadVendor("highCharts");
    break;
  }
}
?>