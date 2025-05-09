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
      labels: ['January', 'February', 'March', 'April', 'May', 'June'], // Replace with relevant months
      datasets: [
          {
              label: 'Construction',
              data: [15, 20, 25, 18, 22, 30], // Replace with actual data
              borderColor: '#E46232', // Orange
              backgroundColor: 'rgba(228, 98, 50, 0.2)',
              borderWidth: 2,
              tension: 0.4,
              fill: false
          },
          {
              label: 'IT and Software',
              data: [10, 15, 8, 12, 18, 25], // Replace with actual data
              borderColor: '#208AAE', // Blue
              backgroundColor: 'rgba(32, 138, 174, 0.2)',
              borderWidth: 2,
              tension: 0.4,
              fill: false
          },
          {
              label: 'Healthcare',
              data: [5, 10, 15, 20, 25, 18], // Replace with actual data
              borderColor: '#8BC34A', // Green
              backgroundColor: 'rgba(139, 195, 74, 0.2)',
              borderWidth: 2,
              tension: 0.4,
              fill: false
          },
          {
              label: 'Education',
              data: [8, 12, 14, 16, 18, 22], // Replace with actual data
              borderColor: '#FFB300', // Yellow
              backgroundColor: 'rgba(255, 179, 0, 0.2)',
              borderWidth: 2,
              tension: 0.4,
              fill: false
          },
          {
              label: 'Logistics',
              data: [7, 14, 12, 17, 16, 20], // Replace with actual data
              borderColor: '#7E57C2', // Purple
              backgroundColor: 'rgba(126, 87, 194, 0.2)',
              borderWidth: 2,
              tension: 0.4,
              fill: false
          }
      ]
  },
  options: {
      responsive: true,
      plugins: {
          legend: {
              position: 'top', // Legend at the top
          },
          title: {
              display: true,
              text: 'Most Job Categories Selected Over Time' // Chart Title
          }
      },
      scales: {
          y: {
              beginAtZero: true, // Start y-axis at 0
              title: {
                  display: true,
                  text: 'Number of Selections'
              }
          },
          x: {
              title: {
                  display: true,
                  text: 'Months'
              }
          }
      }
  }
});


  new Chart(ctxFBChart, {
    type: 'doughnut',
    data: {
      labels: ['Excellent', 'Good', 'Average', 'Poor', 'Bad'],
        datasets: [{
            label: 'Feedback Rating',
            data: [30, 25, 15, 10, 5], // Example data: Adjust for your use case
            backgroundColor: [
                '#28A745', // Excellent - Green
                '#85C744', // Good - Light Green
                '#FFC107', // Average - Yellow
                '#FD7E14', // Poor - Orange
                '#DC3545'  // Bad - Red
            ],
            borderColor: '#FFFFFF', // White border for clarity
            borderWidth: 2
        }]
    },
    options: {
      rotation: -90,
      circumference: 180,
      
      cutout: '70%', // Adjust the inner cutout size (percentage of chart radius)
      plugins: {
        legend: {
            position: 'top', // Legend displayed at the top
            labels: {
                font: {
                    size: 14
                }
            }
        },
        title: {
            display: true,
            text: 'Feedback Ratings (Excellent to Bad)'
        }
    }
  }
  });

