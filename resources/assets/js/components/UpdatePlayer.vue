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
                                <h3 v-show="player.id">Update Player</h3>
                                <h3 v-show="!player.id">Add Player</h3>
                                <form v-show="!isLoading">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" class="form-control" name="first_name" v-model="player.first_name" required="required" placeholder="First Name">
                                    </div>
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control" name="last_name" v-model="player.last_name" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Team</label>
                                        <select class="form-control" name="team" v-model="player.team_id" required="required">
                                            <option v-for="team in teams" :value="team.id">{{ team.name }}</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button type="button" class="btn btn-success" v-on:click="updatePlayer" v-show="player.id">Update Player</button>
                                        <button type="button" class="btn btn-success" v-on:click="addPlayer" v-show="!player.id">Add Player</button>
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
        props: ['teams', 'player'],
        data() {
            return {
                isLoading: false,
            }
        },
        created() {
        },
        methods: {
            addPlayer() {
                this.isLoading = true;

                axios.post('/api/player', this.player)
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
            updatePlayer() {
                this.isLoading = true;

                axios.put('/api/player/' + this.player.id, this.player)
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