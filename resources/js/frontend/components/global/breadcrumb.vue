<template>
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb ms-5 mt-3">
          <li class="breadcrumb-item active" v-for="(page,index) in pages"  :key="'breadcrumb'+index" :class="{ 'text-dark': (pages.length-1)==index }" aria-current="page">

            <router-link :to="{name:page.route}" v-if="page.route">{{ page.text }}</router-link>
            <span v-else>{{ page.text }}</span>

        </li>
        </ol>
      </nav>
</template>

<script>
export default {
    props: {
        pages: {
            type: Array,
            default: []
        },
    }
}
</script>
