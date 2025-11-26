class Cerveza {
    constructor(marca, alcohol){
        this.marca = marca;
        this.alcohol = alcohol;
    }
}
class Cantinero {
    constructor(nombre, cerveza){
        this.marca = marca;
        this.cerveza = cerveza;
    }
    servir(){
        console.log(`${this.nombre} sirviendo la cerveza ${this.cerveza.marca}`);
    }
}
let cantinero = new Cantinero("Pedro", new Cerveza("Erdinger",20,"Erdinger"));
cantinero.servir(); 
