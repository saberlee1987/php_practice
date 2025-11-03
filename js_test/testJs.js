'use strict';
let array = [];
array.push(1, 2, 3, 4, 5, 6, 7);
array.pop();
array = array.concat([7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25]);
array.forEach((value, i) => console.log(i + " ==> " + value));
console.log(array instanceof Array);
console.log(Array.isArray(array));
console.log(array.toString());
console.log(array.join("-"));
console.log(array.filter(value => {return value % 2 === 0}).toString())
console.log(array.map(value => {return value * 2}).toString())
console.log(array.sort((v1,v2)=>{return v2 - v1}).toString()) //desc
console.log(array.sort((v1,v2)=>{return v1 - v2}).toString()) //asc

let date = new Date(1987,11,7,5,0,0);
console.log(date)

console.log("timestamp ==> "+new Date().getTime())
// let i = 1;
// setTimeout(function (){
//     console.log("i ===> ",i++);
// },1500)
// setInterval(function (){
//     console.log("i ===> ",i++);
// },1500)


function test() {
    document.getElementById("demo")
        .innerHTML = "hello,I am an output";

    console.log("test");
}

function calculator() {
    let number1 = document.getElementById("number1")
        .value;
    let number2 = document.getElementById("number2")
        .value;
    let operator = document.getElementById("operator")
        .value;
    // console.log("operator ==> ", operator)
    // console.log("number1 ==> ", number1)
    // console.log("number2 ==> ", number2)
    document.getElementById("result")
        .innerText = calculate(number1, number2, operator);
}

function calculate(number1, number2, operator) {
    var result = 0;
    number1 = parseFloat(number1);
    number2 = parseFloat(number2);
    switch (operator) {
        case "+":
            result = number1 + number2;
            break;
        case "*":
            result = number1 * number2;
            break;
        case "/":
            result = number1 / number2;
            break;
        case "-":
            result = number1 - number2;
            break;
        default:
            console.log("error operator ")
    }
    if (result !== 0) {
        result = `${number1} ${operator} ${number2} = ${result.toFixed(2)}`;
    }
    return result;
}

function mouseover(event) {
    console.log(event);
    console.log("mouseover event");
}

function changer(event) {
    console.log(event);
    console.log("changer event");
}