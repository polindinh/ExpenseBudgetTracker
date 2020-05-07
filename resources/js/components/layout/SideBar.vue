<template>
    <div>
        <aside class="is-hidden-mobile menu pos-fixed zi-99 h-100vh">
            <div class="logo ta-center ptb-4"><a href="/" class="brand-text">{{appName}}<span class="suffix">{{suffix}}</span></a>
            </div>
            <menus></menus>
        </aside>
        <aside class="is-hidden-tablet menu-mobile pos-fixed zi-99">
            <div class="logo ta-left ptb-4 plr-4 flex ai-center jc-space-between">
                <a href="/" class="block brand-text">{{appName}}
                    <span class="suffix">{{suffix}}</span>
                </a>
                <a href="#" @click="mobile==true?mobile=false:mobile=true" class="block fs-5 mobile-menu-trigger">
                    <i v-if="mobile" class="fa fa-times"></i>
                    <i v-else class="fa fa-bars"></i>
                </a>
            </div>
            <!---->
            <menus v-if="mobile"></menus>
        </aside>
    </div>
</template>

<script>
    import menus from "./menus";
    export default {
        components:{
            menus
        },
        name: "SideBar",
        data(){
            return{
                mobile:false,
                appName: process.env.MIX_APP_NAME,
                suffix: process.env.MIX_APP_SUFFIX,
            }
        },
        mounted(){
            console.log(process.env)
        }
    }
</script>

<style scoped>

</style>
