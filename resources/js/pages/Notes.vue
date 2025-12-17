<!--similar to blade file in laravel-->
<template>
    <div>
        <h1>My Notes</h1>

        <ul>
            <li v-for="note in notes" :key="note.id">
                {{ note.title }}
            </li>
        </ul>
    </div>
</template>

<script>
import apiClient from '@/services/apiClient';

export default { //similar to return in laravel
    data() {
        return {
            notes: []
        }
    },
    async mounted() {  //you can use created() as well //similar to document.ready() in jQuery

        await apiClient.get('/notes').then(response => {
            this.notes = response.data.data;
        });

    }

 }
</script>
