import { Jugador } from './Jugador.js';
import { User } from "./User.js";
export class Storage {
  save(registrados) {
    localStorage.setItem("registrados", JSON.stringify(registrados));
  }
  load() {
    const rawData = localStorage.getItem("registrados"); // Obtiene la cadena JSON
    const data = JSON.parse(localStorage.getItem("registrados"));

    if (data) {
      return data.map(us => {
        const jugador = new Jugador(us.name, us.puntos, us.vidas);
        const usuario = new User(us.name, us.password);
        
        return jugador;
      });
    } else {
      return [];
    }
  }
  clearUser(){
    localStorage.removeItem("registrados");
  }
}