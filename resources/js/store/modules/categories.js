const state  = {
    sel_category:{
        id:"",
        name:"",
        amount:0,
    },
    all_categories:[]
}
const mutations  = {

}
const getters  = {
    getCategories: (state, getters) => {
        return state.all_categories;
    }
}
const actions  = {
    async fetch_categories({state,commit,dispatch},data){
      return new Promise((resolve,reject)=>{
          fetch('/categories')
              .then(res=>res.json())
              .then(res=>{
                  state.all_categories=res
                  resolve(res)
              })
              .catch((error) => {
                  reject("error to get categories")
              })
      })
    },
    async store_asset({state,commit,dispatch},method){
        return new Promise((resolve, reject) => {
            fetch('/asset',{
                method:method,
                body:JSON.stringify({p_data:state.sel_asset}),
                headers:{
                    'content-type':'application/json'
                }
            }).then(res=>res.json())
            .then(res=>{
                dispatch('notification/addNotify',
                    {
                        type:"success",
                        text:"Successfully add asset"
                    },
                    {
                        root:true
                    }
                )
                resolve(true)
            })
            .catch(err=>{
                dispatch('notification/addNotify',
                    {
                        type:"error",
                        text:"error to add asset"
                    },
                    {
                        root:true
                    }
                )
                reject("error to store asset")
            })
        })
    },

    async get_selected_asset({state,commit,dispatch},id){
        return new Promise((resolve, reject) => {
            fetch('/asset/'+id)
                .then(res=>res.json())
                .then(res=>{
                    state.sel_asset=res
                    resolve(true)
                })
                .catch((error) => {
                    dispatch('notification/addNotify',
                        {
                            type:"error",
                            text:"error to select asset"
                        },
                        {
                            root:true
                        }
                    )
                    reject("error to select asset")
                })
        })
    },

    async search_assets({state,commit,dispatch},data){
        return new Promise((resolve, reject) => {
            fetch('/asset/get',{
                method:"POST",
                body:JSON.stringify(data),
                headers:{
                    'content-type':'application/json'
                }
            })
                .then(res => res.json())
                .then(res => {
                    state.all_assets = res;
                    resolve(true)
                    //console.log(this.vendors)
                })
                .catch(err=> {
                    dispatch('notification/addNotify',
                        {
                            type:"error",
                            text:"error to get all asset"
                        },
                        {
                            root:true
                        }
                    )
                    reject("error to get all asset")
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
