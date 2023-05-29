<template>
    <div>
        <Breadcrumbs brename="Category Image Upload"/>
     <multiple-file-upload  apimethod='post' :apiurl="'/api/categories/'+ $route.params.id +'/images'"></multiple-file-upload>

    </div>
</template>
