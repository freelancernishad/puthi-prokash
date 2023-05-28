<template>
        <div class="dashboard-content-one">
            <div class="breadcrumbs-area">
                <h3>{{ brename }}</h3>
                <ul>
                    <li>
                        <router-link :to="{ name: 'Dashboard' }">{{ brename }}</router-link>
                    </li>
                </ul>
            </div>
            </div>
</template>

<script>
export default {
    props: ['brename']
}
</script>
