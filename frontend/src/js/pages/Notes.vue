<!--similar to blade file in laravel-->
<template>
    <div>
        <div style="display: flex; justify-content: space-between; align-items: center;">
        <h1>My Notes</h1>
        <button @click="logout" style="float:right"> Logout </button>

        </div>


        <input v-model="title" placeholder="title" />
        <input v-model="body" placeholder="body" />
        <button @click="addNote">  {{ editid ? 'Update note' : 'Add note' }}</button>
        <p v-if="success" class="success">{{ success }}</p>
        <p v-if="error" class="error">{{ error }}</p>

        <ul>
            <div v-if="loading">Loading...</div>
            <li v-for="note in notes" :key="note.id">
               <strong>{{ note.title }} </strong>
               <p> {{ note.body }} </p>

               <button @click="editNote(note)"> Edit</button>
               <button @click="deleteNote(note.id)"> Delete</button>
            </li>
        </ul>
    </div>
</template>

<script>
import apiClient from '@/services/apiClient'

export default { //similar to return in laravel
    data() {
        return {
            notes: [],
            title: '',
            body: '',
            error: '',
            editid: null,
            loading: false,
            success: ''
        }
    },
    async mounted() {  //you can use created() as well //similar to document.ready() in jQuery

        // await apiClient.get('/notes').then(response => {
        //     this.notes = response.data.data;
        // });

        this.loading = true;
        await this.fetchnotes();

    },
    methods: {

        async fetchnotes() {

            await apiClient.get('/notes').then(responce => {

                this.notes = responce.data.data;

            })
            .finally(() => {
                this.loading = false;
                this.success = '';
            })


        },
        async addNote() {

            if(!this.title || !this.body) {
                this.error = 'Title and Body are required';
                return;
            }

            if (this.editid) {
                await apiClient.put(`/notes/${this.editid}`, {
                    'title': this.title,
                    'body': this.body,
                })

                this.success = 'Note updated successfully!';

                this.editid = null
            } else {
                    await apiClient.post('/notes', {
                    'title': this.title,
                    'body': this.body,

                    })

                    this.success = 'Note added successfully!';
            }

            this.title = ''
            this.body = ''
            this.error = ''
            await this.fetchnotes()
        },

        editNote(note) {
            this.title = note.title;
            this.body = note.body;
            this.editid = note.id;
        },

        async deleteNote(id) {

            await apiClient.delete(`/notes/${id}`)
            this.success = 'Note deleted';
            await this.fetchnotes()
        },

        async logout() {

            await apiClient.post('/logout')
            .then(() => {
                localStorage.removeItem('token');
                this.$router.push('/');
            })
            .catch(error => {
                console.error('Logout failed:', error);
            });


        }

    }

 }
</script>
