import { Injectable } from '@angular/core';

import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
export interface User {
  _id: string;
  name: string;
  password: string;
  email?: string;
}
@Injectable({
  providedIn: 'root',
})
export class UserService {
  private apiUrl = 'http://localhost:3200/users';

  constructor(private http: HttpClient) {}


  // tiene métodos
  getUsers(): Observable<User[]> {
    return this.http.get<User[]>(this.apiUrl);
  }

  // servicio
}
