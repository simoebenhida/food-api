<template>

</template>
<script>
    export default {
        async mounted() {

            // setTimeout(() => {
            //     console.log('inside sleep')
            // },5000)

            await this.sleep(5000)

            console.log('example component');
        },
        methods : {
            sleep(time) {
                return new Promise(resolve => {
                    setTimeout(() => {
                        console.log('inside sleep')
                        resolve('resolved')
                    },time)
                })
            }
        }
    }
</script>
