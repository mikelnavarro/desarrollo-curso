export class Storage {
  static obtener(key) {
    const data = localStorage.getItem(key);
    if (data) {
      return JSON.parse(data); // data
    } else {
      return [];
    }
  }
  // si tenemos que guardar
  static pushToCollection(key, item) {
    const collection = this.obtener(key);
    collection.push(item);

    // stringify key
    localStorage.setItem(key, JSON.stringify(collection));
  }
}
