<template>
  <div>
    <HeaderNav />
    <router-view></router-view>
    <FooterNav />
  </div>
</template>

<script>
import HeaderNav from "./Header";
import FooterNav from "./Footer";

export default {
  components: {
    HeaderNav,
    FooterNav
  },
  data() {}
};
</script>
