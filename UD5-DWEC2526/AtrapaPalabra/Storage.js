import { User } from "./User.js";
export class Storage {
  save(registrados) {
    localStorage.setItem("registrados", JSON.stringify(registrados));
  }
  load() {
    const data = JSON.parse(localStorage.getItem("registrados"));

    if (data) {
      return registrados.map(us => {
        const usuario = new User(us.name, us.password);
        
        return usuario;
      });
    }
  }
}
