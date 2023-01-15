<template>
    <!-- <h1>Dashboard</h1> -->
    <div id="wrapper">
    

      <!-- sidebar -->
      <div class="sidebar" :class="{ showOverlay: overlayVisibility }">
      <span class="closeButton" @click="hideOverlay">&times;</span>
        <p class="brand-title"><a href="">Laravue Project</a></p>

        <div class="side-links">
          <ul>
            <li><router-link @click="hideOverlay" :to="{ name: 'Dashboard' }">Dashboard</router-link></li>
            <li><router-link @click="hideOverlay" :to="{ name: 'Home' }">Home</router-link></li>
            <li><router-link @click="hideOverlay" :to="{ name: 'Shop' }">Shop</router-link></li>
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
        <div id="backend-view">
          <div class="logout">
      <a href="#" @click="logout">Log out</a>
    </div>
   <div class="dashboard-view">
    
    
    <h1>Hi {{ name }}!</h1>
    <h2>This is your Dashboard</h2>
   </div>
   
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
      name: "",
    };
  },
  overlayVisibility: false,
  mounted() {
    axios
      .get("/api/user")
      .then((response) => (this.name = response.data.name))
      .catch((error) => {
        if (error.response.status === 401) {
          localStorage.removeItem("authenticated");
          this.$router.push({ name: "Login" }); //make you login when session expired
        }

        console.log(error)
      });
    
  },
  methods: {
    ShowOverlay() {
      this.overlayVisibility = true;
    },
    hideOverlay() {
      this.overlayVisibility = false;
    },
    logout() {
      axios
        .post("/api/logout")
        .then((response) => {
          this.$router.push({ name: "Login" });
          localStorage.removeItem("authenticated");
         
        })
        .catch((error) => console.log(error));
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