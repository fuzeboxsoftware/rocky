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

                            <!-- Action buttons -->
                            <div class="row text-center" v-show="!isLoading">
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-primary" v-on:click="getTeams()">View All Teams</button>
                                    
                                    <button type="button" class="btn btn-primary" v-on:click="addTeam()">Add New Team</button>

                                    <button type="button" class="btn btn-primary" v-on:click="addPlayer()">Add New Player</button>
                                </div>
                            </div>

                            <br>

                            <div v-show="viewingTeams">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-left" colspan="2">Available Teams</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="team in teams">
                                            <td class="text-left"><button type="button" class="btn btn-link" v-on:click="updateTeam(team)">{{ team.name }}</button></td><td class="text-right"><button type="button" class="btn btn-sm btn-info" v-on:click="viewPlayers(team)">View Players</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div v-show="viewingPlayers">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-left" colspan="2">{{ team.name }}'s Players</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-show="!players.length">
                                            <td colspan="2" class="text-danger"><p>There is currently no players for this team.</p></td>
                                        </tr>
                                        <tr v-show="players.length" v-for="player in players">
                                            <td class="text-left">{{ player.first_name }} {{ player.last_name }}</td><td class="text-right"><button type="button" class="btn btn-sm btn-info" v-on:click="updatePlayer(player)">Update</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container -->

        <updateteam :team="team" v-show="viewingUpdateTeam"></updateteam>
        <updateplayer :player="player" :teams="teams" v-show="viewingUpdatePlayer"></updateplayer>

    </span>
</template>
<script>
    import UpdatePlayer from './UpdatePlayer.vue';
    import UpdateTeam from './UpdateTeam.vue';

    export default {
        data() {
            return {
                teams: [],
                players: [],
                team: {
                    id: '',
                    name: ''
                },
                player: {
                    id: '',
                    first_name: '',
                    last_name: '',
                    team_id: ''
                },
                isLoading: false,
                viewingTeams: true,
                viewingPlayers: false,
                viewingUpdateTeam: false,
                viewingUpdatePlayer: false
            }
        },
        created() {
            // Fetch all teams by default
            this.getTeams();
        },
        methods: {
            hideAll() {
                this.isLoading = false;
                this.viewingTeams = false;
                this.viewingPlayers = false;
                this.viewingUpdateTeam = false;
                this.viewingUpdatePlayer = false;
            },
            getTeams() {
                this.hideAll();
                this.isLoading = true;

                axios.get('/api/team')
                    .then((response) => {
                        this.teams = response.data;
                        
                        // Set views
                        this.isLoading = false;
                        this.viewingTeams = true;
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            },
            viewPlayers(team) {
                this.hideAll();
                this.isLoading = true;

                this.team = team;

                axios.get('/api/player/' + team.id )
                    .then((response) => {
                        this.players = response.data;
                        
                        // Set views
                        this.isLoading = false;
                        this.viewingPlayers = true;
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            },
            addTeam() {
                this.team = {
                    id: '',
                    name: ''
                };

                this.hideAll();

                this.viewingUpdateTeam = true;
            },
            updateTeam(team) {
                this.team = team;

                this.hideAll();

                this.viewingUpdateTeam = true;
            },
            addPlayer() {
                this.player = {
                    id: '',
                    first_name: '',
                    last_name: '',
                    team_id: ''
                };

                this.hideAll();

                this.viewingUpdatePlayer = true
            },
            updatePlayer(player) {
                this.player = player;

                this.hideAll();

                this.viewingUpdatePlayer = true;
            }
        },
        components: {
            updateplayer: UpdatePlayer,
            updateteam: UpdateTeam
        }
    }
</script>
<style>
</style>