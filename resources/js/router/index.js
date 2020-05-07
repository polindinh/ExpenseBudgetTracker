import Vue from 'vue'
import VueRouter from 'vue-router'

const dashboard =Vue.component('dashboard',require('../components/pages/dashboard.vue').default);
const transactions = Vue.component('transactions',require('../components/pages/transactions.vue').default);
const budgets  = Vue.component('dashboard',require('../components/pages/budgets.vue').default);
const stats =Vue.component('dashboard',require('../components/pages/stats.vue').default);
const account_setting =Vue.component('dashboard',require('../components/pages/account_setting.vue').default);
Vue.use(VueRouter)
const router = new VueRouter({
    //mode:'history',
    routes: [
        {
            name: 'dashboard',
            path: '/',
            component: dashboard,
        },
        {
            name: 'transactions',
            path: '/transactions',
            component: transactions,
        },
        {
            name: 'budgets',
            path: '/budgets',
            component: budgets,
        },
        {
            name: 'stats',
            path: '/stats',
            component: stats,
        },
        {
            name: 'my-account',
            path: '/my-account',
            component: account_setting,
        }
        ]

})

export default router;
