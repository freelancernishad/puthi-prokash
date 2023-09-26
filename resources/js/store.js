import Vue from "vue";
import Vuex from 'vuex';
Vue.use(Vuex)



const store = new Vuex.Store({
    state:{
        // bookList:['Book 1','Book 2','Book 3','Book 4']
        Users:{},
        LatestProductsCat:{},

        userPermission:{},
        userRoles:{},
        preloadData:{},
        tiny:{},
        cartQuantity: 0,
        preCarts: {},


    },// as like data(){return:{}}
    mutations:{


        setCartQuantity(state, quantity) {
            state.cartQuantity = quantity;
          },

        setCarts(state, carts) {
            state.preCarts = carts;
          },



       async setUpdateUser(state,data){

            state.Users = data

        },


       async settinyint(state,data){

            state.tiny = data

        },

       async set_pre_load_data(state,data){

            state.preloadData = data

        },


        setUserPermission(state,data){
            state.userPermission = data
        },


        setUserRoles(state,data){
            state.userRoles = data
        },



    },
    getters:{

        getCartQuantity(state) {
            return state.cartQuantity;
          },
        getCarts(state) {
            return state.preCarts;
          },

        getUpdateUser(state){

            return state.Users
        },

        gettinyint(state){

            return state.tiny
        },


        get_pre_load_data(state){


            return state.preloadData
        },

        getUserPermission(state){
            return state.userPermission
        },

        getUserRoles(state){
            return state.userRoles
        },


    },// as like computed:{}
    actions:{



        //method 1
        // addBook(content,data){
        //     content.commit('ADD_BOOK',data)
        // }
         //method 2
        // addBook({commit},data){
        //     commit('ADD_BOOK',data)
        // },
        //  removeBook({commit},data){
        //     commit('REMOVE_BOOK',data)
        // }

        //  getUser({commit},data){
        //     commit('GET_USERS',data)
        // }




    },// as like methods:{}

});



export default store;
