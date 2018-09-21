<template>
    <span>
        <mainheader></mainheader>
        <mainnav></mainnav>

        <!-- Page Content -->
        <div class="container">
            <div class="row" style="margin-top: 30px">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading text-left" style="padding: 3px 10px;">
                            <h4 style="margin: 8px 0px; color: #b62e00;">About Us</h4>
                        </div>
                        <div class="panel-body">
                            
                            <span v-html="content"></span>
                            
                        </div>
                    </div>
                </div>
            </div>

            <mainfooter></mainfooter>

        </div>
        <!-- /.container -->
    </span>
</template>
<script>
    import MainHeader from './partials/MainHeader.vue';
    import MainNav from './partials/MainNav.vue';
    import MainFooter from './partials/MainFooter.vue';

    export default {
        data() {
            return {
                content: window.content['AboutUs']['aboutus'],
            }
        },
        created() {
        },
        methods: {

        },
        components: {
            mainheader: MainHeader,
            mainnav: MainNav,
            mainfooter: MainFooter,
        }
    }
</script>
<style>
</style>