<template>
<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div>
                   <router-link to="/employees" class="btn btn-primary">Employees</router-link>
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