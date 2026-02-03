// 'use strict';
var it = {
    from : 1,
    to : 10,
    [Symbol.iterator]() {
        this.currentNumber = this.from;
        return this;
    },
    next() {
        if (this.currentNumber <= this.to) {
            return {done: false, value: this.currentNumber++};
        } else {
            return {done: true};
        }
    }
}

// for (let n of it) {
//     console.log("n ===> "+n);
// }

let testObject = {
    name : "saber"
    ,list: [1,2,3,4,5,6,7,8,9,10]
    ,testFunc : function () {
        console.log(this);
        console.log(this.name);
        // let myObjectThis = this;
        // this.list.forEach(function (element) {
        //    console.log(myObjectThis);
        // });

        this.list.forEach(function (element) {
            console.log(this);
        }.bind(this));
    }
}

testObject.testFunc();

function test(){
    console.log(this);
}