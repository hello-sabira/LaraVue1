<template>
     <div>
        <router-view></router-view>
     
    </div>
</template>
<script>
export default {
  data() {
    return {
      loggedIn: false,
    };
  },
  mounted() {
    if (localStorage.getItem("authenticated")) {
      this.loggedIn = true;
    } else {
      this.loggedIn = false;
    }
  },
};
</script>