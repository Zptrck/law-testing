var express = require("express");
var bodyParser = require("body-parser");


var app = express();
app.use(bodyParser.urlencoded( { extended: true } )); // support form-encoded bodies (for queries)


app.get("/", function(req, res){
    res.sendFile(__dirname + "/index.html");
});

//add
app.post("/", function(req, res){

    var num1 = Number(req.body.num1);
    var num2 = Number(req.body.num2);

    var result = num1+num2;

    console.log(req.body );

    res.send("Result is: " + result );
});

//bmiCalculator START
app.get("/bmiCalculator", function(req, res){
    res.sendFile(__dirname + "/bmiCalculator.html");
});
 

app.post("/bmiCalculator", function(req, res){

    var weight = Number(req.body.weight);
    var height = Number(req.body.height);

    var bmi = weight  / (height * height);

    bmi = bmi.toFixed(2); 
    res.send("Your BMI is: " + bmi);
});
//bmiCalculator END


app.listen(5500, function(){
    console.log("Server is running on port 5500");
});