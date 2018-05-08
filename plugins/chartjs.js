function renderChart(divID, typeOfChart, originalData, params) {
  if(params==null) params=[];
  
  finalData=transformDataForChart(typeOfChart, originalData, params);
  
  //plot chart code
}

function transformDataForChart(typeOfChart, dataForChart, params) {
  if(params==null) params=[];
  finalData=[];
  
  switch(typeOfChart) {
    case "pie":
      break;
    default:
  }
  
  return finalData;
}
