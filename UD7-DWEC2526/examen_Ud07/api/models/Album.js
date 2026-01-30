const { getDB } = require("../config/db");
const { ObjectId } = require("mongodb");
class Album {
  constructor(title, artist, year, genre, coverUrl) {
    this.title = title;
    this.artist = artist;
    this.year = year;
    this.genre = coverUrl;
    this.coverUrl = coverUrl;
  }

  // Le estamos diciendo que creemos la colección de la base de datos
  static collection() {
    return getDB().collection("albums");
  }
  static async getAll() {
    return await Album.collection().find().toArray();
  }
  static async create() {
    return await Album.collection().insertOne({
      title: this.title,
      artist: this.artist,
      year: this.year,
      genre: this.genre,
      coverUrl: this.coverUrl,
    });
  }
  static async delete(id) {
      return await collection().deleteOne({ _id: new ObjectId(id) });
    }
  getId(){
    return Album.collection().find().to_Array().ObjectId(id);
  }
  idAlbum = Album.collection().find().toArray()._id;
}
module.exports = Album;

