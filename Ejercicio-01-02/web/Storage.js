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
  // Verificar si un usuario existe (para el login)
  static authenticate(email, password) {
    const users = this.getCollection("usuarios");
    // Buscamos un usuario que coincida con ambos campos
    // Validación: ¿El usuario ya existe?
    if (users.some((u) => u.email === email)) {
      return { success: false, msg: "El usuario ya está registrado" };
    }
    if (users.find((u) => u.email === email && u.password === password)) {
      return true;
    } else {
      // Si es nuevo, lo guardamos
      this.pushToCollection("usuarios", { email, password });
      return { success: true, msg: "Usuario creado con éxito" };
    }
  }
}
