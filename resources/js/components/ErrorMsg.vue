<template>
  <div>
    <small v-if="eachError" class="text-danger">{{eachError[0]}}</small>
  </div>
</template>

<script>
export default {
  name: "ErrorMsg",
  props: {
    eachError: Array
  }
};
</script>

<style>
</style>