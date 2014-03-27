'use strict';

/* Services */

angular.module('myApp.services', [])

  .service('UserDataService', function(){
    var user = null;
    return {
      setUser: function(u){
        user = u;
      },
      getUser: function(){
        return user;
      },
      getUsername: function(){
        if(user && user.username){
          return user.username;
        }else{
          return '';
        }
      },
      getFullname: function(){
        if(user && user.firstname && user.lastname){
          return user.firstname + ' ' + user.lastname;
        }else{
          return '';
        }
      }
    }
  })


  .service('TimeService', function(){
    return {
      getTime: function(){
        var d = new Date();
        return d.toLocaleString();
      }
    }
  })


  .service('BasketService', function(){

    var items = [];

    return {
      addItem: function(item){
        var basketItem = angular.copy(item);
        for(var i=0; i < items.length; i++){
          if(basketItem.artnr === items[i].artnr){
            items[i].qty++;
            return;
          }
        }
        basketItem['qty'] = 1;
        items.push(basketItem);
      },
      getItems: function(){
        return items;
      },
      removeItem: function(item){
        var i = items.indexOf(item);
        items[i].qty--;
        if(item['qty'] == 0){
          items.splice(i,1);
        }
      },
      calcTotal: function(){
        var total = 0;
        for(var i=0; i < items.length; i++){
          total += (items[i].price * items[i].qty);
        }
        return total;
      }
    }

  });


