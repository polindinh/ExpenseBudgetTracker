<template>
    <div class="wrapper">
        <div class="page-header flex ai-center jc-space-between is-hidden-mobile">
            <h1 class="fw-semibold">Transactions</h1>
            <div class="header-buttons flex ai-center jc-flex-end">
                <filterData @filterAction="filterres"></filterData>
                <a href="#" @click="TransactionModal=true" class="button-primary color-white">New Transaction</a>
            </div>
        </div>
        <div class="page-header is-hidden-tablet"><h1 class="fw-semibold">Transactions</h1>
            <div class="mt-2 flex ai-center jc-space-between"><a href="#" class="button-primary color-white">New
                Transaction</a>
                <div class="dropdown pos-relative">
                    <div class="dropdown-trigger">
                        <button aria-haspopup="true" aria-controls="dropdown-menu" class="button-dropdown"><span>April 2020</span>
                            <span class="icon is-small"><i aria-hidden="true" class="fa fa-angle-down"></i></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-block has-margin-top-md has-transactions-table">
            <table class="table w-100 mb-0">
                <thead class="ta-left">
                <tr>
                    <th>Date</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th class="ta-right">Amount</th>
                    <th></th>
                </tr>
                </thead>
                <transition-group tag="tbody" name="list">
                    <tr class="has-action-links" v-for="transaction in getAllTrans" :key="transaction.id">
                        <td style="width: 96px;">
                            {{new Date(transaction.date).toUTCString().split(' ').slice(1,3).join(' ')}}
                        </td>
                        <td>
                            {{transaction.title}}
                        </td>
                        <td>
                            {{transaction.category.name}}
                        </td>
                        <td class="ta-right">
                                <span v-if="transaction.type=='expense'" class="color-danger is-size-7">
                                    <i class="fa fa-minus expense"></i>
                                </span>
                                <span v-else-if="transaction.type=='income'" class="color-success is-size-7">
                                    <i class="fa fa-plus expense"></i>
                                </span>
                            {{currencyDisplay.symbol}} {{transaction.amount}}
                        </td>
                        <td class="action-links fs-3 ta-right">
                            <a href="#" @click="edit_transaction(transaction)" class="inline-block mr-4">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="#" @click="delete_transaction(transaction)" class="inline-block mr-4 color-danger">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                </transition-group>
            </table>
        </div>

        <modal v-if="TransactionModal" @closed="TransactionModal=false">
            <form @submit.prevent="addTransaction" method="post">
                <div class="field">
                    <label class="label">Title</label>
                    <div class="control">
                        <input required v-model="transaction.title" type="text" placeholder="Lunch at Taco Dive" name="title" id="title" class="input">
                    </div>
                </div>
                <div class="field">
                    <label class="label">Category
                        <a v-if="!NewTransaction" @click="NewTransaction=true" href="#" class="is-size-7">Add New</a>
                        <a v-if="NewTransaction" @click="NewTransaction=false" href="#" class="is-size-7">Cancel</a>
                    </label>
                    <div class="control">
                        <select v-if="!NewTransaction" required v-model="transaction.category" name="category"  id="category" autocomplete="off" class="input">
                            <option value="">Select A Category</option>
                            <option v-for="category in getCategories" :key="category.id" :value="category.id">{{category.name}}</option>
                        </select>
                        <input v-if="NewTransaction" required v-model="transaction.category" type="text" placeholder="Category Name" name="category"  class="input">
                    </div>
                </div>

                <div class="field">
                    <label class="label">Amount</label>
                </div>
                <div class="field is-horizontal">
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <input required v-model="transaction.amount" type="number" step="0.01" class="v-money input">
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <label class="radio">
                                    <input required type="radio" v-model="transaction.type" name="type" value="expense" checked="checked">
                                    Expense
                                </label>
                                <label class="radio">
                                    <input required type="radio" v-model="transaction.type" name="type" value="income">
                                    Income
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Date</label>
                    <div class="control">
                        <input required v-model="transaction.date" type="date" name="date" id="date" class="input">
                    </div>
                </div>
                <div class="ta-right">
                    <input type="submit" class="button-secondary mr-2" value="Save + Close">
                </div>
            </form>
        </modal>

    </div>
</template>

<script>
    import modal from "../layout/modal";
    import filterData from "../layout/filter";
    import {mapGetters,mapState} from "vuex";

    export default {

        name: "transactions",
        components: {
            modal,filterData
        },
        computed:{
            ...mapGetters("transaction", [
                "getAllTrans"
            ]),
            ...mapGetters("user", [
                "currencyDisplay"
            ]),
            ...mapGetters("categories", [
                "getCategories"
            ])

        },
        data() {
            return {
                DropDown:false,
                transaction:{
                    id:null,
                    title:"",
                    category:null,
                    amount:0.00,
                    type:null,
                    date:null
                },
                NewTransaction:false,
                TransactionModal: false
            }
        },
        mounted() {

        },
        methods:{
            filterres(data){
                console.log(data);
                this.$store.dispatch('transaction/fetch_transaction',data)

            },
            addTransaction(){
                this.$store.dispatch('transaction/store_transaction',this.transaction)
                this.TransactionModal = false;
                this.$store.dispatch('budget/fetch_budgets',{
                                    month:new Date().getMonth()+1,
                                    year:new Date().getFullYear()
                                });

                this.$store.dispatch('categories/fetch_categories');

                this.$store.dispatch('transaction/fetch_transaction',{
                                    month:new Date().getMonth()+1,
                                    year:new Date().getFullYear()
                                });
            },
            delete_transaction(transaction){
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
                        this.$store.dispatch('transaction/deleteTransaction',transaction)
                            .then(res=>{
                                this.$store.dispatch('budget/fetch_budgets',{
                                    month:new Date().getMonth()+1,
                                    year:new Date().getFullYear()
                                });

                                this.$store.dispatch('transaction/fetch_transaction',{
                                    month:new Date().getMonth()+1,
                                    year:new Date().getFullYear()
                                });

                                this.$swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                )
                            })
                            .catch(err=>{
                                this.$swal.fire(
                                    'Cancelled',
                                    'Your Budget is safe :)',
                                    'error'
                                )
                            })

                    }});
            },
            edit_transaction(transaction){
                this.TransactionModal=true;
                this.transaction = transaction;
                this.transaction.category = transaction.category.id;
            }
        }
    }
</script>

<style scoped>
    .list-enter-active, .list-leave-active {
        transition: all 1s;
    }
    .list-enter, .list-leave-to /* .list-leave-active below version 2.1.8 */ {
        opacity: 0;
        transform: translateY(30px);
    }
</style>
