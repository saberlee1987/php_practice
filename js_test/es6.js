// function sum(n1 , n2) {
//     return n1 + n2;
// }

let sum = (n1, n2) => {
    return n1 + n2
};

// console.log("sum ( 10 , 15) ==> " + sum(10, 15));
// console.log("sum ( 24 , 25) ==> " + sum(24, 25));

// function Person(firstname, lastname, age) {
//     this.firstname = firstname;
//     this.lastname = lastname;
//     this.age = age;
//     that = this;
//     //
//     setInterval(function (){
//         that.age++;
//         console.log("age 500 ==> "+that.age);
//     },500);
//
//     setInterval( ()=>{
//         this.age++;
//         console.log("age 1000 ==> "+this.age);
//     },1000);
// }

//let p = new Person("saber","azizi",10)

// function sum2(n1,n2) {
//     console.log(arguments);
// }
//
// console.log(sum2(17,19))

// let obj = {
//     a : 15
//     ,b : function (){
//         console.log(this.a,this)
//     }
//     , c : () => {
//         console.log(this.a,this)
//     }
// }
// obj.b();
// obj.c();


class Person {
    constructor(firstname, lastname, age) {
        this.firstname = firstname;
        this.lastname = lastname;
        this.age = age;
    }

    sleep() {
        return `${this.firstname}  ${this.lastname} sleeping `
    }
}

class Student extends Person {
    constructor(firstname, lastname, age, field, studentNumber) {
        super(firstname, lastname, age);
        this.field = field;
        this.studentNumber = studentNumber;
    }

    study(hours) {
        return `${this.firstname} ${this.lastname} study for ${hours} hours`;
    }

    static method1() {
        console.log("method 1 is static ...")
    }
}

let person1 = new Person("saber", "azizi", 38);
let student1 = new Student("saber", "azizi", 38, "computer", 9432777517);
// console.log(person1);
// // console.log(Person.prototype)
// // console.log(person1.__proto__)
// console.log(person1.sleep());
// console.log(student1);
// console.log(student1.study(12))
// Student.method1();
// student1.method1();
let firstname = "saber";
let lastname = "azizi";
let keyName = "fullName";
let symbol1 = Symbol("age");
let symbol2 = Symbol("friend");
// console.log(symbol1);
// console.log(symbol1 === symbol2);
// console.log(typeof symbol1);
let obj = {
    firstname, lastname
    , [keyName]: `${firstname} ${lastname}`
    , "say hello"() {
        return `hello  ${this[keyName]} `
    }
    , [symbol1]: 45
    , [symbol2]: "ali reza"
}
console.log(obj);
console.log(obj[symbol1])
console.log(obj[symbol2])
console.log("==================================================================================")
// console.log(obj["say hello"]())

let names = ["saber", "bruce", "jackie", "jet", "ali", "omid"]

names[Symbol.iterator] = function () {
    let items = this;
    let step = 0;
    return {
        next() {
            let obj = {
                done: step >= items.length
                , value: items[step]
            }
            step++;
            return obj
        }
    }
}


let user = {
    id: 1
    , name: "saber"
    , email: "saberazizi66@yahoo.com"
    , posts: [
        {
            id: 1000
            , title: "post 1000"
        }
        , {
            id: 2000
            , title: "post 2000"
        }
        , {
            id: 3000
            , title: "post 3000"
        }
        , {
            id: 4000
            , title: "post 4000"
        }
    ]
}
user[Symbol.iterator] = function () {
    let posts = this.posts;
    let step = 0;
    return {
        next() {
            return {
                done: step >= posts.length
                , value: posts[step++]
            }
        }
    }
}
// let userIt = user[Symbol.iterator]()
// console.log(userIt.next())
// console.log(userIt.next())
// console.log(userIt.next())
// console.log(userIt.next())
// for (let name of names) {
//     console.log(name);
// }

for (let post of user) {
    console.log(post);
}

