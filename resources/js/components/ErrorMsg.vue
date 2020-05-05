<template>
<div>
  <small v-if="eachError" class="text-danger">{{eachError[0]}}</small>
  <small v-else class="text-danger"></small>
</div>
</template>

<script>
export default {
    name: "ErrorMsg",
    props:['eachError']
};
</script>

<style>
</style>