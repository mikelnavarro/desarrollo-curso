import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
@Injectable({
  providedIn: 'root',
})
export class Comment {
  


    private apiUrl = 'http://localhost:3200/comments';

  constructor(private http: HttpClient) {}


  // Todos los metodos
  // metodos de obtener, contar
}
