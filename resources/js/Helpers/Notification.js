class Notification{

    success(){
        new Noty({
            type: 'success',
            layout:'topRight',
            text: 'Successfuly done',
            timeout:'1000',
        }).show();
    }

    alert(){
        new Noty({
            type: 'alert',
            layout:'topRight',
            text: 'Are you sure',
            timeout:'1000',
        }).show();
    }

    error(){
        new Noty({
            type: 'alert',
            layout:'topRight',
            text: 'Something went wrong !',
            timeout:'1000',
        }).show();
    }

    warning(){
        new Noty({
            type: 'warning',
            layout:'topRight',
            text: 'Oops it went wrong !',
            timeout:'1000',
        }).show();
    }

    image_validation(){
        new Noty({
            type: 'error',
            layout:'topRight',
            text: 'Image size exceed it should be less then 1 mb',
            timeout:'1000',
        }).show();
    }

   
   }
   
   export default Notification = new Notification()