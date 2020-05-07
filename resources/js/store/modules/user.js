const state = {
    currentUser:[],
    currentCurrency:""
}

const mutations = {

}

const getters = {
    currentUser:(state,getters)=>{
        return state.currentUser;
    },
    currencyDisplay:(state,getters)=>{
        return state.currentCurrency;
    }
}

const actions = {
    async fetch_user({ state, commit, dispatch, rootState }, data) {
        return new Promise((resolve, reject) => {
            fetch('/user/me')
                .then(res=>res.json())
                .then(res=>{
                    state.currentUser=res;
                    state.currentCurrency=res.my_currency;
                    resolve(res);
                })
                .catch(err=>{
                    reject(err)
                })
        })
    },
    async updateUser({ state, commit, dispatch, rootState }, data) {
        return new Promise((resolve, reject) => {
            fetch('/user/store', {
                headers:{
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'content-type':'application/json'
                },
                method: "POST",
                body: JSON.stringify(data)
            })
                .then(res => res.json())
                .then(res => {
                    resolve(res)
                })
                .catch(err=>{
                    reject(err)
                })
        })
    }
}


export default {
    namespaced: true,
    state,
    mutations,
    getters,
    actions
}
