function greet(name) {
    let greeting = `Hello, ${name}!`;
    return greeting;
  }
  
  function main() {
    let name = prompt("Enter your name:");
  
    let message = greet(name);
  
    alert(message);
  }
  
 
  main();