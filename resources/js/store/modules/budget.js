const state  = {
    all_budgets: []
}
const mutations  = {

}
const getters  = {
    total_spend: (state, getters) => {
        let ttl = 0;
        if(state.all_budgets.length>0){
            state.all_budgets.forEach(item=>{
                if(item.category.get_transactions && item.category.get_transactions.length>0){
                    item.category.get_transactions.forEach(trans=>{
                        if(trans.type=='expense'){
                            ttl+=parseFloat(trans.amount.replace(/,/g, ''));
                        }

                    })
                }
            });
        }

        return ttl.toFixed(2);
    },
    budgetBarData: (state) => {
        let bars = [];
        if(state.all_budgets.length>0){
            state.all_budgets.forEach(item => {
                let get = {
                    'label': item.category.name,
                    'data': [item.amount],
                    'backgroundColor': '#f587'
                };
                bars.push(get);
            });
        }
        //console.log(bars)
        return bars;
    },
    exceededBudget: (state, getters)=>{
        let budget = 0;

        /*Month Calculation*/
        var date = new Date();
        var firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
        var lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);



        /*End Month Calculation*/

        if(state.all_budgets.length>0){

            state.all_budgets.forEach(item=>{

                let ttl=0;

                if(item.category.get_transactions && item.category.get_transactions.length>0){
                    item.category.get_transactions.forEach(trans=>{
                        /*Trans date*/
                        var transdate = new Date(new Date(trans.date).setHours(0,0,0,0));

                        if(transdate.getTime()>=firstDay.getTime() && transdate.getTime()<=lastDay.getTime() && trans.type=='expense'){
                            ttl+=parseFloat(trans.amount.replace(/,/g, ''));
                        }
                    })
                }



                if(ttl>parseFloat(item.amount.replace(/,/g, ''))){
                    budget++;
                }

            });
        }

        return budget;
    },
    total_budget: (state, getters) => {
        let ttl = 0;
        if(state.all_budgets.length>0){
            state.all_budgets.forEach(item=>{
                ttl+=parseFloat(item.amount.replace(/,/g, ''));
            });
        }

        return ttl.toFixed(2);
    }
}
const actions  = {
    async fetch_budgets({state,commit,dispatch,rootState},data){
      return new Promise((resolve,reject)=>{
          fetch('/budgets')
              .then(res=>res.json())
              .then(res=>{
                  state.all_budgets = res;
                  //rootState.stats.budgets = res;
                  resolve(res)
              })
              .catch((error) => {
                  reject("error to get budgets")
              })
      })
    },
    async store_budget({state,commit,dispatch},data){
        let method = data.id!==""?'PUT':"POST";
        return new Promise((resolve, reject) => {
            fetch('/budgets/store',{
                method:method,
                body:JSON.stringify(data),
                headers:{
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'content-type':'application/json'
                }
            }).then(res=>res.json())
            .then(res=>{
                //state.all_budgets=res;
                resolve(res)
            })
            .catch(err=>{
                reject("error to store asset")
            })
        })
    },
    async deleteBudget({state,commit,dispatch},budget){
        return new Promise((resolve, reject) => {
            fetch('/budgets/delete',{
                method:"DELETE",
                body:JSON.stringify(budget),
                headers:{
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'content-type':'application/json'
                }
            }).then(res=>res.json())
                .then(res=>{
                    state.all_budgets=res;
                    resolve(res)
                })
                .catch(err=>{
                    reject("error to store asset")
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
