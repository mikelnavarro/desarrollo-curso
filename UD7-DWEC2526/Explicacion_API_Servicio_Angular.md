## 1️⃣ Servicio Angular (`libro.service.ts`)

```ts
import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

export interface Libro {
  _id: string;
  titulo: string;
  autorId: string;
  autorNombre?: string;
}

@Injectable({ providedIn: 'root' })
export class LibroService {
  private apiUrl = 'http://localhost:3000/libros';

  constructor(private http: HttpClient) {}

  getLibros(): Observable<Libro[]> {
    return this.http.get<Libro[]>(this.apiUrl);
  }

  getLibro(id: string): Observable<Libro> {
    return this.http.get<Libro>(`${this.apiUrl}/${id}`);
  }
}
```

### Explicación línea a línea

1. `import { Injectable } from '@angular/core';`

   * Importa el decorador `@Injectable`, que permite que Angular **inyecte este servicio** en otros componentes o servicios.

2. `import { HttpClient } from '@angular/common/http';`

   * Importa `HttpClient`, que es la clase de Angular para **hacer peticiones HTTP** (GET, POST, PUT, DELETE).

3. `import { Observable } from 'rxjs';`

   * `Observable` es el tipo que Angular usa para **trabajar con datos asíncronos**, como respuestas de HTTP.

4. `export interface Libro { ... }`

   * Define la **forma de un libro** (tipos TypeScript).
   * `_id` es el ID de MongoDB, `titulo` es el nombre, `autorId` el ID del autor, `autorNombre` opcional para mostrar el nombre del autor.

5. `@Injectable({ providedIn: 'root' })`

   * Marca la clase como **servicio inyectable globalmente**.
   * Angular crea **una instancia única** que se puede compartir por toda la app.

6. `export class LibroService { ... }`

   * Define el servicio que va a contener las funciones para acceder a la API.

7. `private apiUrl = 'http://localhost:3000/libros';`

   * URL base de la API. Se usa en todas las peticiones HTTP.

8. `constructor(private http: HttpClient) {}`

   * Angular **inyecta el HttpClient** dentro del servicio para poder usarlo.

9. `getLibros(): Observable<Libro[]> { return this.http.get<Libro[]>(this.apiUrl); }`

   * Función que hace **GET `/libros`** y devuelve un `Observable` con un array de libros.
   * `<Libro[]>` le dice a TypeScript qué tipo de datos esperamos.

10. `getLibro(id: string): Observable<Libro> { return this.http.get<Libro>(`${this.apiUrl}/${id}`); }`

    * Función que hace **GET `/libros/:id`** para obtener un solo libro.

---

## 2️⃣ Componente Angular (`libro-list.component.ts`)

```ts
import { Component, OnInit } from '@angular/core';
import { LibroService, Libro } from '../../services/libro.service';

@Component({
  selector: 'app-libro-list',
  templateUrl: './libro-list.component.html'
})
export class LibroListComponent implements OnInit {
  libros: Libro[] = [];

  constructor(private libroService: LibroService) {}

  ngOnInit(): void {
    this.libroService.getLibros().subscribe(data => {
      this.libros = data;
    });
  }
}
```

### Explicación línea a línea

1. `import { Component, OnInit } from '@angular/core';`

   * `Component` permite crear un **componente Angular**.
   * `OnInit` es un **lifecycle hook**, se ejecuta cuando el componente se inicializa.

2. `import { LibroService, Libro } from '../../services/libro.service';`

   * Importa el **servicio** para llamar a la API y la **interfaz** de libro.

3. `@Component({ selector: 'app-libro-list', templateUrl: './libro-list.component.html' })`

   * `selector`: nombre que usarás en el HTML para colocar este componente `<app-libro-list>`.
   * `templateUrl`: archivo HTML que contiene la **vista** del componente.

4. `export class LibroListComponent implements OnInit { ... }`

   * Declara el **componente** y dice que implementa `OnInit`.

5. `libros: Libro[] = [];`

   * Variable que almacena la lista de libros que vamos a mostrar en la plantilla.

6. `constructor(private libroService: LibroService) {}`

   * Angular **inyecta el servicio** `LibroService` para poder usar sus funciones.

7. `ngOnInit(): void { ... }`

   * Método que se ejecuta al inicializar el componente.
   * Aquí se llama a la API y se suscribe al Observable.

8. `this.libroService.getLibros().subscribe(data => { this.libros = data; });`

   * `getLibros()` devuelve un **Observable**.
   * `.subscribe()` escucha cuando llegan los datos y los asigna a `this.libros` para que el template los muestre.

---

## 3️⃣ Template HTML (`libro-list.component.html`)

```html
<ul>
  <li *ngFor="let libro of libros">
    {{ libro.titulo }} - Autor: {{ libro.autorNombre }}
  </li>
</ul>
```

### Explicación línea a línea

1. `<ul>`

   * Lista HTML donde se mostrarán los libros.

2. `<li *ngFor="let libro of libros">`

   * `*ngFor` es una **directiva estructural** de Angular.
   * Itera sobre el array `libros` y crea un `<li>` por cada libro.

3. `{{ libro.titulo }} - Autor: {{ libro.autorNombre }}`

   * **Interpolation**: Angular reemplaza `{{ ... }}` con los valores reales.
   * Muestra el título y el nombre del autor de cada libro.

---

## 4️⃣ Rutas Angular (opcional, `app-routing.module.ts`)

```ts
import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { LibroListComponent } from './components/libro-list/libro-list.component';

const routes: Routes = [
  { path: '', component: LibroListComponent }, // ruta principal
  { path: 'libros', component: LibroListComponent } // ruta explícita
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule {}
```

### Explicación

1. `import { NgModule } from '@angular/core';`

   * Permite declarar un **módulo Angular**.

2. `import { RouterModule, Routes } from '@angular/router';`

   * Importa las herramientas de **routing**.

3. `import { LibroListComponent } from './components/libro-list/libro-list.component';`

   * Componente que se mostrará según la ruta.

4. `const routes: Routes = [...]`

   * Define un array de rutas. Cada ruta tiene `path` y `component`.

5. `RouterModule.forRoot(routes)`

   * Inicializa el router con esas rutas.

6. `exports: [RouterModule]`

   * Permite que otros módulos importen este router.

