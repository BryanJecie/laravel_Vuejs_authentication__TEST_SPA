<template>
  <div>
    <HeaderNav />
    <router-view></router-view>
    <FooterNav />
  </div>
</template>
<script>
import HeaderNav from "./components/Header";
import FooterNav from "./components/Footer";

export default {
  name: "App",
  components: {
    HeaderNav,
    FooterNav
  },
  methods: {
    isAuthenticated() {
      return this.$store.getters.isAuthenticated;
    }
  }
};
</script>
<style>
</style>
