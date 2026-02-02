import { Component, OnInit } from '@angular/core';
import { UserService, User } from '../services/user'
@Component({
  selector: 'app-user-list',
  imports: [],
  templateUrl: './user-list.html',
  styleUrl: './user-list.css',
})
export class UserList  implements OnInit {
  users: User[] = [];

  constructor(private userService: UserService) {}

  
  ngOnInit(): void {
    this.userService.getUsers().subscribe(data => {
      this.users = data; // users == método (que es service,)
    });
  }
}