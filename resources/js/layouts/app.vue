<template>
<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List of Users</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Work in</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="user in users" :key="user.id">
                                    <td>{{ user.name }}</td>
                                    <td>{{ user.email }}</td>
                                    <td>{{ user.team }}</td>
                                    <button>Edit</button>
                                    <!-- delete button for deleting employee -->
                                    <button @click="deleteEmployee(user.id)" >Delete</button>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
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
            users: []
        }
    },
    mounted() {
        axios.get('/api/employees')
            .then(response => {
                this.users = response.data
            })
    },
    // delete function for deleting employee
    methods: {
        deleteEmployee: function (id) {
            axios.delete('/api/employee/' + id)
                .then(response => {
                    this.getEmployees();
                });
        }
    }

}
</script>