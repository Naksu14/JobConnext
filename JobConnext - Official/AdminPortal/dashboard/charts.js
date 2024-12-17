const ctxBCChart = document.getElementById('BCChart');
const ctxCCChart = document.getElementById('CCChart');
const ctxJCChart = document.getElementById('JCChart');
const ctxFBChart = document.getElementById('FBChart');




  new Chart(ctxBCChart, {
    type: 'bar',
    data: {
      labels: ['Approved', 'Pending', 'Rejected'],
      datasets: [{
        label: '# of Votes',
        data: [12, 19, 3],
        backgroundColor: ['#3679FE'],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });


  new Chart(ctxCCChart, {
    type: 'bar',
    data: {
      labels: ['Approved', 'Pending', 'Rejected'],
      datasets: [{
        label: '# of Votes',
        data: [5, 2, 3],
        backgroundColor: ['#E46232'],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
  new Chart(ctxJCChart, {
    type: 'line',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
      datasets: [{
        label: '# of Votes',
        data: [12, 19, 3, 5, 2, 3],
        backgroundColor: ['#E46232'],
        tension: 0.1,
        borderColor: '#E46232'
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

  new Chart(ctxFBChart, {
    type: 'doughnut',
    data: {
      labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
      datasets: [{
        label: '# of Votes',
        data: [12, 19, 3, 5, 2, 3],
        backgroundColor: ['#FF5733', '#33FF57', '#3357FF', '#F3FF33', '#8E33FF', '#FF33A1'],
        borderColor: ['#FF5733', '#33FF57', '#3357FF', '#F3FF33', '#8E33FF', '#FF33A1'],
        borderWidth: 1
      }]
    },
    options: {
      cutout: '70%', // Adjust the inner cutout size (percentage of chart radius)
      plugins: {
        legend: {
          position: 'top' // Adjust legend position if needed
        }
      }
    }
  });