

# Fichero .env

- Volumen donde se monta: music_library_db

- Colecciones de la base de datos MongoDB
- albums

```
{
 _id: ObjectId,
 title: String, // required
 artist: String, // required
 year: Number,
 genre: String,
 coverUrl: String
}
```
- songs

```
{
 _id: ObjectId,
 title: String, // required
 duration: Number, // segundos
 rating: Number, // 0-5
 albumId: ObjectId, // required (referencia a albums)
 listened: Boolean
}
```

+ **CONDICIONES OBLIGATORIOS EXAMEN**
**Cada canción pertenece a un álbum mediante albumId.**


**Errores**
---
```
No se permite lógica en rutas directamente (usar controladores).
400 → validación
404 → recurso inexistente
500 → error servidor
```
# Frontend

**En Angular 21**
Frontend (Angular)
+ **Componentes Obligatorios**
# MongoDB
```bash
docker run -d --name music_library_db -e MONGO_INITDB_ROOT_USERNAME=usemongo -e MONGO_INITDB_ROOT_PASSWORD=secretoarab -e MONGO_INITDB_DATABASE=music_library_db -p 27017:27017 -v mongodb_data:/data/db mongo:latest
```
```
docker exec -it music_library_db mongosh -u usemongo -p secretoarab
```
```
use biblioteca_api
db.albums.insertOne({
  title: "abcd",
  artist: "abcd",
  year: 1605,
  genre: "abcd",
  cover: "abcd"
})
db.albums.find().pretty()
db.albums.find().pretty()
```
# Entregado

|
|-WEB
|-API <== api de albumes / canciones en mongo



**Terminar Angular**
**Componentes + Componentes** --> **Servicio** --> Para álbumes
**Componentes + Componentes** --> **Servicio** --> Para songs

**Luego Api, poner formulario*

*Indicaciones:*