<template>
   <div>
        <h1>Login</h1>

        <!-- v-model is similar to old input in laravel
        it binds the input value to the data property -->
        <input v-model="email" placeholder="email" />
        <input v-model="password" type="password" placehpolder="Password"/>

        <!--similar to form submit in laravel i.e onclick call login method-->
        <button @click="login">Login</button>
        <p v-if="error">{{ error }}</p>
   </div>
</template>

<script>

import apiClient from '@/services/apiClient';

export default {

    data() {
        return {
            email: '',
            password: '',
            error: ''
        }
    },
    methods: {

        async login() { //async allows await

            const response =await apiClient.post('/login', {
                email: this.email,
                password: this.password,
            })

            if (response.data.success) {
                localStorage.setItem('token', response.data.token);
                this.$router.push('/notes');
            } else {
                this.error = response.data.message || 'Login failed';
            }
        }

    }
}

</script>
