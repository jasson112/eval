<template>
    <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="navbar-collapse" id="navbar-mobile">
                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                    </div>
                    <ul class="nav navbar-nav float-right">
                        <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i class="ficon feather icon-maximize"></i></a></li>
                        <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <div class="user-nav d-sm-flex d-none">
                                    <span class="user-name text-bold-600" v-html="auth_user"/>
                                </div>
                                <span>
                                    <img class="round" src="/app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar" height="40" width="40"/>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" :href="'#'" @click="logout()">
                                    <i class="feather icon-power" />
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</template>

<script>
export default {
    name:   'NavBarComponent',

    props: [
        'auth_user',
    ],

    methods: {
        logout() {
            const confirmation = window.confirm('Are you sure to logout?')

            if (confirmation) {
                window.event.preventDefault(); 
                window.document.getElementById('logout-form').submit();
            }
        }
    },

    mounted() {
    }
}
</script>