class AppStorage{

    storeToken(token){
        localStorage.setItem('token',token);
    }

    storeUser(user){
        localStorage.setItem('user',user);
    }

    storerole(role){
        localStorage.setItem('role',role);
    }

    storeId(id){
        localStorage.setItem('id',id);
    }
    storeAdminId(Admin_id){
        localStorage.setItem('Admin_id',Admin_id);
    }


    store(token,user,role,id,Admin_id){
        this.storeToken(token)
        this.storeUser(user)
        this.storerole(role)
        this.storeId(id)
        this.storeAdminId(Admin_id)
     }

     clear(){
         localStorage.removeItem('token')
         localStorage.removeItem('user')
         localStorage.removeItem('role')
         localStorage.removeItem('id')
         localStorage.removeItem('Admin_id')
     }

     getToken(){
         localStorage.getItem(token);
     }

      getUser(){
         localStorage.getItem(user);
     }

      getRole(){
        localStorage.getItem(role);
      }
      getId(){
        localStorage.getItem(id);
      }
      getAdminId(){
        localStorage.getItem(Admin_id);
      }


   }

   export default AppStorage = new AppStorage();
