<template>
    <div class="container">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Launch demo modal
        </button>
        <h1>Welcome to email</h1>
        <table>
            <tr>
                <th>From</th>
                <th>Subject</th>
                <th>Body</th>
                <th>Date</th>
                <th></th>
            </tr>
            <tr v-for="email in characterEmails">
                <td>
                   {{email.subject}}
                </td>
                <td>
                    {{email.body}}
                </td>
            </tr>
        </table>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="text" v-model="draftemailsubject"><br>
                        <textarea v-model="draftemailbody"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" @click="sendemail()">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapGetter, mapActions } from 'vuex'

    export default {


        data: function () {
            return {
                draftemailsubject: "",
                draftemailbody: "",
            }
        },
        props: ['characterEmails'],
        mounted() {
            console.log('Component mounted.');


        },
        methods: {
            sendemail: function () {
                axios.post('/email', {subject: this.draftemailsubject, body: this.draftemailbody}).then(response => {
                    console.log(response)
                    this.emails.push(response.data)
                })
            }
        }

    }
</script>

<style scoped>

</style>
