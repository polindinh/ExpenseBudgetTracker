<template>
    <div class="wrapper">
        <div class="page-header flex ai-center jc-space-between">
            <h1 class="fw-semibold">Stats</h1>
            <div class="header-buttons flex ai-center jc-flex-end">
                <filterData @filterAction="filterres"></filterData>
            </div>
        </div>
        <div class="page-block has-margin-top-md">
            <h3>Transactions</h3>
            <TransactionsBar v-if="!loading" :Month="this.month" :Year="this.year"></TransactionsBar>
        </div>
        <div class="row has-margin-top-md">
            <div class="col-xs-12 col-sm-12">
                <div class="page-block">
                    <h3>Budgets</h3>
                    <BudgetDonut ref="skills_chart"  v-if="!loading" :chartData='BudgetDonutData'></BudgetDonut>
                </div>
            </div>
            <!--<div class="col-xs-12 col-sm-8 mt-4-mobile">
                <div class="page-block">
                    <BudgetBar v-if="!loading" :chartdata='BudgetBarData'></BudgetBar>
                </div>
            </div>-->
        </div>
    </div>
</template>

<script>
    import {mapGetters, mapState} from "vuex";
    import BudgetBar from "../layout/stats/BudgetBar";
    import BudgetDonut from "../layout/stats/BudgetDonut";
    import TransactionsBar from "../layout/stats/TransactionsBar";
    import filterData from "../layout/filter";
    import transaction from "../../store/modules/transaction";
    export default {
        name: "stats",
        components:{
            TransactionsBar,
            BudgetBar,
            BudgetDonut,
            filterData
        },
        data:()=>{
            return {
                month:new Date().getMonth()+1,
                year: new Date().getFullYear(),
                loading:true,
                AllBudgets:[],
                allTrans:[],
            }
       },
        mounted(){

        },
        created(){
            this.getData();
        },
        computed:{
            BudgetBarData(){
                let dt = [];
                let labels= ['budgets'];
                this.AllBudgets.forEach((item,index)=>{


                    labels.push(item.category.name)

                    let spend =0;
                    if(item.category.get_transactions.length>0){
                        item.category.get_transactions.forEach(transaction=>{
                            console.log(new Date().getMonth())
                            spend+= parseFloat(transaction.amount.replace(/,/g, ''))
                        })
                    }

                    dt.push( {
                            label: item.category.name,
                            stack: 'Stack '+index,
                            backgroundColor: '#'+(Math.random()*0xFF7FFF<<0).toString(16),
                            data: [spend]
                        })
                });
                console.log(dt)
                return {
                    'labels':labels,
                    datasets: dt
                };
            },
            BudgetDonutData(){
                let dt = {
                    backgroundColor: [],
                    data: []
                };
                let labels= [];
                this.AllBudgets.forEach(item=>{
                    labels.push(item.category.name);
                    dt.backgroundColor.push( '#'+(Math.random()*0xFFFFFF<<0).toString(16));
                    dt.data.push(item.amount.replace(/,/g, ''));
                });
                return {
                    'labels':labels,
                    datasets: [
                        dt
                    ]
                };
            }
        },
        methods:{
            filterres(data){
                this.month = data.month;
                this.year = data.year;
                this.getData();
            },
            getData(){
                 this.loading = true;
                fetch('/budgets?month='+this.month+'&year='+this.year)
                    .then(res=>res.json())
                    .then(res=>{
                        this.AllBudgets = res;
                        this.loading = false;


                    })
                    .catch((error) => {
                        this.loading=false;
                        console.error("error to get budgets")
                    })
            }
        }
    }
</script>

<style scoped>

</style>
