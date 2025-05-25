/**
 * For usage, visit Chart.js docs https://www.chartjs.org/docs/latest/
 */
const lineConfig = {
  type: 'line',
  data: {
    labels: [],
    fill: true,
    datasets: [
      {
        label: 'Pemasukkan',
        /**
         * These colors come from Tailwind CSS palette
         * https://tailwindcss.com/docs/customizing-colors/#default-color-palette
         */
        backgroundColor: 'oklch(39.3% 0.095 152.535)',
        borderColor: 'oklch(76.8% 0.233 130.85)',
        data: [],
        
      },
      
      {
        label: 'Pengeluaran',
        
        /**
         * These colors come from Tailwind CSS palette
         * https://tailwindcss.com/docs/customizing-colors/#default-color-palette
         */
        backgroundColor: 'oklch(39.6% 0.141 25.723)',
        borderColor: 'oklch(63.7% 0.237 25.331)',
        data: [],
      },
    ],
  },
  options: {
    responsive: true,
    /**
     * Default legends are ugly and impossible to style.
     * See examples in charts.html to add your own legends
     *  */
    legend: {
      display: true,
    },
    tooltips: {
      mode: 'index',
      intersect: false,
    },
    hover: {
      mode: 'nearest',
      intersect: true,
    },
    scales: {
      x: {
        display: true,
        scaleLabel: {
          display: true,
          labelString: 'tanggal',
        },
        
      },
      y: {
        display: true,
        scaleLabel: {
          display: true,
          labelString: 'Value',
        },

      },
    },
  },
}


const lineCtx = document.getElementById('lineAdmin')
window.myLine = new Chart(lineCtx, lineConfig)

async function loadData() {
  try {
    const response = await fetch('adminchart-data')
    const data = await response.json()
    updateChart(data)
  } catch (error) {
    console.error('Gagal ambil data chart:', error)
  }
}

// update
function updateChart(newData) {
  window.myLine.data.labels = newData.labels
  window.myLine.data.datasets[0].data = newData.pemasukkan
  window.myLine.data.datasets[1].data = newData.pengeluaran
  window.myLine.update()
}

// panggil 
window.addEventListener('DOMContentLoaded', loadData)