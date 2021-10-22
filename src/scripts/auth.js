const token = "AuthToken";

export class Auth {
  static login() {
    sessionStorage.setItem(token, "IsAuthenticated");
  }

  static logout() {
    sessionStorage.removeItem(token);
  }

  static getToken() {
    return sessionStorage.getItem(token);
  }
}
