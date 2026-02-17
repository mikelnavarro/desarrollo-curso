export class Storage {
  // Obtener cualquier colección (usuarios, canciones, etc.)
  static getCollection(key) {
    const data = localStorage.getItem(key);
    if (data) {
      return JSON.parse(data);
    } else {
      return [];
    }
  }
  // Guardar un objeto en una colección
  static pushToCollection(key, item) {
    const collection = this.getCollection(key);
    collection.push(item);
    localStorage.setItem(key, JSON.stringify(collection));
  }
  
  static encontrarByEmail(email) {

    const users = this.getCollection("usuarios");
    if (users.find((u) => u.email === email)){
      let user = u;
      return user;
    } else 
      return "Error";
  }
}
