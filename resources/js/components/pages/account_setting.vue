<template>
    <div class="wrapper">
        <div class="page-header flex ai-center jc-space-between"><h1 class="fw-semibold">My Account</h1></div>
        <div class="has-margin-top-md">
            <div class="settings">
                <form @submit.prevent="update_user" method="post">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="field">
                                <label for="email" class="label">Email Address</label>
                                <div class="control">
                                    <input type="email" disabled="disabled" class="input" v-model="currentUser.email">
                                </div>
                                <div class="control">
                                    <div class="select">
                                        <select name="notify_when" id="notify_when" class="input">
                                            <option value="monthly">Email Updates Monthly</option>
                                            <option value="weekly">Email Updates Weekly</option>
                                            <option value="never">Email Updates Never</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="control">
                                    <div class="select">
                                        <select required v-model="currentUser.currency"  name="money_format" id="money_format" class="input">
                                            <option value="">Select Currency</option>
                                            <option v-for="currency in currencies" :value="currency.id">{{currency.code}} {{currency.symbol}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="field">
                                <label for="password" class="label">Change Password</label>
                                <div class="control">
                                    <input  v-model="currentUser.password" type="password" placeholder="New Password" class="input">
                                </div>
                                <div class="control">
                                    <input   v-model="currentUser.r_password" type="password" placeholder="Repeat New Password" class="input">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 ta-right">
                            <button type="submit" class="button-primary color-white">Save Settings</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapGetters} from "vuex";

    export default {
        name: "account_setting",
        data(){
          return{
              currencies:[]
          }
        },
        computed:{
            ...mapGetters("user", [
                "currentUser"
            ]),
        },
        created(){
            this.getcurrency();
        },
        methods:{
            getcurrency(){
                fetch('/currency')
                .then(res=>res.json())
                .then(res=>{
                    this.currencies = res;
                })
            },
            update_user: function () {
                this.$store.dispatch('user/updateUser',this.currentUser)
                .then(res=>{
                    this.$store.dispatch('user/fetch_user');
                    this.$swal.fire(
                        'Updated!',
                        'Your profile has been updated.',
                        'success'
                    )
                })

            }
        }
    }
</script>

<style scoped>

</style>
