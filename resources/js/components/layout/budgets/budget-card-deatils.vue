<template>
    <div class="budget has-margin-bottom-md">
            <div class="row mb-3">
                <div class="col-xs-12 col-sm-4"><h3 class="budget-title mb-1">{{budget.category.name| upText}}</h3>
                    <p class="amount">
                        {{currencyDisplay.symbol}}{{spendTotal.toFixed(2)}} <span class="slash">/</span>
                        <span class="total">{{currencyDisplay.symbol}}{{budget.amount}}</span>
                    </p>
                </div>
                <div class="col-xs-12 col-sm-8">
                    <div class="progress">
                        <div class="progress-inner" :class="progClass()" :style="{width: progress+'%'}"></div>
                    </div>
                </div>
            </div>

            <div v-for="transaction in budget.category.get_transactions" :key="transaction.id" v-if="thisMonth(transaction)" class="row row-dashboard-budget ptb-2">
                <div class="col-xs-8">
                    <span>{{new Date(transaction.date).toUTCString().split(' ').slice(1,3).join(' ')}}</span> <span>&nbsp;—&nbsp;</span> <span class="fw-semibold">{{transaction.title| upText}}</span>
                </div>
                <div class="col-xs-4 ta-right">
                    <span v-if="transaction.type=='expense'" class="color-danger is-size-7">
                        <i class="fa fa-minus expense"></i>
                    </span>
                    <span v-else-if="transaction.type=='income'" class="color-success is-size-7">
                        <i class="fa fa-plus expense"></i>
                    </span>
                    {{currencyDisplay.symbol}}{{transaction.amount}}
                </div>
            </div>
        </div>
</template>

<script>
    import {mapGetters} from "vuex";
    export default {
        name: "budget-card-deatils",
        data(){
            return{
                spendTotal:0.00,
                progress:0,
            }
        },
        computed:{
            ...mapGetters("user", [
                "currencyDisplay"
            ]),
        },
        created() {
            //console.log(this.budget.category.get_transactions);
            if(this.budget.category.get_transactions.length>0){
                this.budget.category.get_transactions.forEach(transaction=>{
                    let tdate = new Date(transaction.date).getMonth()+1;
                    let curmonth = new Date().getMonth()+1;
                    if(tdate==curmonth){
                        if(transaction.type=='expense'){
                            this.spendTotal+=parseFloat(transaction.amount)
                        }
                    }

                })
            }
            this.progress = parseFloat(this.spendTotal)/parseFloat(this.budget.amount)*100;

        },
        methods:{
            thisMonth(transaction){
                let cond = this.getMonth(transaction.date)===this.getMonth(new Date());
                return cond;

            },
            getMonth(date){
                return new Date(date).getMonth()+1;
            },


            progClass() {
                let pg = this.progress;
                if(pg<50){
                    return "is-link"
                }else if(pg<70){
                    return "bg-color-fuchsia"
                }else if(pg>70){
                    return "bg-color-red"
                }
            }
        },
        props: {
            budget:Object
        }
    }
</script>

<style scoped>

</style>
