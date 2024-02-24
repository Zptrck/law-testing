// const express = require("express");
// const https = require("https");

// const app = express();


// app.get("/", function(req, res){

//     const url = "https://api.openweathermap.org/data/2.5/weather?q=London&appid=9681d0096a4bf92b4ce644248468d348&units=metric"
//     https.get(url, function(response){
//         console.log(response.statusCode);
//     })

//     res.send("Server is up and running");
// });



 




// app.listen(5500, function(){
//     console.log("Server is running on port 5500");
// });






const express = require("express");
const https = require("https");

const app = express();

app.get("/", function(req, res) {
  const url =
    "https://api.openweathermap.org/data/2.5/weather?q=Philippines&appid=9681d0096a4bf92b4ce644248468d348&units=metric";

  https.get(url, function(response) {
    console.log(response.statusCode);

    let rawData = "";

    response.on("data", function(chunk) {
      rawData += chunk;
    });

    response.on("end", function() {
      try {
        const weatherData = JSON.parse(rawData);
        const temperature = weatherData.main.temp;
        const weatherDescription = weatherData.weather[0].description;
        const humidity = weatherData.main.humidity;
        const html = `
          <h1>Weather in Philippines</h1>
          <p>Temperature: ${temperature} &#8451;</p>
          <p>Description: ${weatherDescription} <br> <br> Humidity : ${humidity} % </p>
          <p></p>
        `;

        res.send(html);
      } catch (error) {
        console.error(error);
        res.send("An error occurred while fetching weather data.");
      }
    });
  });
});

app.listen(5500, function() {
  console.log("Server is running on port 5500");
});