function authenticate(login, password){
  if ( login == 'login' && password == 'password'){
    return 'login';
  }else{
    return 'unlogin';
  }
}