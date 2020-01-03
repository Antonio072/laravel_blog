<template>
    <div class="container">
        <button v-on:click="modal+1" >Clickeame</button>
        {{modal}}
    </div>
</template>

<script>
    export default {
        data() {
            return {
                modal: 0
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
