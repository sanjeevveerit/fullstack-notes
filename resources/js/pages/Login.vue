<template>
   <div>
        <h1>Login</h1>

        <input v-model="email" placeholder="email" />
        <input v-model="password" type="password" placehpolder="Password"/>

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

        async login() {

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
