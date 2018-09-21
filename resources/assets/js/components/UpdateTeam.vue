<template>
    <span>
        <!-- All Team -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">

                            <!-- Loading Screen -->
                            <div class="row text-center" v-show="isLoading">
                                <div class="col-md-12">
                                    <h3>Loading...</h3>
                                </div>
                            </div>

                            <div v-show="!isLoading">
                                <h3 v-show="team.id">Update Team</h3>
                                <h3 v-show="!team.id">Add Team</h3>
                                <form v-show="!isLoading">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="name" v-model="team.name" required="required" placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <button type="button" class="btn btn-success" v-on:click="updateTeam" v-show="team.id">Update Team</button>
                                        <button type="button" class="btn btn-success" v-on:click="addTeam" v-show="!team.id">Add Team</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container -->
    </span>
</template>
<script>

    export default {
        props: ['team'],
        data() {
            return {
                isLoading: false,
            }
        },
        created() {
        },
        methods: {
            addTeam() {
                this.isLoading = true;

                axios.post('/api/team', this.team)
                    .then((response) => {
                        this.isLoading = false;

                        if(response.data.status == 'success') {
                            this.$parent.getTeams();
                        }

                    })
                    .catch((error) => {
                        this.isLoading = false;
                        console.log(error);
                    });
            },
            updateTeam() {
                this.isLoading = true;

                axios.put('/api/team/' + this.team.id, this.team)
                    .then((response) => {
                        this.isLoading = false;

                        if(response.data.status == 'success') {
                            this.$parent.getTeams();
                        }

                    })
                    .catch((error) => {
                        this.isLoading = false;
                        console.log(error);
                    });
            }
        },
        components: {
        }
    }
</script>
<style>
</style>