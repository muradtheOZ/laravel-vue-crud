<template>
<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div>
                   <router-link to="/" class="btn btn-primary">Home</router-link>
                   <span class="m-auto">
                        <router-link
                            :to="{ name: 'AddEmployee' }"
                            class="btn btn-primary m-2"
                            >Add Employee</router-link
                        >
                    </span>
                </div>
                <router-view></router-view>
            </div>
        </div>
        <!-- router view -->
        
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