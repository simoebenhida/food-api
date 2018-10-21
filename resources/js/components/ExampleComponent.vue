<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            // axios.post('/api/login',{
            //     email : 'keara54@example.org',
            //     password : 'secret'
            // }).then(response => {
            //     console.log(response);
            // })

            axios.post('/api/register',{
                name: 'test',
                email: 'test@test.com',
                password: 'secret',
                confirmed_password: 'secret'
            }).then(response => {
                console.log(response);
            })
            console.log('Component mounted.')
        }
    }
</script>
