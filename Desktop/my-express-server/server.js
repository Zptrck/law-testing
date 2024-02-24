const express = require("express");
const app = express();

app.get("/", function(request, response){
    response.send("Hello World!");
});


app.get("/contact", function(req, res){
    res.send("Contact me: Dphat@gmail.com");
});


app.get("/about", function(req, res){
    res.send("<p>My name is Pat.</p>");
});

app.get("/hobby", function(req, res){
    res.send("<ul><li>coffee</li><li>code</li></ul>");
});


app.listen(5500, function(){
    console.log("Server start on port 5500");
});