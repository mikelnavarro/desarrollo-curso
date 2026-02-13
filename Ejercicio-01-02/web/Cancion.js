
export class Cancion {
constructor(titulo, artista, genero, anio){
    this.id = crypto.randomUUID();
    this.fechaRegistro = new Date().toLocaleString();
    // Datos recibidos de un formulario de registro
    this.titulo = titulo;
    this.artista = artista;
    this.genero = genero;
    this.anio = anio;
    this.slug = `${artista.toLowerCase().replace(/\s+/g, '-')}-${titulo.toLowerCase().replace(/\s+/g, '-')}`;
}
}