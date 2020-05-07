<template>
    <div class="wrapper">
        <div class="has-margin-top-sm">
            <div class="row row-dashboard-columns ta-center">
                <div class="col-xs-12 col-sm-4">
                    <div class="info-box ta-left">
                        <div class="info-header"><h3 class="fw-semibold">Spent Today</h3>
                            <p class="has-text-grey">Activity on {{new Date().toUTCString()}}</p></div>
                        <div class="info-content">
                            <div class="price-monitor flex ai-center jc-flex-start">
                                <h2 class="fw-semibold">{{currencyDisplay.symbol}}{{todaySpent}}</h2>
                                <i v-if="dayDifferent.status=='more'" class="text-danger fa fa-long-arrow-up"></i>
                                <i v-if="dayDifferent.status=='less'" class="text-success fa fa-long-arrow-down"></i>
                            </div>
                            <p class="has-text-grey">That's {{currencyDisplay.symbol}}{{dayDifferent.amount}} <strong>{{dayDifferent.status}}</strong> than yesterday</p></div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="info-box ta-left">
                        <div class="info-header"><h3 class="fw-semibold">Spent This Month</h3>
                            <p class="has-text-grey">Activity for {{thisMonth}}</p></div>
                        <div class="info-content">
                            <div class="price-monitor flex ai-center jc-flex-start"><h2 class="fw-semibold">{{currencyDisplay.symbol}}{{thisMonthSpent}}</h2>
                                <i class="fa"></i></div>
                            <p class="has-text-grey">That's <strong>{{budgetPercent}}%</strong> of your total budget</p></div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="info-box ta-left">
                        <div class="info-header"><h3 class="fw-semibold">Budget Remaining</h3>
                            <p class="has-text-grey">For {{thisMonth}}</p></div>
                        <div class="info-content">
                            <div class="price-monitor flex ai-center jc-flex-start"><h2 class="fw-semibold">{{currencyDisplay.symbol}}{{budgetRemain}}</h2>
                            </div>
                            <p class="has-text-grey">You've exceeded <strong>{{exceededBudget}}</strong> budgets this month</p></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="has-margin-top-md">
            <div class="block">
                <budget_card_details v-for="budget in all_budgets" :budget="budget" :key="budget.id"></budget_card_details>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapGetters, mapState} from "vuex";
    import budget_card_details from '../layout/budgets/budget-card-deatils'
    export default {
        name: "dashboard",
        components:{
            budget_card_details
        },
        computed:{
            budgetRemain(){
                return (parseFloat(this.total_budget)-parseFloat(this.thisMonthSpent)).toFixed(2);
            },
            budgetPercent(){
                return Math.ceil(parseFloat(this.thisMonthSpent)/parseFloat(this.total_budget)*100);
            },
            thisMonth(){
                return ((new Date().toUTCString().split(' ').slice(1,2))).join(' ')+', '+new Date().getFullYear();
            },
            ...mapGetters("budget", [
                "total_budget","total_spend","exceededBudget"
            ]),
            ...mapGetters("transaction", [
                "todaySpent","dayDifferent","thisMonthSpent"
            ]),
            ...mapGetters("user", [
                "currencyDisplay"
            ]),
            ...mapState("budget", [
                "all_budgets"
            ])
        },
        created(){

        }
    }
</script>

<style scoped>

</style>
