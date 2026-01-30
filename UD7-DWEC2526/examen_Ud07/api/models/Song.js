const { idAlbum } = require("../models/Album");
const { Album } = require("../models/Album");
const { getDB } = require("../config/db");
const { ObjectId } = require("mongodb");
class Song {
    constructor(title, duration, rating, listened){
        this.title = title;
        this.duration = duration;
        this.rating = rating;
        this.listened = listened;
    }

// Le estamos diciendo que creemos la colección de la base de datos
  static collection() {
    return getDB().collection("albums");
  }
  static async getAll() {
    return await Song.collection().find().toArray();
  }
    static async create() {
    return await Song.collection().insertOne({
      title: this.title,
      duration: this.duration,
      rating: this.rating,
      albumId: Album.idAlbum,
      listened: this.listened
    });
  }
  static async delete(id) {
      return await collection().deleteOne({ _id: new ObjectId(id) });
    }
}

module.exports = Song;