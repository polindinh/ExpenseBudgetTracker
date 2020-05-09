<template>
    <ul class="menu-list p-0 mt-2 ls-none">
        <li class="menu-title">Manage</li>
        <li class="menu-link">
            <router-link :to="{name:'dashboard'}"><i class="fas fa-tachometer-alt blue fa-lg" style="color:yellow;"></i>Dashboard</router-link>
        </li>
        <li class="menu-link">
            <router-link :to="{name:'transactions'}"><i class="fas fa-money-check-alt fa-lg" style="color:#85BB65;"></i>Transactions</router-link>
        </li>
        <li class="menu-link">
            <router-link :to="{name:'budgets'}"><i class="fas fa-piggy-bank fa-lg" style="color:#FABFB7;"></i>Budgets</router-link>
        </li>
        <li class="menu-link">
            <router-link :to="{name:'stats'}"><i class="fas fa-project-diagram fa-lg" style="color:#F5F2B8;"></i>Stats</router-link>
        </li>
        <li class="menu-title">Account</li>
        <li class="menu-link">
            <router-link :to="{name:'my-account'}"><i class="fas fa-cogs fa-lg" style="color:whitesmoke;"></i>Account Setting</router-link>
        </li>
        <li class="menu-link">
            <a href="/sign_out"><i class="fa fa-power-off fa-lg" style="color:red;"></i> Sign Out</a>
        </li>
    </ul>
</template>

<script>
    export default {
        name: "menus"
    }
</script>

<style scoped>

</style>
