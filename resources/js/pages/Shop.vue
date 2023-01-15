<template>
  <!-- <h1>Dashboard</h1> -->
  <div id="wrapper">

    <!-- sidebar -->
    <div class="sidebar" :class="{ showOverlay: overlayVisibility }">
      <span class="closeButton" @click="hideOverlay">&times;</span>
      <p class="brand-title"><a href="">Laravue Project</a></p>

      <div class="side-links">
        <ul>
          <li><router-link  @click="hideOverlay" :to="{ name: 'Dashboard' }">Dashboard</router-link></li>
          <li><router-link  @click="hideOverlay" :to="{ name: 'Home' }">Home</router-link></li>
          <li><router-link  @click="hideOverlay" :to="{ name: 'Shop' }">Shop</router-link></li>
        </ul>
      </div>
    </div>
    <!-- Menu Button -->
    <div class="menuButton"  @click="ShowOverlay">
      <div class="bar"></div>
      <div class="bar"></div>
      <div class="bar"></div>
    </div>
    <!-- main -->
    <main class="container">
      <div class="dashboard-view">
    <h1>This is Shop</h1>
    <br>
    <p> 🥳 Ta-da!</p>
   </div>
    </main>
 <!-- Main footer -->
 <footer class="main-footer">
        
        <small>&copy 2023 TechGrowth</small>
      </footer>
  
  </div>
  
</template>

<script>
export default {
  data() {
    return {
      overlayVisibility: false,
    };
  },
  methods: {
    ShowOverlay() {
      this.overlayVisibility = true;
    },
    hideOverlay() {
      this.overlayVisibility = false;
    },
   
  
  }

};
</script>
<style scoped>
.showOverlay {
  width: 100%;
  z-index: 5;
}
</style>