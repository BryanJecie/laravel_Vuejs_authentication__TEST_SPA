<template>
  <div class="row ml-5 mt-5">
    <div class="col-md-8">
      <ul>
        <li>
          <router-link to="/home">Dashboard</router-link>
        </li>
        <!-- <li>
          <router-link to="/profile">My Profile</router-link>
        </li>-->
      </ul>
    </div>
    <div class="col-md-8">
      <table class="table table-striped table-inverse table-responsive">
        <thead class="thead-inverse">
          <tr>
            <th>#</th>
            <th>Username</th>
            <th>Full name</th>
            <th>Email</th>
            <th>action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(user, index) in users" :key="index">
            <td>{{index+=1}}</td>
            <td scope="row">{{user.login}}</td>
            <td>{{user.name}}</td>
            <td>{{user.email}}</td>
            <td>
              <a :href="'#/home/'+ user.id" class="btn btn-primary btn-sm">Edit</a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import { CHECK_AUTH } from "../store/actions.type";
import APIService from "../api/api.service";

import Vue from "vue";
import axios from "axios";

export default {
  data() {
    return {
      users: []
    };
  },
  mounted() {
    this.get_users();
  },
  methods: {
    get_users() {
      APIService.get("api/user").then(resp => {
        this.users = resp.data.users;
      });
    }
  }
};
</script>
