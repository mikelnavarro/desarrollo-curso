import { User } from "./User.js";
export class Storage {
  save(listaUsers) {
    localStorage.setItem("listaUsers", JSON.stringify(listaUsers));
  }
  load() {
    const rawData = localStorage.getItem("listaUsers"); // Obtiene la cadena JSON
    const data = JSON.parse(localStorage.getItem("listaUsers"));

    if (data) {
      return data.map(us => {
        const usuario = new User(us.name, us.password, us.puntos, us.vidas);
        return usuario;
      });
    } else {
      return [];
    }
  }
  
  getUsuario(){
    return registrados.map(elemento => 
      new User(elemento.name,elemento.password,elemento.puntos,elemento.vidas)
    );
  }
  clearUser(){
    localStorage.removeItem("listaUsers");
  }
}