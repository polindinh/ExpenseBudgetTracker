<template>
    <div class="col-xs-12 col-sm-4">
        <div class="budget budget-list-budget has-margin-bottom-md">
            <div class="row">
                <div class="col-xs-6">
                    <h3 class="budget-title">{{budget.category.name| upText}}</h3>
                </div>
                <div class="col-xs-6">
                    <p class="amount ta-right">{{currencyDisplay.symbol}}{{spendTotal.toFixed(2)}}
                        <span class="slash">/</span>
                        <span class="total">{{currencyDisplay.symbol}}{{budget.amount}}</span>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="progress">
                        <div class="progress-inner " :class="progClass()" :style="{width: progress+'%'}"></div>
                    </div>
                </div>
            </div>
            <div class="row flex jc-flex-end">
                <div class="column is-more ta-right">
                    <a @click="$emit('budget_action','edit',budget)" href="#" class="button is-small is-link">Edit</a>
                    <a @click="$emit('budget_action','delete',budget)" href="#" class="button is-small is-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapGetters} from "vuex";
    export default {
        name: "budget-card",
        data(){
          return{
              spendTotal:0.00,
              progress:0,
          }
        },
        computed:{
            ...mapGetters('user',[
                'currencyDisplay'
            ])
        },
        created() {
            //console.log(this.budget.category.get_transactions);
            if(this.budget.category.get_transactions.length>0){
                this.budget.category.get_transactions.forEach(transaction=>{
                    //console.log(transaction)
                    if(transaction.type=='expense'){
                        this.spendTotal+=parseFloat(transaction.amount.replace(/,/g, ''))
                    }
                })
            }
            this.progress = parseFloat(this.spendTotal)/parseFloat(this.budget.amount.replace(/,/g, ''))*100;

            //console.log(this.progress)

        },
        methods:{
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
