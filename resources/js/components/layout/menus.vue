<template>
    <ul class="menu-list p-0 m-0 ls-none">
        <li class="menu-title">Manage</li>
        <li class="menu-link">
            <router-link :to="{name:'dashboard'}"><i class="fa fa-tachometer"></i>Dashboard</router-link>
        </li>
        <li class="menu-link">
            <router-link :to="{name:'transactions'}"><i class="fa fa-bank"></i>Transaction</router-link>
        </li>
        <li class="menu-link">
            <router-link :to="{name:'budgets'}"><i class="fa fa-balance-scale"></i>Budgets</router-link>
        </li>
        <li class="menu-link">
            <router-link :to="{name:'stats'}"><i class="fa fa-line-chart"></i>Stats</router-link>
        </li>

        <li class="menu-title">Account</li>
        <li class="menu-link">
            <router-link :to="{name:'my-account'}"><i class="fa fa-tachometer"></i>Account Setting</router-link>
        </li>
        <li class="menu-link">
            <a href="/sign_out"><i class="fa fa-sign-out"></i> Sign Out</a>
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
