const state  = {
    all_transactions:[]
}
const mutations  = {

}
const getters = {
    getAllTrans: (state, getters) => {
        return state.all_transactions;
    },
    dayDifferent: (state, getters) => {
        let amount = (getters.todaySpent-getters.yesterdaySpent).toFixed(2);
        if(getters.yesterdaySpent>getters.todaySpent){
            return {
                'amount':amount,
                'status':'less'
            }
        }else if(getters.yesterdaySpent<getters.todaySpent){
            return {
                'amount':amount,
                'status':'more'
            }
        }else{
            return {
                'amount':amount,
                'status':'same'
            }
        }
    },
    thisMonthSpent: (state, getters) => {
        let ttl = 0;
        state.all_transactions.forEach(item=>{

            var date = new Date();
            var firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
            var lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);

            var transdate = new Date(new Date(item.date).setHours(0,0,0,0));

            /*---------------------------*/
            firstDay.setHours(firstDay.getHours()+(date.getTimezoneOffset()/60));
            lastDay.setHours(lastDay.getHours()+(date.getTimezoneOffset()/60));
            transdate.setHours(transdate.getHours()+(date.getTimezoneOffset()/60));
            /*---------------------------*/


            if(transdate.getTime()>=firstDay.getTime() && transdate.getTime()<=lastDay.getTime()){
                if(item.type=='expense'){
                    ttl+=parseFloat(item.amount.replace(/,/g, ''))
                }

            }

        });
        return ttl.toFixed(2);
    },
    yesterdaySpent: (state, getters) => {
        let ttl = 0;
        state.all_transactions.forEach(item=>{
            let today = new Date();
            let yesterday = new Date(today.setHours(0,0,0,0));
            /*------------------------*/

            yesterday.setHours(yesterday.getHours()+(today.getTimezoneOffset()/60))
            yesterday.setDate(yesterday.getDate() - 1);
            /*------------------*/

            let parts = item.date.split('-');
            var transdate = new Date(new Date(parts[0], parts[1] - 1, parts[2]).setHours(0,0,0,0));

            /*--------------------------*/
            transdate.setHours(transdate.getHours()+(today.getTimezoneOffset()/60));
            /*------------------------*/
            //console.log('yes= '+yesterday+" today= "+transdate)

            let diff = yesterday.getTime() === transdate.getTime();

               if(diff){
                   if(item.type=='expense'){
                       ttl+=parseFloat(item.amount.replace(/,/g, ''));
                   }

               }
        });
        return ttl.toFixed(2);
    },
    todaySpent: (state, getters) => {
        let ttl = 0;
        state.all_transactions.forEach(item=>{
            var today = new Date(new Date().setHours(0,0,0,0));
            today.setHours(today.getHours() + (today.getTimezoneOffset() / 60));

            let parts = item.date.split('-');
            var transdate =new Date(new Date(parts[0], parts[1] - 1, parts[2]).setHours(0,0,0,0));
            /*-----------------------*/
            transdate.setHours(transdate.getHours() + (today.getTimezoneOffset() / 60));

            /*-----------------------*/

            let diff = today.getTime()===transdate.getTime()

           if(diff){
               if(item.type=='expense'){
                   ttl+=parseFloat(item.amount.replace(/,/g, ''));
               }

           }

        });
        return ttl.toFixed(2);
    }

}
const actions  = {
    async fetch_transaction({ state, commit, dispatch }, data) {
        let month = data ? data.month : new Date().getMonth()+1;
        let year = data ? data.year : new Date().getFullYear();

        return new Promise((resolve,reject)=>{
            fetch('/transaction?month='+month+'&year='+year)
                .then(res=>res.json())
                .then(res=>{
                    state.all_transactions=res
                    resolve(res)
                })
                .catch((error) => {
                    reject("error to get budgets")
                })
        })
    },
    async store_transaction({state,commit,dispatch},data){
        let method = data.id!==""?'PUT':"POST";
        return new Promise((resolve, reject) => {
            fetch('/transaction/store',{
                method:method,
                body:JSON.stringify(data),
                headers:{
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'content-type':'application/json'
                }
            }).then(res=>res.json())
                .then(res=>{
                    state.all_transactions=res;
                    resolve(res)
                })
                .catch(err=>{
                    reject("error to store asset")
                })
        })
    },

    async deleteTransaction({state,commit,dispatch},budget){
        return new Promise((resolve, reject) => {
            fetch('/transaction/delete',{
                method:"DELETE",
                body:JSON.stringify(budget),
                headers:{
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'content-type':'application/json'
                }
            }).then(res=>res.json())
                .then(res=>{
                    state.all_transactions=res;
                    resolve(res)
                })
                .catch(err=>{
                    reject("error to store asset")
                })
        })
    },


}

export default {
    namespaced: true,
    state,
    mutations,
    getters,
    actions
}
