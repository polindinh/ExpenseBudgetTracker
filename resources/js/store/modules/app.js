const state = {
    getDates:[]
}

const mutations = {

}

const getters = {
    AllFilterOption: (state, getters) => {
        const monthNames = ["January", "February", "March", "April", "May", "June",
  "July", "August", "September", "October", "November", "December"
];
        let data = [];
        //console.log(state)
        state.getDates.forEach(item => {
            data.push({
                'month': item.month,
                'year': item.year,
                'text':monthNames[item.month-1]+' '+item.year
            })
        })

        //console.log(state.getDates)

        return data;
    }
}

const actions = {
    async fetch_dates({ state, commit, dispatch, rootState }, data) {
        return new Promise((resolve, reject) => {
            fetch('/dates')
            .then(res=>res.json())
            .then(res=>{
                state.getDates = res;
                resolve(res);
            })
            .catch (err=> {
                reject("can't get dates")
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
