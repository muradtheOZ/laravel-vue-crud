<!-- Add Employee component -->
<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Add Employee</h3>
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="addEmployee">
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
                                <label for="email">Email address</label>
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
<!-- functionalities for above code  -->
<script>
export default {
    data() {
        return {
            name: "",
            email: "",
            phone: "",
            team: "",
        };
    },
    methods: {
        addEmployee() {
            axios
                .post("/api/employee/store", {
                    employee: {
                        name: this.name,
                        email: this.email,
                        phone: this.phone,
                        team: this.team,
                    },

                })
                .then((response) => {

                    this.$router.push("/employees");
                });
        },
    },
};
</script>
