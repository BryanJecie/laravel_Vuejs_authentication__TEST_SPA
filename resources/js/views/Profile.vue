<template>
  <div class="row ml-5 mt-5">
    <div class="col-md-8">
      <ul>
        <li>
          <router-link to="/home">Dashboard</router-link>
        </li>
      </ul>
    </div>
    <div class="col-md-6">
      <form @submit.prevent="onSubmit" method="POST">
        <div class="form-group">
          <label for>Username</label>
          <input type="text" name="username" v-model="form.username" class="form-control" />
        </div>
        <div class="form-group">
          <label for>Full Name</label>
          <input type="text" name="fullname" v-model="form.fullname" class="form-control" />
        </div>
        <div class="form-group">
          <label for>Email</label>
          <input type="text" name="email" v-model="form.email" class="form-control" />
        </div>

        <div class="form-group">
          <button class="btn btn-primary" type="submit">Save</button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import APIService from "../api/api.service";
import { USER_UPDATE } from "../store/actions.type";
export default {
  data() {
    return {
      form: {
        id: "",
        fullname: "",
        username: "",
        email: ""
      }
    };
  },
  mounted() {
    var id = window.location.href.split("/").pop();
    APIService.get("api/user").then(resp => {
      resp.data.users.forEach(ele => {
        if (parseInt(ele.id) === parseInt(id)) {
          this.form.id = ele.id;
          this.form.fullname = ele.name;
          this.form.email = ele.email;
          this.form.username = ele.login;
          return false;
        }
      });
    });
  },
  methods: {
    onSubmit() {
      this.$store.dispatch(USER_UPDATE, this.form).then(data => {
        console.log(data);
      });
      //   APIService.post("/api/update", this.form).then(resp => {
      //     console.log(resp);
      //   });
    }
  }
};
</script>
