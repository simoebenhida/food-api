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
        data() {
            return {
                access_token : ''
            }
        },
        async mounted() {

            await axios.post('/api/login',{
                email : 'keara54@example.org',
                password : 'secret'
            }).then(({data}) => {
                this.access_token = data.user.token
                return this.access_token;
            })

            await axios.get('/api/foods',{
                headers: {
                    'Authorization': `Bearer ${this.access_token}`,
                    'Accept': 'application/json'
                }
            }).then(response => {
                console.log(response);
            })

            // await axios.post('/api/logout',{},{
            //     headers: {
            //         'Authorization': `Bearer ${this.access_token}`,
            //         'Accept': 'application/json'
            //     }
            // }).then(response => {
            //     console.log(response);
            // })

            // axios.post('/api/register',{
            //     name: 'test',
            //     email: 'test@test.com',
            //     password: 'secret',
            //     confirmed_password: 'secret'
            // }).then(response => {
            //     console.log(response);
            // })
            console.log('Component mounted.')
        }
    }
</script>
