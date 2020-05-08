<template>
    <div class="wrapper">
        <div class="page-header flex ai-center jc-space-between"><h1 class="fw-semibold">Budgets</h1>
            <div class="header-buttons flex ai-center jc-flex-end">
                <a href="#" @click="BudgetModal=true" class="button-primary color-white">Add Budget</a>
            </div>
        </div>
        <div class="has-margin-top-md">
            <div class="row">
                <!--Budgets Card-->
                <budget_card v-for="(budget,index) in all_budgets" :key="index" :budget="budget" @budget_action="single_budget_action"></budget_card>
                <!--Total-->
                <div class="col-xs-12 col-sm-4">
                    <div class="budget budget-list-budget has-margin-bottom-sm has-background-none">
                        <div class="columns">
                            <div class="column">
                                <h3 class="budget-title">Total</h3>
                                <p class="amount">${{total_spend}}
                                    <span class="slash">/</span>
                                    <span class="total">${{total_budget}}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!----> <!---->
        </div>

        <!--Add budget-->
        <modal v-if="BudgetModal" @closed="BudgetModal=false">
            <form @submit.prevent="store_budget" method="post">
                <div class="field">
                    <label  class="label">Category
                        <a v-if="sel_budget.newCat" style="color:blue" @click="sel_budget.newCat=false" class="is-size-7">cancel</a>
                        <a v-if="!sel_budget.newCat" style="color:blue" @click="sel_budget.newCat=true"  class="is-size-7">new</a>
                    </label>
                    <div class="control">
                        <input required  v-if="sel_budget.newCat" v-model="sel_budget.category" type="text" class="v-money input">
                        <select  v-if="!sel_budget.newCat" v-model="sel_budget.category" name="category" required id="category" autocomplete="off" class="input">
                            <option value="">Select A Category</option>
                            <option v-for="category in getCategories" :key="category.id" :value="category.id">{{category.name| upText}}</option>
                        </select>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Amount</label>
                    <div class="control">
                        <input required v-model="sel_budget.amount" type="number" step="0.01" class="v-money input">
                    </div>
                </div>
                <div class="ta-right">
                    <input type="submit" class="button-primary color-white" value="Save + Close">
                </div>
            </form>
        </modal>

    </div>
</template>

<script>
    import budget_card from '../layout/budgets/budget-card.vue';
    import modal from "../layout/modal";
    import {mapGetters,mapState} from "vuex";
    export default {
        name: "budgets",
        computed:{
            ...mapGetters("categories", [
                "getCategories"
            ]),
            ...mapGetters("budget", [
                "total_budget","total_spend"
            ]),
            ...mapState("budget", [
                "all_budgets"
            ]),
        },
        data(){
          return{

              BudgetModal:false,
              sel_budget:{
                  newCat:false,
                  id:"",
                  category:'',
                  amount:0,
              },
          }
        },
        components: {
            budget_card,modal
        },
        mounted() {

        },
        methods:{
            single_budget_action(type,budget){
                if(type=='edit'){
                    this.sel_budget.id=budget.id;
                    this.sel_budget.category=budget.category.id;
                    this.sel_budget.amount=parseFloat(budget.amount.replace(/,/g, ''));

                    this.BudgetModal=true;

                }else if(type=='delete'){
                    this.$swal({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Yes, delete it!',
                        cancelButtonText: 'No, cancel!',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.value) {
                            this.$store.dispatch('budget/deleteBudget',budget)
                                .then(res=>{
                                    this.BudgetModal=false;
                                    this.$swal.fire(
                                        'Deleted!',
                                        'Your file has been deleted.',
                                        'success'
                                    )

                                    this.$store.dispatch('budget/fetch_budgets')
                                })
                                .catch(err=>{
                                    this.BudgetModal=false;
                                    this.$swal.fire(
                                        'Cancelled',
                                        'Your Budget is safe :)',
                                        'error'
                                    )
                                })

                        }});

                }

            },
            store_budget(){
                this.$store.dispatch('budget/store_budget',this.sel_budget)
                .then(res=>{
                    this.BudgetModal=false;
                    this.$store.dispatch('budget/fetch_budgets')
                    this.$store.dispatch('categories/fetch_categories')
                })
                .catch(err=>{
                    this.BudgetModal=false;
                })
            },
            addNewFn(){
                console.log('clicked')

            }
        }
    }
</script>

<style scoped>

</style>
