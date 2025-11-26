import { User } from './User.js';
import { Storage } from './Storage.js';

export class Jugador {
    constructor(nombre,puntos,vidas){
        this.nombre = nombre;
        this.puntos = puntos;
        this.vidas = vidas;
    }
}