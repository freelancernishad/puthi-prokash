
<template>
    <span v-if="errorHandleing(Fieldname)">
        <span class="text-danger font-weight-bold"  v-for="name in errors.name" :key="name">{{ name }}</span>
    </span>
</template>
<script>
export default {
    props:['Fieldname']
}
</script>