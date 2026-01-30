import { Routes } from '@angular/router';
import { AlbumListComponent } from './album-list-component/album-list-component';
import { AlbumDetailComponent } from './album-detail-component/album-detail-component';
import { SongFormComponent } from './song-form-component/song-form-component';

export const routes: Routes = [
    {
    path: 'albums/',
    component: AlbumListComponent,
    title: 'Lista Visualización Álbumes',
  },
    {
    path: 'albums/new',
    component: SongFormComponent,
    title: 'Detalle de la Cancion',
  },
  {
    path: 'albums/:id',
    component: AlbumDetailComponent,
    title: 'Detalle Álbum',
  },
      {
    path: 'albums/:id/songs',
    component: SongFormComponent,
    title: 'Detalle de la Cancion',
  },
];
