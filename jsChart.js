var options = {
  chart: {
    type: "bar",
  },
  series: [
    {
      name: "sales",
      data: [30, 40, 35, 50, 49, 60, 70, 91, 125],
    },
  ],
  xaxis: {
    categories: [1991, 1992, 1993, 1994, 1995, 1996, 1997, 1998, 1999],
  },
};

var chart = new ApexCharts(document.querySelector("#chart"), options);
chart.render();

// $(document).ready(function () {
//   $.ajax({
//     url: "http://localhost/testPhp/data.php",
//     method: "GET",
//     success: function (data) {
//       console.log(data);
//       var player = [];
//       var score = [];

//       for (var i in data) {
//         player.push("Player " + data[i].playerid);
//         score.push(data[i].score);
//       }

//       var chartdata = {
//         labels: player,
//         datasets: [
//           {
//             label: "Player Score",
//             backgroundColor: "rgba(200, 200, 200, 0.75)",
//             borderColor: "rgba(200, 200, 200, 0.75)",
//             hoverBackgroundColor: "rgba(200, 200, 200, 1)",
//             hoverBorderColor: "rgba(200, 200, 200, 1)",
//             data: score,
//           },
//         ],
//       };

//       var ctx = $("#mycanvas");

//       var barGraph = new Chart(ctx, {
//         type: "bar",
//         data: chartdata,
//       });
//     },
//     error: function (data) {
//       console.log(data);
//     },
//   });
// });
