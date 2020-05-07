<template>
    <div>
        <sidebar></sidebar>
        <main class="main-content p-6">
            <router-view></router-view>
        </main>
    </div>
</template>

<script>
    import SideBar from "./layout/SideBar";
    export default {
        name: "app",
        components:{
            'sidebar':SideBar
        },
        data(){
            return {

            }
        },
        mounted() {
            this.$store.dispatch('app/fetch_dates');
            this.$store.dispatch('categories/fetch_categories');
            this.$store.dispatch('budget/fetch_budgets')
            this.$store.dispatch('transaction/fetch_transaction');
            this.$store.dispatch('user/fetch_user');
        },
        methods:{

        }
    }
</script>

<style scoped>

</style>
