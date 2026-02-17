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
}
