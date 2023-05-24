<template>
    <div class="flipbook">
      <div class="page" v-for="page in pages" :key="page.id">
        <img :src="page.image" alt="Page" />
      </div>
    </div>
  </template>

  <script>
  export default {
    data() {
      return {
        pages: [
          {
            id: 1,
            image: "page1.jpg",
          },
          {
            id: 2,
            image: "page2.jpg",
          },
          {
            id: 3,
            image: "page2.jpg",
          },
          // Add more pages as needed
        ],
      };
    },
  };
  </script>

  <style scoped>
  .flipbook {
    display: flex;
    flex-wrap: nowrap;
    overflow-x: auto;
    scroll-snap-type: x mandatory;
  }

  .page {
    scroll-snap-align: start;
    width: 100%;
    height: 100%;
  }

  .page img {
    width: 100%;
    height: 100%;
  }
  </style>
