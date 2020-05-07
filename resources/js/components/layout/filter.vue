<template>
    <div v-if="getDates" class="dropdown pos-relative">
        <div class="dropdown-trigger">
            <div class="dropdown-trigger">
                <button @click="DropDown==true?DropDown=false:DropDown=true" aria-haspopup="true" aria-controls="dropdown-menu" class="button-dropdown">
                    <span>{{currentfilter}}</span> 
                    <span class="icon is-small">
                        <i aria-hidden="true" class="fa fa-angle-down"></i>
                    </span>
                </button>
            </div>
        </div>

        <div id="dropdown-menu" :style="[DropDown?{'display':'block'}:{'display':'none'}]" role="menu" class="dropdown-menu pos-absolute zi-999">
            <div class="dropdown-content">
                <a @click="sendAction(date)" v-for="(date,index) in getDates" v-bind:key="index" class="dropdown-item block ptb-3 plr-4 is-active">{{formatDate(date)}}</a>
            </div>
        </div>

    </div>
</template>
<script>
import {mapGetters,mapState} from "vuex";
export default {
    name:"filterData",
    data(){
        return {
            DropDown:false,
            currentfilter:"",
        }
    },
    mounted(){
        this.currentfilter = this.getMonthName(new Date().getMonth())+" "+new Date().getFullYear();
    },
    computed:{
         ...mapState("app", [
                "getDates"
            ]),
    },
    methods:{
        sendAction(data){
            this.DropDown=false;
            this.currentfilter = this.formatDate(data)
            this.$emit('filterAction',data)
        },
        getMonthName(index){
            const monthNames = ["January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
            ];

            return monthNames[index];
        },
        formatDate(obj){
            const monthNames = ["January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
            ];
            return monthNames[obj.month-1]+' '+obj.year
        }
    }
}
</script>