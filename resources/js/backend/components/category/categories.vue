<template>
    <ul class="tree">
        <li :class="{ 'has-children': list.childrens }" v-for="list in lists" :key="list.id">
            <div class="node">
                <span class="line vertical"></span>
        <span class="line horizontal"></span>
                <span class="label">{{ list.id }}</span>
            </div>
             <CategoryTree v-if="list.childrens"  :lists="list.childrens" />
        </li>
    </ul>
</template>
<script>

export default {
    props:['lists']
}
</script>


<style>
.tree {
  list-style: none;
  padding: 0;
  margin: 0;
}

.node {
  position: relative;
  display: flex;
  align-items: center;
  line-height: 1.5;
}

.line {
  position: absolute;
  background-color: #ccc;
}

.line.vertical {
  top: 0;
  left: 8px;
  width: 2px;
  height: 100%;
}

.line.horizontal {
  top: 50%;
  left: 0;
  width: 100%;
  height: 2px;
}

.label {
  margin-left: 20px; /* Adjust the indentation as needed */
  padding: 4px 8px;
  background-color: #f2f2f2;
  border-radius: 4px;
  color: #333;
}

.has-children > .node {
  margin-left: 20px; /* Adjust the indentation as needed */
}
</style>
