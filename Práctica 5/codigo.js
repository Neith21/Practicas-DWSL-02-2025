//////////////CAPITULO I//////////////

/*VARIABLES PRIMITIVAS*/
string = "cadena de texto"
number = 18
booleano = false
//Existen otros tipos como Undefined, Null y Nan

/*USO DE var, let y const*/
var n = "Ariel" //Esta variable es global y mutable
let n1 = 1 //Esta se fije por el bloque en el que se encuentra como dentro de un if o while o función, mutable
const n2 = 3.1416 //Esta es una constante, inmutable
//const no se puede declarar y despues definir, es necesario definirla de una vez

/*SABER DIFERENCIA ENTRE DECLARAR E INICIALIZAR*/
let numero; //Declarar variable
alert(numero)
numero = 29 //Inicializar variable

//Por buenas prácticas es necesario usar el ; al final de cada cosa porque define separación aunque de igual forma las cosas funcionan sin él

/*SABER QUE SE PUEDEN CREAR MULTIPLES VARIABLES DE UNA VEZ*/
let num1 = 1, num2, num3;
num2 = 2;
num3 = 3;

/*CUÁNDO SALE UN null Y un NaN*/
let int = null;

alert(n * n1); //Esto da NaN (Not at Number) ya que el n es string y n1 un numero

/*USO DEL prompt PARA PEDIR DATOS*/
prompt("Decime tu nombre:");
let nombre = prompt("Decime tu nombre:");

alert("Hola " + nombre);

/*OPERADORES DE ASIGNACION (*= += -=)*/
let x1 = 10;
x1 *= 5;
document.writeln(x1);

/*Y ARITMETICOS (+ - * % **)*/
let y1 = 5;
y1++; //Para usar tanto el incremento como el decremento es necesario primero hacer uno de esos y despues guardarlos
let resultado = y1;
document.writeln(resultado);

/*CONCATENACIÓN*/
let numero1 = 53;
let numero2 = 8;
let frase = "" + numero1 + numero2; //Forzar un string
document.writeln(frase);

let string1 = "53";
frase1 = string1.concat(numero2); //Usando concat() que solo funciona si uno es string (base)
document.writeln(frase1);

let string2 = "Soy " + string1 + ".";
let string3 = `1. ${string2}
<br></br>
<hr></hr>
`; //Usando ${} pero debes utilizar esas comillas especiales
document.writeln(string3);

/*OPERADORES DE COMPARACIÓN*/
//a == b , a != b , > , >= , < , <=
//el == no diferencia entre string e int entonces para que compare tal cual con tipo de dato y todo se usa
// === y tambien !==

/*OPERADORES LÓGICOS*/
//a && b , a || b , !a

/*BUENAS PRÁCTICAS*/
//camelCase, holaMundo, decimeAlgoSi

/*CONDICIONALES*/
if (1 == 1) {
    alert("IIIIIIIII");
} else if (1 == 2) {
    alert("AAAAAAAAA");
} else {
    alert("121");
}


//////////////CAPITULO II//////////////

/*ARRAYS*/
let frutas = ["banana", "manzana", "pera", 5, true, false, 1.4];
let arrayDisplay = `
<hr></hr> 
<br></br>
<p>${frutas}</p>
<p>${frutas[0]}</p>
`;
document.writeln(arrayDisplay);

/*ARRAYS ASOCIATIVOS*/
let pc = {
    "nombre": "ArielPC", //Asi si
    procesador: "Inter Core i7", //Asi si
    ram: "16GB",
    espacio: "1TB"
};
document.writeln(pc); //Asi no
document.writeln(pc[nombre]); //Asi no
document.writeln(pc["nombre"]); //Asi si

/*BUCLES E ITERACIÓN*/

//while
let nnn = 0;
while (nnn <= 5) {
    nnn++;
    document.writeln(`<br>${nnn}`);
    if (nnn == 2) {
        break
    }
}

//do while
let nnn1 = 0;
do {
    nnn1++;
    document.writeln("<br>" + nnn1);
} while (nnn1 < 5);

//for
let index = 20; //Este index no afecta al del for debido a que estan en contextos diferentes
for (let index = 0; index < frutas.length; index++) {
    const element = frutas[index];
    document.writeln(element);
}

//for continue
for (let i = 0; i <= 5; i++) {
    if (i == 3) {
        continue; //El continue termina la iteración y empieza la siguiente
    };
    document.writeln(`<br>${i}`);
}

//foreach muestra los elementos gato, perro, cusuco...
let d = 0;
frutas.forEach(element => {
    d++;
    document.writeln(d + element); //aqui sumó la d con element cuando ambos son numeros
});

//for con el uso del in muestra los indices
d = 0
for (fruta in frutas) {
    d++;
    document.writeln(`<br>${d} ${fruta}`); //Indice
    document.writeln(`<br>${d} ${frutas[fruta]}`); //Elemento
}

//for con el uso del of muestra los elementos gato, perro, cusuco...
for (fruta of frutas) {
    d++;
    document.writeln(`<br>${d} ${fruta}`);
}

document.writeln("<br><hr><br>");

//Uso del label para terminar for anidados de un solo sin estar uno por uno desde el más profundo
let array2 = ["Tres", "Cuatro", "Cinco"];
let array1 = ["Uno", "Dos", array2, "Seis"];

forRancio:
for (let index in array1) {
    if (index == 2) {
        for (let element of array2) {
            document.writeln(element);
            break forRancio; //Si no pusiera ese label imprimiria el elemento llamdo "Seis" del array1
        };
    } else {
        document.writeln(array1[index]);
    };
};

//FUNCIONES

//formas de declarar una función
function saludar() { };

saludar();

saludar1 = function () { };

saludar1();

function sumar(a1, a2){
    let sum = a1 + a2;
    return sum;
}

const restar = function (b1, b2) {
    let res = b1 - b2;
    return res;
}

let resul1 = sumar(1, 2);
let resul2 = restar(2, 1);
document.writeln("<br><hr><br>La suma es: " + sumar(1, 2) + ` o: ${resul1}` +
                 "<br><hr><br>La resta es: " + restar(2, 1) + ` o: ${resul2} o ${restar}`); //Asi no => ${restar}

const multiplicar = (c1, c2) => { //Si es un parametro no se ponen parentesis y si no hay parametros lo parentesis vacios ver ejemplo
    let res = c1 * c2;
    return res
}

//ejemplo
const x = () => x

let resul3 = multiplicar(5, 5)
document.writeln("<br><hr><br>La multiplicación es: " + multiplicar(5, 5) + ` o: ${resul3}`);

//Para escribir de mejor manera los objetos (como funciones repetitivas) ej:
/*with(document) {
    write("<br>Hola desde JavaScript.");
    write("<br>");
    write("Estás aprendiendo el uso de una nueva instrucción de JavaScript.");
}*/