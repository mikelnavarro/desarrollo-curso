


# Fichero .env

- Volumen donde se monta: comentariodb


- Colecciones de la base de datos MongoDB
*Cada canción pertenece a un álbum mediante albumId.*


**Errores**
```
No se permite lógica en rutas directamente (usar controladores).
400 → validación
404 → recurso inexistente
500 → error servidor
```
# Frontend

- **En Angular 21**
# MongoDB
```bash
docker run -d --name comentariodb -e MONGO_INITDB_ROOT_USERNAME=mambo -e MONGO_INITDB_ROOT_PASSWORD=secretoexamen -e MONGO_INITDB_DATABASE=comentariodb -p 27017:27017 -v mongodb_data:/data/db mongo:latest
```
```
docker exec -it comentariodb mongosh -u mambo -p secretoexamen
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

*Indicaciones:*