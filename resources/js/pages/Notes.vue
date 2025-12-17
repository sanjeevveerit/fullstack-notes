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

export default {
    data() {
        return {
            notes: []
        }
    },
    async mounted() {

        // await apiClient.get('/notes').then(response => {
        //     this.notes = response.data.data;
        // });
        const res = await apiClient.get('/notes')
        this.notes = res.data.data
    }

 }
</script>
