
import { Storage } from "./Storage.js";
export class User {
    constructor(nombre, apellidos, correo, password) {
        // Atributos autogenerados
        this.id = crypto.randomUUID();
        this.registro = new Date().toLocaleString;
        // atributos que vienen de formulario
        this.nombre = nombre;
        this.apellidos = apellidos;
        this.correo = correo;
        this.password = password;
    }

    create(nombre,apellidos,correo,password){
        let user = new User(nombre,apellidos,correo,password);
        Storage.authenticate(correo, password);
    }
}