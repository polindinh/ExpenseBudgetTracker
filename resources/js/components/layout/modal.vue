<template>
    <transition name="modal">
        <div class="modal" style="display: flex">
            <div class="modal-background" @click="closeModal"></div>
            <div class="modal-content is-white">
                <slot></slot>
            </div>
        </div>
    </transition>
</template>

<script>
    export default {
        name: "modal",
        data(){
            return{

            }
        },
        methods:{
            closeModal(){
                //this.show=false
                this.$emit('closed')
            }
        }
    }
</script>


<style scoped>

    .modal-enter-active{
        transition: opacity .25s ease-in;
    }
    .modal-leave-active {
        transition: opacity .25s ease-out;
    }

    .modal-enter, .modal-leave-to {
        opacity: 0;
    }
</style>
