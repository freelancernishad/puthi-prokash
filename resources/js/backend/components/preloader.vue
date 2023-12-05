<template>
    <div class="Preloader_own">
        <img :src="$asseturl+'assets/image/load-min.gif'" alt="">
    </div>
</template>

<style>
.Preloader_own {
    position: fixed;
    z-index: 9999;
    left: 0;
    top: 0;
    background: #0000007d;
    width: 100%;
    height: 100%;
}
.Preloader_own img {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
</style>
