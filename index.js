// Задание 1

console.log("\nЗадание 1");

function pickPropArray(array, property) {
    let result = [];
    array.forEach(student => {
        if (student.hasOwnProperty(property)) {
            result.push(student[property]);
        }
    });

    return result;
}

const students = [
    { name: 'Павел', age: 20 },
    { name: 'Иван', age: 20 },
    { name: 'Эдем', age: 20 },
    { name: 'Денис', age: 20 },
    { name: 'Виктория', age: 20 },
    { age: 40 },
];

const result = pickPropArray(students, 'name');

console.log(result);
// [ 'Павел', 'Иван', 'Эдем', 'Денис', 'Виктория' ]


// Задание 2

console.log("\nЗадание 2");

function createCounter() {
    let count = 0;

    return function () {
        console.log(++count);
    }
}

const counter1 = createCounter();
counter1(); // 1
counter1(); // 2

const counter2 = createCounter();
counter2(); // 1
counter2(); // 2


// Задание 3

console.log("\nЗадание 3");

function spinWords(str) {
    resultStr = [];
    str.split(' ').forEach(word => {
        word.length >= 5 ? resultStr.push(word.split('').reverse().join('')) : 
        resultStr.push(word);
    });

    return resultStr.join(' ');
}

const result1 = spinWords( "Привет от Legacy" );
console.log(result1); // тевирП от ycageL

const result2 = spinWords( "This is a test" );
console.log(result2); // This is a test


// Задание 4

console.log("\nЗадание 4");

function getIndexesOfNums(nums, target) {
    for (let i = 0; i < nums.length; i++) {
        for (let j = i + 1; j < nums.length; j++) {
            if (nums[i] + nums[j] == target) {
                return [i, j];
            }
        }
    }
}

const nums = [11,15,2,7,9,10,3];
const target = 9;

const result3 = getIndexesOfNums(nums, target);
console.log(result3); // 9

// Задание 5

console.log("\nЗадание 5");

function getLargestCommonPrefix(strs) {
    let result = "";

    let prefix = "";
    for (let i = 0; i < strs[0].length; i++) {
        prefix = strs[0][i];
        outer: for (let j = i + 1; j < strs[0].length; j++) {
            prefix += strs[0][j];
            for (let k = 1; k < strs.length; k++) {
                if (!strs[k].includes(prefix)) {
                    break outer;
                }
            }

            if (prefix.length > result.length) {
                result = prefix;
            } 
        }
    }

    return result;
}

const strs = ["цветок","поток","хлопок"]; // "ок"
const result4 = getLargestCommonPrefix(strs);
console.log(result4);

const strs1 = ["собака","гоночная машина","машина"]; // ""
const result5 = getLargestCommonPrefix(strs1);
console.log(result5);