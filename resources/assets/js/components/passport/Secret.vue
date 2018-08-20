<template>
    <div class="flex items-baseline">
        <div v-show="visible" v-text="text" class="mr-2"></div>
        <a @click.prevent="visible = !visible" v-text="visible ? 'Hide' : 'Show'" class="cursor-pointer text-blue no-underline hover:underline"></a>
    </div>
</template>

<script>
    export default {
        props: {
            text: {
                default: false,
                required: true
            }
        },

        data() {
            return {
                visible: false
            }
        }
    }
</script>
