import Token from './Token'
import AppStorage from './AppStorage'


class User{

 responseAfterLogin(res){
 	const access_token = res.data.access_token
 	const username = res.data.name
    const role = res.data.role
    const id = res.data.user_id
    const Admin_id = res.data.Admin_id
 	if (Token.isValid(access_token)) {
 		AppStorage.store(access_token,username,role,id,Admin_id)
 	}

 }

 logout(){

	return localStorage.getItem('token')

 }

  hasToken(){
  	const storeToken = localStorage.getItem('token');
  	if (storeToken) {
  		return Token.isValid(storeToken)? true : false
  	}
  	false
  }

  loggedIn(){
  	return this.hasToken()
  }

  name(){
    return localStorage.getItem('user');

}
  role(){
        return localStorage.getItem('role');
  }

  user_id(){
    return localStorage.getItem('id');
  }

  Admin_id(){

    return localStorage.getItem('Admin_id');
  }

	id(){
	  	if (this.loggedIn()) {
	  		const payload = Token.payload(localStorage.getItem('token'));
	  		return payload.sub
	  	}
	  	return false
	  }



}

export default User = new User()
