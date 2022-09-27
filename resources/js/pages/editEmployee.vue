<!-- Edit employee with params data and prefill the form with Employee data by finding info of the employee given by params -->
<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p>Hellow world</p>
                <div class="card">
                    <div class="card-header">Edit Employee</div>
                    <div class="card-body">
                        <form @submit.prevent="updateEmployee">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="name"
                                    v-model="name"
                                    placeholder="Enter name"
                                />
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input
                                    type="email"
                                    class="form-control"
                                    id="email"
                                    v-model="email"
                                    placeholder="Enter email"
                                />
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="phone"
                                    v-model="phone"
                                    placeholder="Enter phone"
                                />
                            </div>
                            <div class="form-group">
                                <label for="salary">Working area</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="team"
                                    v-model="team"
                                    placeholder="Enter Working Area"
                                />
                            </div>
                            <button type="submit" class="btn btn-primary">
                                Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<!-- functionality for above code -->
<script>
export default {
    data() {
        return {
            name: '',
            email: '',
            phone: '',
            team: ''
        }
    },
    // get employee data by id
    mounted() {
        console.log("Hello params",this.$route.params.id);
        axios.get('/api/employee/' + this.$route.params.id)
            .then(response => {
                console.log("Hello data", response.data)
                this.name = response.data.name;
                this.email = response.data.email;
                this.phone = response.data.phone;
                this.team = response.data.team;
            })
    },
    // update employee data
    methods: {
        updateEmployee: function () {
            axios.put('/api/employee/edit/' + this.$route.params.id, {
                employee: {
                        name: this.name,
                        email: this.email,
                        phone: this.phone,
                        team: this.team,
                    },
            })
                .then(response => {
                    this.$router.push('/employees');
                });
        }
    }
}
</script>