const labels = ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"];

  // Won Revenue Chart
  new Chart(document.getElementById("wonRevenueChart"), {
    type: "line",
    data: {
      labels: labels,
      datasets: [{
        label: "Won",
        data: [0, 0, 0, 0, 0, 0, 0],
        borderColor: "green",
        backgroundColor: "rgba(0, 128, 0, 0.1)",
        tension: 0.4
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: { display: false }
      },
      scales: {
        y: { beginAtZero: true }
      }
    }
  });

  // Lost Revenue Chart
  new Chart(document.getElementById("lostRevenueChart"), {
    type: "line",
    data: {
      labels: labels,
      datasets: [{
        label: "Lost",
        data: [0, 0, 0, 0, 0, 0, 0],
        borderColor: "red",
        backgroundColor: "rgba(255, 0, 0, 0.1)",
        tension: 0.4
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: { display: false }
      },
      scales: {
        y: { beginAtZero: true }
      }
    }
  });


  // Existing Won and Lost Revenue Charts here...

  // Leads Chart: Y = 1, 2, 3 | X = 1 June to 30 June
 // Leads Chart for June 1–30
const juneLabels = Array.from({ length: 30 }, (_, i) => `${i + 1} June`);
const leadsData = Array(30).fill().map(() => (Math.random() * 0.9 + 0.1).toFixed(2)); // values between 0.1–1.0

new Chart(document.getElementById("leadsChart"), {
  type: "line",
  data: {
    labels: juneLabels,
    datasets: [{
      label: "Leads",
      data: leadsData,
      borderColor: "#0d6efd",
      backgroundColor: "rgba(13, 110, 253, 0.1)",
      fill: true,
      tension: 0.4,
      pointRadius: 2
    }]
  },
  options: {
    responsive: true,
    plugins: {
      legend: { display: true }
    },
    scales: {
      y: {
        beginAtZero: true,
        min: 0,
        max: 1,
        ticks: {
          stepSize: 0.1,
          callback: function(value) {
            return value.toFixed(1);
          }
        },
        title: {
          display: true,
          text: "Lead Value (0.1 – 1.0)"
        }
      },
      x: {
        title: {
          display: true,
          text: "June Dates"
        },
        ticks: {
          maxRotation: 90,
          minRotation: 45
        }
      }
    }
  }
});

