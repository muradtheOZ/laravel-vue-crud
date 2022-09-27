<template>
    <div class="container">
        <router-view></router-view>
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title m-auto">List of Users</h3>
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
                                <router-link
                                    :to="{
                                        name: 'EditEmployee',
                                        params: { id: user.id },
                                    }"
                                    class="btn"
                                    >Edit</router-link
                                >
                                <!-- delete button for deleting employee -->
                                <button @click="deleteEmployee(user.id)">
                                    Delete
                                </button>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>
<!-- functionalities for above code -->
<script>
export default {
    data() {
        return {
            users: [],
            clicked: true,
        };
    },
    mounted() {
        axios.get("/api/employees").then((response) => {
            this.users = response.data;
        });
    },
    // delete function for deleting employee
    methods: {
        deleteEmployee: function (id) {
            axios.delete("/api/employee/" + id).then((response) => {
                console.log("successfully deleted");
                axios.get("/api/employees").then((response) => {
                    this.users = response.data;
                });
                this.$router.push("/");
            });
        },
        // edit function for editing employee
    },
};
</script>
