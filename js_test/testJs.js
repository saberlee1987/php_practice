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
            result = number1/ number2;
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